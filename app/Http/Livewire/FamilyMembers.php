<?php

namespace App\Http\Livewire;

use Livewire\Component;
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
}
