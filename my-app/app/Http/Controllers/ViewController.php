<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ViewController extends Controller
{
    // Show the user search form
    public function showUserForm()
    {
        return view('view');
    }

    // Find user by ID and display their details
    public function findUser(Request $request)
    {
        // Validate the user ID input
        $request->validate([
            'id' => 'required|numeric|exists:users,id',
        ]);

        // Find the user by ID
        $user = User::find($request->id);

        if ($user) {
            // Return the view with user data
            return view('view', compact('user'));
        } else {
            // Redirect back with an error message if user not found
            return redirect()->route('view.form')->with('error', 'User not found.');
        }
    }

}
