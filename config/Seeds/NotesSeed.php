<?php
use Migrations\AbstractSeed;

/**
 * Notes seed.
 */
class NotesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $count = 1000;
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'name' => 'ノート (Notes) [ '.$i.' ]',
                'text' => $faker->realText(($faker->numberBetween(20,30))),
                'user_id' => $faker->numberBetween(1,100),
                'student_id' => $faker->numberBetween(1,100),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('notes');
        $table->insert($data)->save();
    }
}
