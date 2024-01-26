<!-- resources/views/livewire/family-members.blade.php -->
@extends('livewire.layouts.app')

@section('content')
    <div>
        <h1>Family Members</h1>

        <!-- Link to add a new family member -->
        <a href="{{ route('family-members.create') }}">Add New Family Member</a>

        <table>
            <thead>
                <tr>
                    <th>User_id</th>
                    <th>User_name</th>
                    <th>Family Name</th>
                    <th>relation_name_id</th>
                    <th>Relations</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($familyMembers as $familyMember)
                    <tr>
                        <td>{{ $familyMember->user_id }}</td>
                        <td>{{ $familyMember->user->name }}</td>
                        <td>{{ $familyMember->name }}</td>
                        <td>{{ $familyMember->relation_name_id }}</td>
                        <td>
                            {{ $familyMember->relationship->name }}
                        </td>
                        <td>
                            <a href="{{ route('family.edit', $familyMember->id) }}">Edit</a>
                            <form method="POST" action="{{ route('family.delete', $familyMember->id) }}" onsubmit="return confirm('Are you sure you want to delete this family member?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('familyMemberDeleted', data => {
                    window.location.href = data.route;
                });
            });
        </script>
    </div>
@endsection