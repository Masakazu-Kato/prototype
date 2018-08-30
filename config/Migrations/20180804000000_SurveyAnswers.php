<?php
use Migrations\AbstractMigration;

class SurveyAnswers extends AbstractMigration
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
        $table = $this->table('survey_answers');
        $table->addColumn('survey_question_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('choices', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('quiz_options', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('score', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('visible', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('text', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('position', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('weight', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('is_na', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('origin_answer_id', 'biginteger', [
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
        $table->addIndex(['survey_question_id'])
              ->addIndex(['is_na'])
              ->addIndex(['origin_answer_id'])
              ->update();
    }
}
