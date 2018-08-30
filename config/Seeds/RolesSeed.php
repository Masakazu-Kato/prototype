<?php
use Migrations\AbstractSeed;

/**
 * Roles seed.
 */
class RolesSeed extends AbstractSeed
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
                'name' => '役割 (Roles) [ '.$i.' ]',
                'enable' => $faker->boolean,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('roles');
        $table->insert($data)->save();
    }
}
