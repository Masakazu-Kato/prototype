<?php
use Migrations\AbstractMigration;

class Answers extends AbstractMigration
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
        $table = $this->table('answers');

        $table->addColumn('response_status', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('ip_address', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('total_time', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('href', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('analyze_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('edit_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('recipient_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('collector_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('collection_mode', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('custom_value', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('custom_variables', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('page_path', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('logic_path', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('metadata', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('origin_id', 'biginteger', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('origin_survey_id', 'biginteger', [
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
        $table->addIndex(['recipient_id'])
              ->addIndex(['collector_id'])
              ->addIndex(['origin_id'])
              ->addIndex(['origin_survey_id'])
              ->update();
    }
}
