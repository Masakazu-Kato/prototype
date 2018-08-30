<?php
use Migrations\AbstractMigration;

class Students extends AbstractMigration
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
        $table = $this->table('students');
        $table->addColumn('lastname', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => true,
        ]);
        $table->addColumn('firstname', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => true,
        ]);
        $table->addColumn('lastname_kana', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => true,
        ]);
        $table->addColumn('firstname_kana', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => true,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('phone', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);

        $table->addColumn('postcode', 'string', [
            'default' => null,
            'limit' => 7,
            'null' => true,
        ]);
        $table->addColumn('prefecture_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('municipality', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('street', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('building', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('birthday', 'date', [
            'default' => null,
            'null' => true,
        ]);

        $table->addColumn('enable', 'integer', [
            'default' => 1,
            'null' => false,
        ]);
        $table->addColumn('token', 'string', [
            'default' => null,
            'limit' => 255,
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
        $table->addIndex(['email'],['unique' => true])
              ->addIndex(['prefecture_id'])
              ->update();
    }
}
