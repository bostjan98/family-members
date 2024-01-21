<div>
    <h1>Family Members</h1>

    <table>
        <thead>
          <tr>
            <th>User_id</th>
            <th>User_name</th>
            <th>Family Name</th>
            <th>relation_name_id</th>
            <th>Relations</th>
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
          </tr>
          @endforeach
        </tbody>
      </table>

</div>
