<?php

namespace App\Console\Commands;

use App\Jobs\SomeJob;
use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create worker';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        SomeJob::dispatchSync()->onQueue('some_queue');

        return 0;
    }

    private function prepareData()
    {

        $department1 = Department::create([
            'title' => 'IT',
        ]);

        $department2 = Department::create([
            'title' => 'Analytics',
        ]);

        $position1 = Position::create([
           'title' => 'Developer',
            'department_id' => $department1->id,
        ]);
        $position2 = Position::create([
           'title' => 'Manager',
            'department_id' => $department1->id,
        ]);
        $position3 = Position::create([
           'title' => 'Design',
            'department_id' => $department1->id,
        ]);

        $workerData1 = [
            "name" => "Ivan",
            "surname" => "Ivanov",
            "email" => "ivanov@gmrrail.com",
            "position_id" => $position1->id,
            "age" => "22",
            "description" => "Some description",
            "is_married" => 0
        ];

        $workerData2 = [
            "name" => "Carl",
            "surname" => "Carlov",
            "email" => "carl@gmrrail.com",
            "position_id" => $position2->id,
            "age" => "28",
            "description" => "Some description",
            "is_married" => 1
        ];

        $workerData3 = [
            "name" => "Kate",
            "surname" => "Bakinseil",
            "email" => "kate@gmrrail.com",
            "position_id" => $position1->id,
            "age" => "18",
            "description" => "Some description",
            "is_married" => 0
        ];

        $workerData4 = [
            "name" => "Liza",
            "surname" => "Onyx",
            "email" => "liza@gmrrail.com",
            "position_id" => $position3->id,
            "age" => "36",
            "description" => "Some description",
            "is_married" => 1
        ];

        $workerData5 = [
            "name" => "Petro",
            "surname" => "Petrenko",
            "email" => "petro@gmrrail.com",
            "position_id" => $position3->id,
            "age" => "41",
            "description" => "Some description",
            "is_married" => 0
        ];

        $workerData6 = [
            "name" => "Sergey",
            "surname" => "Grenko",
            "email" => "sergey@gmrrail.com",
            "position_id" => $position2->id,
            "age" => "26",
            "description" => "Some description",
            "is_married" => 0
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

        $profileData1 = [
            "city" => "Tokyo",
            "skill" => "Backend",
            "experience" => 5,
            "finished_study_at" => "2022-10-12",
        ];

        $profileData2 = [
            "city" => "Rio",
            "skill" => "Boss",
            "experience" => 10,
            "finished_study_at" => "2014-10-12",
        ];

        $profileData3 = [
            "city" => "Berlin",
            "skill" => "Frontend",
            "experience" => 1,
            "finished_study_at" => "2024-10-12",
        ];

        $profileData4 = [
            "city" => "Madrid",
            "skill" => "Admin",
            "experience" => 3,
            "finished_study_at" => "2020-10-12",
        ];

        $profileData5 = [
            "city" => "Paris",
            "skill" => "Backend",
            "experience" => 3,
            "finished_study_at" => "2018-10-12",
        ];

        $profileData6 = [
            "city" => "Ottawa",
            "skill" => "Admin",
            "experience" => 3,
            "finished_study_at" => "2023-10-12",
        ];

        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);
//        $profile1 = Profile::create($profileData1);
//        $profile2 = Profile::create($profileData2);
//        $profile3 = Profile::create($profileData3);
//        $profile4 = Profile::create($profileData1);
//        $profile5 = Profile::create($profileData2);
//        $profile6 = Profile::create($profileData3);

//        dd($profile1);
    }

    private function prepareManyToMany()
    {
        $workerBackend = Worker::find(1);
        $workerFrontend = Worker::find(3);
        $workerManager1 = Worker::find(2);
        $workerManager2 = Worker::find(6);
        $workerDesign1 = Worker::find(4);
        $workerDesign2 = Worker::find(5);


        $project1 = Project::create([
            'title' => 'Shop'
        ]);
        $project2 = Project::create([
            'title' => 'Blog'
        ]);

        $project1->workers()->attach([
            $workerManager1->id,
            $workerBackend->id,
            $workerDesign1->id,
            $workerFrontend->id
        ]);

        $project2->workers()->attach([
            $workerManager2->id,
            $workerBackend->id,
            $workerDesign2->id,
            $workerFrontend->id
        ]);

    }

}
