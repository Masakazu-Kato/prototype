<?php
use Migrations\AbstractSeed;

/**
 * MailTemplates seed.
 */
class MailTemplatesSeed extends AbstractSeed
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
                'name' => 'メールテンプレート (MailTemplates) [ '.$i.' ]',
                'text' => $faker->realText($faker->numberBetween(100,200)),
                'template_id' => $faker->randomNumber(6).'-'.$faker->randomNumber(6).'-'.$faker->randomNumber(6),
                'enable' => $faker->boolean,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('mail_templates');
        $table->insert($data)->save();
    }
}
