@extends('layout.main')
@section('create')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('worker.store') }}" method="POST" class="w-full max-w-lg p-4 bg-white shadow-md rounded">
        @csrf
        <!-- поля формы здесь -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div class="mb-4">
            <label for="surname" class="block text-gray-700 text-sm font-bold mb-2">Surname</label>
            <input type="text" id="surname" name="surname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('surname')}}" required>
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('email')}}"  required>
            @error('name')
            {{$message}}
            @enderror
        </div>

        <div class="mb-4">
            <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
            <input type="number" id="age" name="age" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('age')}}">
            @error('name')
            {{$message}}
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                {{old('description')}}
            </textarea>
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div class="mb-4">
            <label for="is_married" class="block text-gray-700 text-sm font-bold mb-2">Married</label>
            <select id="is_married" name="is_married" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="1" @selected(old("is_married") == 1)>Yes</option>
                <option value="0" @selected(old("is_married") == 0)>No</option>
            </select>
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Submit
            </button>
        </div>
    </form>
</div>

@endsection
