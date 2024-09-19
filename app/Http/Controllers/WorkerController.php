<?php

namespace App\Http\Controllers;

use App\Http\Filters\V1\WorkerFilter;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = new WorkerFilter($data);
        $workersQuery = Worker::filter($filter);

        $workers = $workersQuery->paginate(10);
        return view('worker.index', compact('workers'));
    }


    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Worker::class)) {
            abort(403);
        }
        return view('worker.create');
    }

    public function store(StoreRequest $request)
    {

        if ($request->user()->cannot('create', Worker::class)) {
            abort(403);
        }

        $validated = $request->validated();
        $worker = Worker::create($validated);

        return redirect()->route('workers.index')->with('success', 'Worker has been created');

    }

    public function edit(Worker $worker , Request $request) {

        if ($request->user()->cannot('update', $worker)) {
            abort(403);
        }

        return view('worker.edit', compact('worker'));

    }

    public function update(UpdateRequest $request, Worker $worker) {

        if ($request->user()->cannot('update', $worker)) {
            abort(403);
        }

        $worker = Worker::findOrFail($worker->id);

        $worker->update($request->validated());

        return redirect()->route('workers.index')->with('success', 'Worker has been updated');

    }

    public function destroy(Worker $worker , Request $request) {

        if ($request->user()->cannot('delete', $worker )) {
            abort(403);
        }

        $worker = Worker::find($worker->id);

        $worker->delete();

        return redirect()->route('workers.index')->with('success', 'Worker has been deleted');

    }
}
