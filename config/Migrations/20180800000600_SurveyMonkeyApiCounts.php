<?php
use Migrations\AbstractMigration;

class SurveyMonkeyApiCounts extends AbstractMigration
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
        $table = $this->table('survey_monkey_api_counts');
        $table->addColumn('date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('global_minute_limit', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('global_minute_remaining', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('global_minute_reset', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('global_day_limit', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('global_day_remaining', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('global_day_reset', 'integer', [
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
    }
}
