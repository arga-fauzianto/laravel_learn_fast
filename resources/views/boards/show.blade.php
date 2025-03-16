<!-- resources/views/boards/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="p-4" x-data="{ isOpen: false, isCardOpen: false, currentList: null }">
    <h1 class="text-3xl font-bold mb-4">{{ $board->name }}</h1>
    
    <div class="flex space-x-4">
        @foreach ($board->lists as $list)
        <div class="bg-gray-100 p-4 rounded shadow w-1/4">
            <h2 class="text-xl font-bold">{{ $list->name }}</h2>
            <button class="text-blue-500 mt-2" @click="currentList = {{ $list->id }}; isCardOpen = true">+ Add a card</button>
            
            <!-- Tombol untuk menghapus list -->
            <form action="{{ route('boards.lists.destroy', [$board, $list]) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete List</button>
            </form>
        </div>
        @endforeach

        <!-- Tombol untuk menambahkan list baru -->
        <div class="bg-gray-100 p-4 rounded shadow w-1/4">
            <button @click="isOpen = true" class="text-blue-500">+ Add a list</button>
        </div>
    </div>

    <!-- Modal untuk Create List -->
    <div x-show="isOpen" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;" @click.away="isOpen = false" x-transition>
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-2xl font-bold mb-4">Add New List</h2>
            <form action="{{ route('boards.lists.store', $board) }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Enter list name..." class="w-full p-2 mb-4 border rounded" required>
                <div class="flex justify-end">
                    <button type="button" @click="isOpen = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add List</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal untuk Add Card -->
    <div x-show="isCardOpen" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;" @click.away="isCardOpen = false" x-transition>
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-2xl font-bold mb-4">Add New Card</h2>
            <form action="{{ route('cards.store') }}" method="POST">
                @csrf
                <input type="hidden" name="list_id" :value="currentList">
                <input type="text" name="title" placeholder="Enter card title..." class="w-full p-2 mb-4 border rounded" required>
                <div class="flex justify-end">
                    <button type="button" @click="isCardOpen = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Card</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
