<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Exams seed.
 */
class ExamsSeed extends AbstractSeed
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
                'name' => '試験 ['.$i.']',
                'text' => '試験概略 ['.$i.']',
                'survey_id' => $i,
                'exam_due' => date('Y-m-d 12:00:00' ,strtotime('+'.$i.' day')),
                'exam_start' => date('Y-m-d 13:00:00',strtotime('+'.$i.' day')),
                'exam_end' => date('Y-m-d 14:00:00',strtotime('+'.$i.' day')),
                'exam_minute' => $faker->randomElement([60,90,120,150]),
                'number' => $faker->numberBetween(100,1000),
                'email' => $i.$faker->safeEmail,
                'phone' => $faker->phoneNumber,
                'postcode' => $faker->postcode,
                'prefecture_id' => $faker->numberBetween(1,47),
                'municipality' =>  $faker->city,
                'street' => $faker->streetAddress,
                'building' => $faker->numberBetween(10000,20000),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('exams');
        $table->insert($data)->save();
    }

}
