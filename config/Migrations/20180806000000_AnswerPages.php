<?php
use Migrations\AbstractMigration;

class AnswerPages extends AbstractMigration
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
        $table = $this->table('answer_pages');
        $table->addColumn('answer_id', 'biginteger', [
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
        $table->addIndex(['answer_id'])
              ->addIndex(['origin_id'])
              ->update();
    }
}
