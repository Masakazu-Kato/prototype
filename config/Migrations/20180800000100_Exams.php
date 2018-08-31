<?php
use Migrations\AbstractMigration;

class Exams extends AbstractMigration
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
        $table = $this->table('exams');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('text', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('survey_id', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('exam_due', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('exam_start', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('exam_end', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('exam_minute', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('number', 'integer', [
            'default' => 0,
            'null' => false,
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
              ->addIndex(['prefecture_id'])
              ->update();
    }
}
