<?php
use Migrations\AbstractSeed;

/**
 * Databases seed.
 */
class DatabasesSeed extends AbstractSeed
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
        // 初期セット
        $this->call('PrefecturesSeed');
        $this->call('HolidaysSeed');
        $this->call('RolesSeed');
        $this->call('ApplicationsSeed');
        $this->call('DepartmentsSeed');
        $this->call('MailTypesSeed');

        // テスト用
        $this->call('StudentsSeed');
        $this->call('UsersSeed');
        $this->call('NotesSeed');
        $this->call('TasksSeed');
        $this->call('MailTemplatesSeed');
        $this->call('MailsSeed');

        $this->call('ShortMessagesSeed');
        $this->call('ApplicationErrorsSeed');

        $this->call('RolesUsersSeed');
        $this->call('DepartmentsUsersSeed');
        $this->call('StudentSurveysSeed');
        $this->call('TaskStatusesSeed');

    }
}