<?php
namespace App;
use function debug;
use \PDO;
use \PDOException;
class Model
{
    static $connections = [];
    public $conf = 'default';
    public $db;
    public $id;
    public $errors;
    public $fillable = [];

    /**
     * database connection
     * Model constructor.
     */
    public function __construct()
    {
        echo 'Model ';
        $conf = Conf::$databases[$this->conf];
        try {
            $pdo = new PDO(
                'mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';',
                $conf['login'],
                $conf['password'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            Model::$connections[$this->conf] = $pdo;
            $this->db = $pdo;
        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de donnée';
            echo $e->getMessage();
            die();
        }
    }

    /**
     * load model for validate form
     * @param $name
     */
    public function loadModel($name){
        if(!isset($this->$name)){
            $file = ROOT.DS.'Model'.DS.$name.'.php';
            require_once($file);
            $this->$name = new $name();
            if(isset($this->Form)){
                $this->$name->Form = $this->Form;
            }
        }

    }

    /**
     * validate fields
     * @param $data
     * @return bool
     */
    public function validates($data){
        Form::$errors = array();
        foreach($this->fillable as $k=>$v){
            if(!isset($data->$k)){
                Form::$errors[$k] = $v['message'];
            }else{
                if($v['rule'] == 'notEmpty'){
                    if(empty($data->$k)){
                        Form::$errors[$k] = $v['message'];
                    }
                }elseif(!preg_match('/^'.$v['rule'].'$/',$data->$k)){
                    Form::$errors[$k] = $v['message'];
                }
            }
        }
        $this->errors = Form::$errors;
        if(isset($this->Form)){
            $this->Form->errors = Form::$errors;
        }
        if(empty(Form::$errors)){
            return true;
        }
        return false;
    }





    /**
     * find all in table
     * @param array $req
     * @return array
     */
    public function findAll($table, array $req)
    {
        $sql = 'SELECT ';
        if (isset($req['distinct'])) {
            if (is_array($req['distinct'])) {
                $sql .= 'DISTINCT ' . implode(', ', $req['distinct']);
            } else {
                $sql .= 'DISTINCT ' . $req['distinct'];
            }
        } else if (isset($req['count'])) {
            $sql .= $req['field'] . ', COUNT(' . $req['count'] . ') as ' . $req['as'];
        } else if (isset($req['fields'])) {
            if (is_array($req['fields'])) {
                $sql .= implode(', ', $req['fields']);
            } else {
                $sql .= $req['fields'];
            }
        } else if (isset($req['concat'])) {
            $sql .= $req['field'] . ', GROUP_CONCAT(' . $req['concat'] . ')';
        } else if (isset($req['max'])) {
            $sql .= $req['field'] . ', MAX(' . $req['max'] . ')';
        } else {
            $sql .= '*';
        }
        $sql .= ' FROM ' . $table;
        if (isset($req['join'])) {
            foreach ($req['join'] as $k => $v) {
                $sql .= ' LEFT JOIN ' . $k . ' ON ' . $v . ' ';
            }
        }
        if (isset($req['group'])) {
            $sql .= ' GROUP BY ' . $req['group'];
        }
        if (isset($req['conditions'])) {
            $sql .= ' WHERE ';
            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = [];
                foreach ($req['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = "'" . $v . "'";
                    }
                    $cond[] = $k . "=" . $v;
                }
                $sql .= implode(' AND ', $cond);
            }
        }
        if (isset($req['order'])) {
            $sql .= ' ORDER BY ' . $req['order'];
        }
        if (isset($req['limit'])) {
            $sql .= ' LIMIT ' . $req['limit'];
        }

        //return $sql;
        //print_r(Model::$db);
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll();
    }

    /**
     *find the first request
     * @param $req
     * @return mixed
     */
    public function findFirst($table, $req)
    {
        return current($this->findAll($table, $req));
    }

    /**
     * delete by id
     * @param $id
     */
    public function delete($table, array $req)
    {
        $sql = "DELETE FROM " . $table;
        if (isset($req['conditions'])) {
            $sql .= ' WHERE ';
            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = [];
                foreach ($req['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = "'" . $v . "'";
                    }
                    $cond[] = $k . "=" . $v;
                }
                $sql .= implode(' AND ', $cond);
            }
        }
        $this->db->query($sql);
        //return $sql;
    }

    /**
     * @param $data
     */
    public function update($table, $data, $id)
    {
        $sql = 'UPDATE ' . $table . ' SET ' . $data . '=0' . ' WHERE ' . $id . '=' . $id;
        $this->db->query($sql);
    }

    /**
     * @param $table
     * @param array $insert
     */
    public function save($table, array $insert)
    {
        $sql = 'INSERT INTO ' . $table;
        if (isset($insert['conditions'])) {
            $sql .= ' SET ';
            if (!is_array($insert['conditions'])) {
                $sql .= $insert['conditions'];
            } else {
                $cond = [];
                foreach ($insert['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = "'" . $v . "'";
                    }
                    $cond[] = $k . "=" . $v;
                }
                $sql .= implode(' , ', $cond);
            }
        }
        //return $sql;
        $pre = $this->db->prepare($sql);
        $pre->execute();
        $this->id = $this->db->lastInsertId();
    }
}
