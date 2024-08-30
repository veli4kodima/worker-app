<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $workersQuery = Worker::query();

        if(isset($data['name'])){
            $workersQuery->where('name', 'like', "%{$data['name']}%");
        }

        if(isset($data['surname'])){
            $workersQuery->where('surname', 'like', "%{$data['surname']}%");
        }

        if(isset($data['email'])){
            $workersQuery->where('email', 'like', "%{$data['email']}%");
        }

        if(isset($data['age'])){
            $workersQuery->where('age', $data['age']);
        }

        if(isset($data['is_married'])){
            $workersQuery->where('is_married', $data['is_married']);
        }

        $workers = $workersQuery->paginate(2);


        return view('worker.index', compact('workers'));
    }


    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {
        return view('worker.create');
    }

    public function store(StoreRequest $request)
    {

        $validated = $request->validated();
        $worker = Worker::create($validated);

        return redirect()->route('worker.index')->with('success', 'Worker has been created');

    }

    public function edit(Worker $worker) {

        return view('worker.edit', compact('worker'));

    }

    public function update(UpdateRequest $request, $id) {

        $worker = Worker::findOrFail($id);

        $worker->update($request->validated());

        return redirect()->route('worker.index')->with('success', 'Worker has been updated');

    }

    public function delete($id) {

        $worker = Worker::find($id);

        $worker->delete();

        return redirect()->route('worker.index')->with('success', 'Worker has been deleted');

    }
}
