<?php
use Migrations\AbstractMigration;

class SurveyQuestions extends AbstractMigration
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
        $table = $this->table('survey_questions');
        $table->addColumn('survey_page_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('sorting', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('family', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('subtype', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('required', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('visible', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('href', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('headings', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('position', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('validation', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('forced_ranking', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('origin_id', 'biginteger', [
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
        $table->addIndex(['survey_page_id'])
              ->addIndex(['origin_id'])
              ->update();
    }
}
