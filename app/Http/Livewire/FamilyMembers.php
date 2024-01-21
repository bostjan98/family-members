<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\FamilyMember;

class FamilyMembers extends Component
{
    public $familyMembers; // Define the variable to be used in the view

    public function mount()
    {
        $this->familyMembers = FamilyMember::with(['user', 'relationship'])->get();
    }

    public function render()
    {
        return view('livewire.family-members')
        ->layout('layouts.app')
        ->extends('livewire.layouts.app')
        ->section('content');
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
