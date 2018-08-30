<?php
use Migrations\AbstractMigration;

class ShortUrls extends AbstractMigration
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
        $table = $this->table('short_urls');
        $table->addColumn('url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('long_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('status_code', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('status_text', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('hash', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('global_hash', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('new_hash', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
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
