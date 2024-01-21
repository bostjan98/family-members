<!-- resources/views/livewire/family-members-edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Family Member</h1>

        <form method="post" action="{{ route('family.update', $familyMember->id) }}">
            @csrf
            @method('put')

            <!-- Your form fields go here, for example: -->
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $familyMember->name }}">
            </div>

            <!-- Add other form fields for editing family member details -->

            <div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection