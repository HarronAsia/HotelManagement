<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <p class="card-title font-weight-bold">About</p>
            </div>
            @if(Auth::user()->id == $user->id)
                @if($user->profile)
                <div class="col-md-2">
                    <a href="{{route('profile.edit',['user'=>$user->name,'profile'=>$user->profile->user_id])}}" class="btn btn-info">
                        <i class="fas fa-edit" style="font-size:15px;"></i>&ensp;
                        Edit Profile
                    </a>
                </div>
                @else
                <div class="col-md-2">
                    <a href="{{route('profile.add',$user->name)}}" class="btn btn-primary">
                        <i class="fas fa-plus" style="font-size:15px; "></i>&ensp;
                        Add Profile
                    </a>
                </div>
                @endif
            @else

            @endif
        </div>
        <hr>
        <p class="card-description">User Information</p>
        <ul class="about">
            <li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Name:</span><span class="about-item-detail">{{$user->name}}</span></li>
            <li class="about-items"><i class="mdi mdi-mail-ru icon-sm "></i><span class="about-item-name">username:</span><span class="about-item-detail">{{$user->profile->username??''}}</span> </li>
            <li class="about-items"><i class="mdi mdi-format-align-left icon-sm "></i><span class="about-item-name">Bio:</span><span class="about-item-detail">{{$user->profile->bio??''}}.</span> </li>

            <li class="about-items"><i class="mdi mdi-trophy-variant-outline icon-sm "></i><span class="about-item-name">Has Paid:</span><span class="about-item-detail">
                    <span class="about-item-detail">{{$user->profile->balance??''}}</span>
            </li>

        </ul>
        <p class="card-description">Contact Information</p>
        <ul class="about">
            <li class="about-items"><i class="mdi mdi-phone icon-sm "></i><span class="about-item-name">Phone:</span><span class="about-item-detail">+{{$user->profile->number??''}}</span></li>
            <li class="about-items"><i class="mdi mdi-map-marker icon-sm "></i><span class="about-item-name">Address:</span><span class="about-item-detail">{{$user->profile->place??''}}</span> </li>
            <li class="about-items"><i class="mdi mdi-email-outline icon-sm "></i><span class="about-item-name">Email:</span><span class="about-item-detail"><a href="">{{$user->email}}</a></span> </li>
            <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Google Plus Link:</span><span class="about-item-detail"><a href="google.com">{{$user->profile->google_plus_link??''}}</a></span> </li>
            <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Yahoo Link:</span><span class="about-item-detail"><a href="google.com">{{$user->profile->yahoo_link??''}}</a></span> </li>
            <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Skype Link:</span><span class="about-item-detail"><a href="google.com">{{$user->profile->skype_link??''}}</a></span> </li>
            <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Facebook Link:</span><span class="about-item-detail"><a href="google.com">{{$user->profile->facebook_link??''}}</a></span> </li>
            <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Twitter Link:</span><span class="about-item-detail"><a href="google.com">{{$user->profile->twitter_link??''}}</a></span> </li>
            <li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Instagram Link:</span><span class="about-item-detail"><a href="google.com">{{$user->profile->instagram_link??''}}</a></span> </li>
        </ul>
        <p class="card-description">Basic Information</p>
        <ul class="about">
            <li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span class="about-item-name">Birthday:</span><span class="about-item-detail">{{$user->profile->dob??''}}</span></li>
            <li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Gender:</span><span class="about-item-detail">{{$user->profile->gender??''}}</span> </li>
            <li class="about-items"><i class="mdi mdi-clipboard-account icon-sm "></i><span class="about-item-name">Profession:</span><span class="about-item-detail">{{$user->profile->job??''}}</span> </li>
            <li class="about-items"><i class="mdi mdi-water icon-sm "></i><span class="about-item-name">Blood Group:</span><span class="about-item-detail">{{$user->profile->blood??''}}+</span> </li>
            <li class="about-items"><i class="mdi mdi-human-male-female icon-sm "></i><span class="about-item-name">Relationship Status:</span><span class="about-item-detail">{{$user->profile->relationship??''}}</span> </li>
        </ul>

    </div>
</div>