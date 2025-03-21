<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\ListCard; // Ensure this is the correct model for your lists
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'list_id' => 'required|exists:list_cards,id',  // Ensure this references the correct table
        ]);

        // Create a new card for the given list with the validated data
        $listCard = ListCard::findOrFail($request->list_id); // Find the list using the list_id
        $listCard->cards()->create([
            'title' => $request->title,
            'description' => $request->description,  // If description is provided
            'list_id' => $request->list_id, // Include the list_id
        ]);

        // Redirect back to the board view
        return redirect()->route('boards.show', $listCard->board);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        // Delete the card
        $card->delete();

        // Redirect back to the board view
        return redirect()->route('boards.show', $card->list->board);
    }

    public function update(Request $request, Card $card)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'list_id' => 'required|exists:list_cards,id',  // Ensure this references the correct table
        ]);

        // Update the card with the new data
        $card->update([
            'title' => $request->title,
            'list_id' => $request->list_id,  // Include the updated list_id
            'description' => $request->description,  // If description is provided
        ]);

        // Redirect back to the board view
        return redirect()->route('boards.show', $card->list->board);
    }

    public function move(Request $request, Card $card)
    {   
        // Validate that the list_id exists in the list_cards table
        $request->validate(['list_id' => 'required|exists:list_cards,id']);

        // Update the list_id for the card (moving it to a new list)
        $card->update(['list_id' => $request->list_id]);

        // Redirect back to the board view
        return redirect()->route('boards.show', $card->list->board);
    }
}
