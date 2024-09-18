@extends('layout.main')
@section('index')
<!-- Ваш контент с использованием Tailwind -->
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Список Рабочих</h1>
        @can('create', Worker::class)
        <a href="{{ route('workers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Добавить сотрудника
        </a>
        @endcan
    </div>

    <div class="p-4 bg-white shadow rounded-lg mb-5">
        <form action="{{route('workers.index')}}">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ request()->get('name') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                    <input type="text" name="surname" id="surname" value="{{ request()->get('surname') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ request()->get('email') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" name="age" id="age" value="{{ request()->get('age') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="is_married" class="block text-sm font-medium text-gray-700">Married</label>
                    <select name="is_married" id="is_married"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">Select status</option>
                        <option value="1" {{ request('is_married') == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ request('is_married') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($workers as $worker)
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold">{{ $worker->name }}</h2>
                        <p class="text-gray-600">{{ $worker->surname }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-gray-700">Email: {{ $worker->email }}</p>
                    <p class="text-gray-700">Возраст: {{ $worker->age }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('workers.show', $worker->id) }}" class="text-blue-500 hover:underline">Подробнее</a>
                </div>
                @can('update', $worker)
                <div class="mt-4">
                    <a href="{{ route('workers.edit', $worker->id) }}" class="text-blue-500 hover:underline">Редактировать</a>
                </div>
                @endcan
                @can('delete', $worker)
                <div class="mt-4">
                    <form action="{{ route('workers.destroy', $worker->id) }}" method="post">
                        @csrf
                        @method('Delete')
                        <input type="submit" value="Удалить" class="text-blue-500 hover:underline"></input>
                    </form>
                </div>
                @endcan
            </div>
        @endforeach
            <div class="mt-4">
                {{ $workers->withQueryString(5)->links('pagination::tailwind') }}
            </div>
    </div>
</div>
@endsection

