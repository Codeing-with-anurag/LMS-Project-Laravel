    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('front.dashboard') }}" class="{{ Route::is('front.dashboard') ? 'active' : '' }}"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a>
        </li>
        <li>
            <a href="{{ route('front.profile') }}" class="{{ Route::is('front.profile') ? 'active' : '' }}"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;MY Profile</a>
        </li>
        <li>
            <a href="#" class="{{ Route::is('front.profile') ? 'active' : '' }}"><i class="fa fa-th"></i>&nbsp;&nbsp;&nbsp;My Plan</a>
        </li>
        <li>
            <a href="{{ route('front.changepassword') }}" class="{{ Route::is('front.changepassword') ? 'active' : '' }}"><i class="fa fa-key"></i>&nbsp;&nbsp;&nbsp;Change Password</a>
        </li>
    </ul>
