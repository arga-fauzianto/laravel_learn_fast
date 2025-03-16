<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\List;
use App\Models\ListCard;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function store(Request $request, ListCard $list_card)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $list_card->cards()->create($request->all());
        return redirect()->route('boards.show', $list_card->board);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('boards.show', $card->list->board);
    }

    public function update(Request $request, Card $card)
    {
        $card->update($request->all());
        return redirect()->route('boards.show', $card->list->board);
    }

    public function updatePosition(Request $request)
    {
        $cardId = $request->input('card_id');
        $listId = $request->input('list_id');
        $cardOrder = $request->input('cardOrder');

        // Update posisi kartu di database
        foreach ($cardOrder as $index => $id) {
            Card::where('id', $id)->update([
                'list_id' => $listId,
                'order' => $index
            ]);
        }

        return response()->json(['message' => 'Card position updated successfully']);
    }

    public function move(Request $request, Card $card)
    {
        $request->validate(['list_id' => 'required|exists:lists,id']);
        $card->update(['list_id' => $request->list_id]);
        return redirect()->route('boards.show', $card->list->board);
    }
}

