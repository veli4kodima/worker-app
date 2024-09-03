<?php

namespace App\Console\Commands;

use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
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
//        $this->prepareData();
//        $this->prepareManyToMany();

        $worker = Worker::find(2);
//
//        $positions = Position::where('department_id', $department->id)->where('title', 'Boss')->first();
//
//        $worker = Worker::where('position_id', $positions->id)->first();
//        dd($worker->toArray());

        dd($worker->position->department->toArray());

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
            "worker_id" => $worker1->id,
            "city" => "Tokyo",
            "skill" => "Backend",
            "experience" => 5,
            "finished_study_at" => "2022-10-12",
        ];

        $profileData2 = [
            "worker_id" => $worker2->id,
            "city" => "Rio",
            "skill" => "Boss",
            "experience" => 10,
            "finished_study_at" => "2014-10-12",
        ];

        $profileData3 = [
            "worker_id" => $worker3->id,
            "city" => "Berlin",
            "skill" => "Frontend",
            "experience" => 1,
            "finished_study_at" => "2024-10-12",
        ];

        $profileData4 = [
            "worker_id" => $worker4->id,
            "city" => "Madrid",
            "skill" => "Admin",
            "experience" => 3,
            "finished_study_at" => "2020-10-12",
        ];

        $profileData5 = [
            "worker_id" => $worker5->id,
            "city" => "Paris",
            "skill" => "Backend",
            "experience" => 3,
            "finished_study_at" => "2018-10-12",
        ];

        $profileData6 = [
            "worker_id" => $worker6->id,
            "city" => "Ottawa",
            "skill" => "Admin",
            "experience" => 3,
            "finished_study_at" => "2023-10-12",
        ];

        $profile1 = Profile::create($profileData1);
        $profile2 = Profile::create($profileData2);
        $profile3 = Profile::create($profileData3);
        $profile4 = Profile::create($profileData1);
        $profile5 = Profile::create($profileData2);
        $profile6 = Profile::create($profileData3);

//        dd($profile1);
    }

    private function prepareManyToMany()
    {
        $workerBackend = Worker::find(1);
        $workerManager1 = Worker::find(2);
        $workerFrontend = Worker::find(3);
        $workerDesign1 = Worker::find(4);
        $workerDesign2 = Worker::find(5);
        $workerManager2 = Worker::find(6);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);
        $project2 = Project::create([
            'title' => 'Blog'
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerManager1->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerBackend->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerFrontend->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerDesign1->id,
        ]);


        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerManager2->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerBackend->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerFrontend->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerDesign2->id,
        ]);

    }

}
