<?php
use Migrations\AbstractMigration;

class StudentSurveys extends AbstractMigration
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
        $table = $this->table('student_surveys');
        $table->addColumn('student_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('survey_id', 'integer', [
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
        $table->addIndex(['student_id'])
              ->addIndex(['survey_id'])
              ->update();
    }
}
