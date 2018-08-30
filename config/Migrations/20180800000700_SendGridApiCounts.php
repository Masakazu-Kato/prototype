<?php
use Migrations\AbstractMigration;

class SendGridApiCounts extends AbstractMigration
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
        $table = $this->table('sendgrid_api_counts');
        $table->addColumn('date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('day_limit', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('day_remaining', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('day_reset', 'biginteger', [
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
