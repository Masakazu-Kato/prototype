<?php
use Migrations\AbstractSeed;

/**
 * Mails seed.
 */
class MailsSeed extends AbstractSeed
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
                'student_id' => $i,
                'user_id' => $i,
                'subject' => 'メール (Mails) [ '.$i.' ]',
                'mail_type_id' => $faker->numberBetween(1,2),
                'from' => $i.$faker->safeEmail,
                'to' => $i.$faker->safeEmail,
                'cc' => $i.$faker->safeEmail,
                'bcc' => $i.$faker->safeEmail,
                'body' => $faker->realText($faker->numberBetween(20,100)),
                'raw' => $faker->realText($faker->numberBetween(20,100)),
                'status' => $faker->boolean,
                'mail_template_id' => $i,
                'error_code' => $faker->randomElement([200,500]),
                'enable' => $faker->boolean,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('mails');
        $table->insert($data)->save();
    }
}
