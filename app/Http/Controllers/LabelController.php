<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Card;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function store(Request $request, Card $card)
    {
        $request->validate(['name' => 'required|string|max:255', 'color' => 'required|string']);
        $card->labels()->create($request->all());
        return redirect()->route('boards.show', $card->list->board);
    }
}
