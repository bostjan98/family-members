<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\FamilyMemberCreated;
use App\Models\FamilyMember;
use App\Models\User; 
use App\Models\Relationship;
use Livewire\Livewire;
use Livewire\Component;
use App\Http\Livewire\FamilyMembers;

class FamilyMemberController extends Controller
{
    public function createForm()
    {
        $users = User::all(); // Fetch all users from the database
        $relationships = Relationship::all(); // Fetch all relationships from the database

        return view('family-members.create', ['users' => $users, 'relationships' => $relationships]);
    }

    public function create(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id'=>'required',
            'relation_name_id' => 'required|different:user_id',
            'relationship_id' => 'required',

            // Add other validation rules for other fields
        ]);

        // Create a new family member
        FamilyMember::create([
            'user_id'=>$request->input('user_id'),
            'name' => $this->getUserName($request->input('user_id')),
            'relation_name_id' => $request->input('relation_name_id'),
            'relationship_id' => $request->input('relationship_id'),
            // Add other fields here
        ]);

        // Emit Livewire event
        event(new FamilyMemberCreated());

    // Use JavaScript to redirect after Livewire finishes processing
    return view('livewire.family-members-create-script');
    }

    function getUserName($id){
        $user = User::find($id);
        return $user->name;
    }
}
