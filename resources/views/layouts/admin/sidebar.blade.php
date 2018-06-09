<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('backend/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>

        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Admin Menu</li>

            <li class="active">
                <a href="{{route('admin.dashboard')}}">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.allusers.index')}}">
                    <i class="material-icons">person</i>
                    <span>All Users</span>
                </a>
            </li>
            <li>
                <a href="pages/typography.html">
                    <i class="material-icons">text_fields</i>
                    <span>Typography</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">language</i>
                    <span>Website Control</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="">Website Title</a>
                    </li>
                    <li>
                        <a href="">Slider Setting</a>
                    </li>



                </ul>
            </li>

        </ul>

    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2017 - {{date('Y')}} <a href="javascript:void(0);">E-Wallet</a>.
        </div>
        <div class="version">
            <b>Version: </b> 10.01
        </div>
    </div>
    <!-- #Footer -->
</aside>