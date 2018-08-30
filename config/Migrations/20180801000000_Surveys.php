<?php
use Migrations\AbstractMigration;

class Surveys extends AbstractMigration
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
        $table = $this->table('surveys');
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('href', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('page_count', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('question_count', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('response_count', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('collect_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('preview', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('edit_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('analyze_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('summary_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('is_owner', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('footer', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('buttons_text', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('folder_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('language', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('custom_variables', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('category', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('nickname', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
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
        $table->addIndex(['origin_id'])
              ->update();
    }
}
