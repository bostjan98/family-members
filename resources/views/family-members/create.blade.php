<!-- resources/views/family-members/create.blade.php -->
@extends('livewire.layouts.app')

@section('content')
    <form method="POST" action="{{ route('family-members.create') }}">
        @csrf

        <label for="user_id">Select User:</label>
        <select id="user_id" name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="relation_name_id">Select Relation Name:</label>
        <select id="relation_name_id" name="relation_name_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="relationship_id">Select Relationship:</label>
        <select id="relationship_id" name="relationship_id" required>
            @foreach($relationships as $relationship)
                <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
            @endforeach
        </select>

        <!-- Add other input fields as needed -->

        <button type="submit">Create Family Member</button>
    </form>
@endsection