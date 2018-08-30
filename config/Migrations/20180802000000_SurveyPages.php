<?php
use Migrations\AbstractMigration;

class SurveyPages extends AbstractMigration
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
        $table = $this->table('survey_pages');
        $table->addColumn('survey_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('href', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('position', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('question_count', 'integer', [
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
        $table->addIndex(['survey_id'])
              ->addIndex(['origin_id'])
              ->update();
    }
}
