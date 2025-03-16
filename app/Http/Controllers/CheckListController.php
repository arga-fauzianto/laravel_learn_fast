<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Card;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function store(Request $request, Card $card)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $card->checklists()->create($request->all());
        return redirect()->route('boards.show', $card->list->board);
    }
}
