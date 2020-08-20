<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>

            <th>User Name</th>
            <th>Phone Number</th>
            <th>Personal ID</th>
            <th>Occur Date</th>
            <th>Occur Location</th>
            <th>Date Of Birth</th>
            <th>Sex</th>
            <th>Address</th>
            <th>Profession</th>
            <th>Blood Type</th>
            <th>Relationship</th>
            <th>Introduction</th>

            <th>Google Plus link</th>
            <th>Yahoo Link</th>
            <th>Skype Link</th>
            <th>Facebook Link</th>
            <th>Twitter Link</th>
            <th>Instagram Link</th>

            <th>User</th>
            <th>Created On</th>
            <th>Last Update</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>

            <td>{{$user->profile->username??''}}</td>
            <td>{{$user->profile->number??''}}</td>
            <td>{{$user->profile->personal_id??''}}</td>
            <td>{{$user->profile->personal_id_date??''}}</td>
            <td>{{$user->profile->personal_id_where??''}}</td>
            <td>{{$user->profile->dob??''}}</td>
            <td>{{$user->profile->gender??''}}</td>
            <td>{{$user->profile->place??''}}</td>
            <td>{{$user->profile->job??''}}</td>
            <td>{{$user->profile->blood??''}}</td>
            <td>{{$user->profile->relationship??''}}</td>
            <td>{{$user->profile->bio??''}}</td>

            <td>{{$user->profile->google_plus_link??''}}</td>
            <td>{{$user->profile->yahoo_link??''}}</td>
            <td>{{$user->profile->skype_link??''}}</td>
            <td>{{$user->profile->facebook_link??''}}</td>
            <td>{{$user->profile->twitter_link??''}}</td>
            <td>{{$user->profile->instagram_link??''}}</td>

            <td>{{$user->profile->user_id??''}}</td>
            <td>{{$user->profile->created_at??''}}</td>
            <td>{{$user->profile->updated_at??''}}</td>
        </tr>
        @endforeach

    </tbody>
</table>