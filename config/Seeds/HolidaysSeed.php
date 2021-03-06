<?php
use Migrations\AbstractSeed;

/**
 * Holidays seed.
 */
class HolidaysSeed extends AbstractSeed
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
            [
                'date' => '2018-01-01',
                'name' => '元日'
            ],
            [
                'date' => '2018-01-08',
                'name' => '成人の日'
            ],
            [
                'date' => '2018-02-11',
                'name' => '建国記念の日'
            ],
            [
                'date' => '2018-02-12',
                'name' => '振替休日'
            ],
            [
                'date' => '2018-03-21',
                'name' => '春分の日'
            ],
            [
                'date' => '2018-04-29',
                'name' => '昭和の日'
            ],
            [
                'date' => '2018-04-30',
                'name' => '振替休日'
            ],
            [
                'date' => '2018-05-03',
                'name' => '憲法記念日'
            ],
            [
                'date' => '2018-05-04',
                'name' => 'みどりの日'
            ],
            [
                'date' => '2018-05-05',
                'name' => 'こどもの日'
            ],
            [
                'date' => '2018-07-16',
                'name' => '海の日'
            ],
            [
                'date' => '2018-08-11',
                'name' => '山の日'
            ],
            [
                'date' => '2018-09-17',
                'name' => '敬老の日'
            ],
            [
                'date' => '2018-09-23',
                'name' => '秋分の日'
            ],
            [
                'date' => '2018-09-24',
                'name' => '振替休日'
            ],
            [
                'date' => '2018-10-08',
                'name' => '体育の日'
            ],
            [
                'date' => '2018-11-03',
                'name' => '文化の日'
            ],
            [
                'date' => '2018-11-23',
                'name' => '勤労感謝の日'
            ],
            [
                'date' => '2018-12-23',
                'name' => '天皇誕生日'
            ],
            [
                'date' => '2018-12-24',
                'name' => '振替休日'
            ],
        ];
        $table = $this->table('holidays');
        $table->insert($data)->save();
    }
}
