<?php


use Phinx\Migration\AbstractMigration;

class CreateImagesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('images',['id'=>'imageID'])
            ->addColumn('name','string')
            ->addColumn('type','string')
            ->addColumn('tmp_name','string')
            ->addColumn('error','boolean')
            ->addColumn('size','integer',['limit'=>\Phinx\Db\Adapter\MysqlAdapter::INT_BIG])
            ->addColumn('folder','string')
            ->create();

    }
}
