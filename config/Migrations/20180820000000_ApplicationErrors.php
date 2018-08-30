<?php
use Migrations\AbstractMigration;

class ApplicationErrors extends AbstractMigration
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
        $table = $this->table('application_errors');
        $table->addColumn('application_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('error_code', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('raw', 'text', [
            'default' => null,
            'null' => true,
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
        $table->addIndex(['application_id'])
              ->update();
    }
}
