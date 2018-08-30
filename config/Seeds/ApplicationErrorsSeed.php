<?php
use Migrations\AbstractSeed;

/**
 * ApplicationErrors seed.
 */
class ApplicationErrorsSeed extends AbstractSeed
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
                'application_id' => $faker->numberBetween(1,4),
                'error_code' => $faker->randomElement([200,500]),
                'raw' => $faker->realText($faker->numberBetween(20,100)),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('application_errors');
        $table->insert($data)->save();
    }
}
