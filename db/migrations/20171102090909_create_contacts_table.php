<?php


use Phinx\Migration\AbstractMigration;

class CreateContactsTable extends AbstractMigration
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
        $this->table('contacts',['id'=>'contactID'])
            ->addColumn('lastname', 'string')
            ->addColumn('firstname','string')
            ->addColumn('email','string')
            ->addColumn('society','string')
            ->addColumn('phone','integer')
            ->addColumn('msg','text',['limit'=>\Phinx\Db\Adapter\MysqlAdapter::TEXT_LONG])
            ->addColumn('date','date')
            ->create();
    }
}
