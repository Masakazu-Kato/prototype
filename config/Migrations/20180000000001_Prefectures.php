<?php
use Migrations\AbstractMigration;

class Prefectures extends AbstractMigration
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
        $table = $this->table('prefectures');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 4,
            'null' => false,
        ]);
        $table->create();
    }
}
