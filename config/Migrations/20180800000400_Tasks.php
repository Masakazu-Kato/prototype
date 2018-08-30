<?php
use Migrations\AbstractMigration;

class Tasks extends AbstractMigration
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
        $table = $this->table('tasks');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('text', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('start', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('end', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('assign_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('student_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('assigned', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('task_status_id', 'integer', [
            'default' => 1,
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
        $table->addIndex(['user_id'])
              ->addIndex(['assign_id'])
              ->addIndex(['student_id'])
              ->addIndex(['task_status_id'])
              ->update();
    }
}
