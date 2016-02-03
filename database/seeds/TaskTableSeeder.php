<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all()->pluck('name', 'id')->toArray();
        $projects = \App\Project::all()->pluck('name', 'id')->toArray();

        factory(Task::class, 80)->create();
    }
}
