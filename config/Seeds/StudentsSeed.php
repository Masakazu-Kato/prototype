<?php
use Migrations\AbstractSeed;

/**
 * Students seed.
 */
class StudentsSeed extends AbstractSeed
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
        $count = 10000;
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'lastname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'lastname_kana' => $faker->lastKanaName,
                'firstname_kana' => $faker->firstKanaName(null),
                'email' => $i.$faker->safeEmail,
                'phone' => $faker->phoneNumber,

                'postcode' => $faker->postcode,
                'prefecture_id' => $faker->numberBetween(1,47),
                'municipality' =>  $faker->city,
                'street' => $faker->streetAddress,
                'building' => $faker->numberBetween(10000,20000),
                'birthday' => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),

                'enable' => $faker->boolean,
                'token' => $faker->sha256,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('students');
        $table->insert($data)->save();
    }
}
