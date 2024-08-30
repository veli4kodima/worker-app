@extends('layout.main')
@section('show')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="flex items-center">
            <div class="ml-8">
                <h1 class="text-4xl font-bold">{{ $worker->name }}</h1>
                <p class="text-xl text-gray-600">{{ $worker->surname }}</p>
                <p class="text-gray-600 mt-2">ID: {{ $worker->age }}</p>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-4">Контактная информация</h2>
            <p class="text-gray-700"><span class="font-bold">Email:</span> {{ $worker->email }}</p>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-4">Дополнительная информация</h2>
            <p class="text-gray-700">{{ $worker->description }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('worker.edit', $worker->id) }}" class="text-blue-500 hover:underline">Редактировать</a>
        </div>

        <div class="mt-6">
            <form action="{{ route('worker.delete', $worker->id) }}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="Удалить" class="text-blue-500 hover:underline"></input>
            </form>
        </div>

        <div class="mt-6">
            <a href="{{ route('worker.index') }}" class="text-blue-500 hover:underline">Вернуться к списку</a>
        </div>
    </div>
</div>
@endsection

