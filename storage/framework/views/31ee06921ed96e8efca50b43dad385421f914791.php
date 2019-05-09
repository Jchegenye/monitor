<nav class="navbar navbar-expand-lg navbar-light" id="top-bar">
    
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span class=""></span>
            <span class=""></span>
            <span class=""></span>
        </button>

        <a class="mobile navbar-brand d-lg-none align-items-center" href="<?php echo e(url('/')); ?>">
            <strong><?php echo e(CommonHelper::abbreviate( CommonHelper::custom_app_name() )); ?></strong>
        </a>

        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                
                    <li class="nav-item dropdown">

                            <?php
                            $user_avater_url;
                            if (Auth::user()->user_photo){
                                $user_avater_url = Auth::user()->user_photo;
                            }else{
                                $user_avater_url = "user-avater.png";
                            }
                        ?>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">

                                <a class="dropdown-item" href="<?php echo e(url('/dashboard/profile/settings')); ?>"><i class="fa fa-user"></i> My Profile</a>
    
                                <a class="dropdown-item" href="#"><i class="fa fa-bell"></i> Notifications <span class="badge badge-pill badge-danger">13</span></a>
        
                                <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Settings</a>
    
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

                                </a>
    
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
    
                            </div>

                        
                        <a id="profileDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?> 
                            <img class="user-avatar rounded-circle" src="<?php echo e(URL::asset('/images/'. $user_avater_url)); ?>" alt="User Avatar">
                            <span class="badge badge-pill badge-danger generalN">13</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">

                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="dropdown-item" href="#"><i class="fa fa-bell"></i> Notifications <span class="badge badge-pill badge-danger">13</span></a>
    
                            <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>

                        </div>
                        
                    </li>
                <?php endif; ?>
            </ul>
            
        </div>

    </div>

        
</nav><?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/layouts/inner/top-menu.blade.php ENDPATH**/ ?>