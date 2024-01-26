<!-- resources/views/livewire/family-members-edit.blade.php -->

@extends('livewire.layouts.app')

@section('content')
    <div>
        <h1>Edit Family Member</h1>

        <form method="post" action="{{ route('family.update', $familyMember->id) }}">
            @csrf
            @method('put')

            <!-- Select User -->
            <div>
                <label for="user_id">Select User:</label>
                <select id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $familyMember->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Select Relation Name -->
            <div>
                <label for="relation_name_id">Select Relation Name:</label>
                <select id="relation_name_id" name="relation_name_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $familyMember->relation_name_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Select Relationship -->
            <div>
                <label for="relationship_id">Select Relationship:</label>
                <select id="relationship_id" name="relationship_id" required>
                    @foreach($relationships as $relationship)
                        <option value="{{ $relationship->id }}" {{ $familyMember->relationship_id == $relationship->id ? 'selected' : '' }}>
                            {{ $relationship->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Your other form fields go here -->

            <div>
                <button type="submit">Update Family Member</button>
            </div>
        </form>
    </div>
@endsection