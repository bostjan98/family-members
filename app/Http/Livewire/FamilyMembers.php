<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\FamilyMember;
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

        // Add any necessary data to the view
        return view('livewire.family-members-edit', compact('familyMember'));
    }

    public function update(Request $request, $id)
    {
        $familyMember = FamilyMember::find($id);

        // Validate and update the family member based on the form data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules for other fields
        ]);

        $familyMember->update([
            'name' => $request->input('name'),
            // Update other fields here
        ]);

        return redirect()->route('family-members')->with('success', 'Family member updated successfully');
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
}