<?php
use Migrations\AbstractMigration;

class WebExamLogs extends AbstractMigration
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
        $table = $this->table('web_exam_logs');
        $table->addColumn('exam_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('student_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('cycle', 'integer', [
            'default' => 1,
            'null' => false,
        ]);
        $table->addColumn('seconds', 'integer', [
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
        $table->addIndex(['exam_id'])
              ->addIndex(['student_id'])
              ->addIndex(['user_id'])
              ->update();
    }
}
