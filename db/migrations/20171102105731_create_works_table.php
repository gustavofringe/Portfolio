<?php


use Phinx\Migration\AbstractMigration;

class CreateWorksTable extends AbstractMigration
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
        $this->table('works',['id'=>'workID'])
            ->addColumn('title','string')
            ->addColumn('subtitle','string')
            ->addColumn('techno','string')
            ->addColumn('content','text',['limit'=>\Phinx\Db\Adapter\MysqlAdapter::TEXT_LONG])
            ->addColumn('url','string')
            ->addColumn('link','string')
            ->addColumn('date','date')
            ->addColumn('online','boolean')
            ->create();
        $this->table('images')
            ->addColumn('workID','integer')
            ->addForeignKey('workID','works','workID',[
                'delete'=>'CASCADE',
                'update'=>'CASCADE'
            ])
            ->update();
    }
}
