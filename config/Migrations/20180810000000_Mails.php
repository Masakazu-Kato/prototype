<?php
use Migrations\AbstractMigration;

class Mails extends AbstractMigration
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
        $table = $this->table('mails');
        $table->addColumn('student_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('subject', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('type', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('from', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('to', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('cc', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('bcc', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
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
        $table->addColumn('mail_type_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('error_code', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('enable', 'integer', [
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
        $table->addIndex(['student_id'])
              ->addIndex(['user_id'])
              ->addIndex(['mail_type_id'])
              ->update();
    }
}
