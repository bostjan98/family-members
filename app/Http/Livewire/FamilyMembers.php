<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\FamilyMember;
use App\Models\User; 
use App\Models\Relationship;
use Livewire\Component;

class FamilyMembers extends Component
{
    public $familyMembers; // Define the variable to be used in the view
    public $name;
    public $relation_name_id;
    public $createFormVisible = false;

    // Listen for Livewire event
    protected $listeners = ['familyMemberCreated' => 'refreshComponent'];

    // Method to refresh the component
    public function refreshComponent()
    {
        // Fetch family members
        $this->familyMembers = FamilyMember::with(['user', 'relationship'])->get();
    }

    public function render()
    {
        // Fetch family members
        $this->familyMembers = FamilyMember::with(['user', 'relationship'])->get();

        return view('livewire.family-members')->layout('livewire.layouts.app');
    }

    public function redirectTo()
    {
        return redirect()->route('family-members')->with('success', 'Family member created successfully');
    }

    public function edit($id)
    {
        $familyMember = FamilyMember::find($id);
        $users = User::all(); // Fetch all users from the database
        $relationships = Relationship::all(); // Fetch all relationships from the database

        // Add any necessary data to the view
        return view('livewire.family-members-edit', compact('familyMember', 'users', 'relationships'));
    }

    public function update(Request $request, $id)
    {
        $familyMember = FamilyMember::find($id);

        // Validate and update the family member based on the form data
        $request->validate([
            'user_id'=>'required',
            'relation_name_id' => 'required|different:user_id',
            'relationship_id' => 'required',
            // Add other validation rules for other fields
        ]);

        $familyMember->update([
            'user_id'=>$request->input('user_id'),
            'name' => $this->getUserName($request->input('relation_name_id')),
            'relation_name_id' => $request->input('relation_name_id'),
            'relationship_id' => $request->input('relationship_id'),
            // Update other fields here
        ]);

       // Use JavaScript to redirect after Livewire finishes processing
    return view('livewire.family-members-create-script');
    }

    public function deleteFamilyMember($id)
    {
        $familyMember = FamilyMember::find($id);

        if ($familyMember) {
            $familyMember->delete();

            $this->familyMembers = FamilyMember::with(['user', 'relationship'])->get();
            return redirect()->route('family-members');
        }
    }

    function getUserName($id){
        $user = User::find($id);
        return $user->name;
    }
}