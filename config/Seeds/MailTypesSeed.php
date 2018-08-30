<?php
use Migrations\AbstractSeed;

/**
 * MailTypes seed.
 */
class MailTypesSeed extends AbstractSeed
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
        $data = [
            ['name' => '受信'],
            ['name' => '送信'],
            ['name' => '一時保存'],
            ['name' => '削除'],
        ];
        $table = $this->table('mail_types');
        $table->insert($data)->save();
    }
}
