<?php
use Migrations\AbstractSeed;

/**
 * ShortMessages seed.
 */
class ShortMessagesSeed extends AbstractSeed
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
                'user_id' => $i,
                'student_id' => $i,
                'body' => $faker->realText($faker->numberBetween(10,15)),
                'raw' => $faker->realText($faker->numberBetween(20,100)),
                'status' => $faker->boolean,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('short_messages');
        $table->insert($data)->save();
    }
}
