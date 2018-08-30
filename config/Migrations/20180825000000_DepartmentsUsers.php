<?php
use Migrations\AbstractMigration;

class DepartmentsUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('departments_users');
        $table->addColumn('department_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
        $table->addIndex(['department_id'])
              ->addIndex(['user_id'])
              ->update();
    }
}
