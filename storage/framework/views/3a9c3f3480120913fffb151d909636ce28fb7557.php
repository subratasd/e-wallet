<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo e(asset('backend/images/user.png')); ?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
            <div class="email"><?php echo e(Auth::user()->email); ?></div>

        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header"><h3 class="text-center"><b id="ddd"></b> USD</h3></li>

            <li class="<?php echo e(Request::is('user/dashboard') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('user.dashboard')); ?>">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php if(Auth::user()->profile == 1): ?>
            <li class="<?php echo e(Request::is('user/send') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('user.send')); ?>">
                    <i class="material-icons">money</i>
                    <span>Send Money</span>
                </a>
            </li>
            <?php endif; ?>
            <li class="<?php echo e(Request::is('user/profile') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('user.profile.index')); ?>">
                    <i class="material-icons">person</i>
                    <span>Profile</span>
                </a>
            </li>


            <li class="<?php echo e(Request::is('user/dd') ? 'active' : ''); ?>">
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
            &copy; 2017 - <?php echo e(date('Y')); ?> <a href="javascript:void(0);"><?php echo e(sitename()); ?></a>.
        </div>
        <div class="version">
            <b>Version: </b> 10.01
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->