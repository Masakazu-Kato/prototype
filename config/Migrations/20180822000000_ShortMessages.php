<?php
use Migrations\AbstractMigration;

class ShortMessages extends AbstractMigration
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
        $table = $this->table('short_messages');

        $table->addColumn('user_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('student_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('body', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('raw', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('status', 'integer', [
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
        $table->addIndex(['user_id'])
              ->addIndex(['student_id'])
              ->addIndex(['status'])
              ->update();
    }
}
