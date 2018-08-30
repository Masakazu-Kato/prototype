<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 *  Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'password' => $this->_setPassword(0000),
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

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    /**
     *
     * @param type $value
     * @return type
     */
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}
