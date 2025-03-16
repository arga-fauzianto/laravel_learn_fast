<!-- resources/views/cards/checklist.blade.php -->
@extends('layouts.app')

@section('content')
<div class="p-4">
    <h1 class="text-3xl font-bold mb-4">{{ $card->title }}</h1>
    <form action="{{ route('cards.checklists.store', $card) }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Checklist Item" class="w-full p-2 mb-4 rounded" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add to Checklist</button>
    </form>
    <div>
        <h2 class="text-xl font-bold">Checklist</h2>
        <ul>
            @foreach ($card->checklists as $checklist)
            <li class="flex items-center">
                <input type="checkbox" {{ $checklist->completed ? 'checked' : '' }}>
                <span class="ml-2">{{ $checklist->name }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
