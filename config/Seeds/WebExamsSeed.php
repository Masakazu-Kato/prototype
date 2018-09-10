<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * WebExams seed.
 */
class WebExamsSeed extends AbstractSeed
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
                'name' => 'オンライン試験 (webExams) [ '.$i.' ]',
                'exam_id' => 1,
                'user_id' => $i,
                'minutes' => 60,
                'start' => date('Y-m-d 09:00:00'),
                'end' => date('Y-m-d 10:00:00'),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('web_exams');
        $table->insert($data)->save();
    }

}
