<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index()
    {
        // Fetch boards associated with the authenticated user
        $boards = Board::where('user_id', Auth::id())->get();
        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate(['name' => 'required|string|max:255']);
    
        // Debugging: Check if user is authenticated
        if (!Auth::check()) {
            dd('User is not authenticated');
        }
    
        // Debugging: Check the user ID
        $userId = Auth::id();
        // Create a new board associated with the authenticated user
        Board::create([
            'name' => $request->name,
            'user_id' => $userId,
        ]);
    
        return redirect()->route('boards.index')->with('success', 'Board created successfully.');
    }
    
    public function show(Board $board)
    {
        // Ensure the user has access to the board
        if ($board->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('boards.show', compact('board'));
    }

    public function destroy(Board $board)
    {
        // Ensure the user has access to the board
        if ($board->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the board
        $board->delete();
        return redirect()->route('boards.index')->with('success', 'Board deleted successfully.');
    }
}
