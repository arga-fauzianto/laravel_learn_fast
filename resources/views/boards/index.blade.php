@extends('layouts.app')

@section('content')
<div class="p-4" x-data="{ isOpen: false }">
    <h1 class="text-3xl font-bold mb-4">Boards</h1>
    <button @click="isOpen = true" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600 transition duration-200">Create Board</button>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($boards as $board)
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-200">
            <h2 class="text-xl font-bold">{{ $board->name }}</h2>
            <a href="{{ route('boards.show', $board) }}" class="text-blue-500 hover:underline">View Board</a>
        </div>
        @endforeach
    </div>

    <!-- Modal for Creating Board -->
    <div x-show="isOpen" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;" @click.away="isOpen = false" x-transition>
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
            <h2 class="text-2xl font-bold mb-4">Create New Board</h2>
            <form action="{{ route('boards.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Board Name</label>
                    <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="isOpen = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection