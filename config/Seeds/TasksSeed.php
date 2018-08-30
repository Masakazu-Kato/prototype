<?php
use Migrations\AbstractSeed;

/**
 * Tasks seed.
 */
class TasksSeed extends AbstractSeed
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
                'name' => 'タスク (Tasks) [ '.$i.' ]',
                'text' => $faker->realText(($faker->numberBetween(20,30))),
                'start' => date('Y-m-d H:i:s'),
                'end' => date("Y-m-d H:i:s",strtotime("+1 hour")),
                'user_id' => $i,
                'assign_id' => $i,
                'student_id' => $i,
                'task_status_id' => $faker->numberBetween(1,4),
                'assigned' => date('Y-m-d H:i:s'),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('tasks');
        $table->insert($data)->save();
    }
}
