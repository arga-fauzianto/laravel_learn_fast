<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\ListCard;
use Illuminate\Http\Request;

class ListCardController extends Controller
{
    public function store(Request $request, Board $board)
    {
        // Validasi input
        $request->validate(['name' => 'required|string|max:255']);

        // Buat list baru
        $listCard = new ListCard();
        $listCard->name = $request->name;
        $listCard->board_id = $board->id; // Asumsikan ada relasi board_id di model ListCard
        $listCard->save();

        // Redirect kembali ke halaman board
        return redirect()->route('boards.show', $board)->with('success', 'List created successfully.');
    }
    public function destroy(Board $board, ListCard $list)
    {
        $list->delete();
        return redirect()->route('boards.show', $board)->with('success', 'List deleted successfully.');
    }
    

}
