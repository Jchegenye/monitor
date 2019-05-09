<nav id="sidebar">

    <div class="sidebar-header">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <strong><?php echo e(CommonHelper::abbreviate( CommonHelper::custom_app_name() )); ?></strong>

            <?php
                $company_avater_url;
                if (Auth::user()->company_photo){
                    $company_avater_url = Auth::user()->company_photo;
                }else{
                    $company_avater_url = "company-avater.png";
                }
            ?>
            <img class="img-fluid rounded-3 w-25 pb-2" src="<?php echo e(URL::asset('/images/'. $company_avater_url)); ?>" alt="Company Avater">

            <p class=""><?php echo e(CommonHelper::custom_app_name()); ?></p>
            <span class="">(<?php echo e(CommonHelper::abbreviate( CommonHelper::custom_app_name() )); ?>)</span>
        </a>
    </div>

    <ul class="list-unstyled components">
        
        <li class="active">
            <a href="<?php echo e(url('/home')); ?>">
                <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
        </li>

        <li>
            <div class="default">
                Monitoring
            </div>
        </li>

        <li class="active">
            <a href="#uptime" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                <i class="fas fa-thermometer"></i>Uptime
            </a>
            <ul class="collapse list-unstyled inner-menu show" id="uptime">
                <li>
                    <a href="<?php echo e(url('dashboard/monitoring/uptime/websites')); ?>"><i class="far fa-window-maximize"></i>Websites</a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-expeditedssl"></i>SSL certificate</a>
                </li>
                <li>
                    <a href="#"><i class="far fa-paper-plane"></i>Emails</a>
                </li>
            </ul>
        </li>

        <li>
            <div class="default">
                Reports
            </div>
        </li>

        <li>
            <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-flag-checkered"></i>Uptime
            </a>
            <ul class="collapse list-unstyled inner-menu" id="reports">
                <li>
                    <a href="#"><i class="fas fa-chart-area"></i>General</a>
                </li>
            </ul>
        </li>

        <li>
            <div class="default">
                General
            </div>
        </li>

        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-sliders-h"></i>Settings
            </a>
            <ul class="collapse list-unstyled inner-menu" id="pageSubmenu">
                <li>
                    <a href="<?php echo e(url('/dashboard/profile/settings')); ?>"><i class="fas fa-user-md"></i>Account</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-bell"></i>Notifications</a>
                </li>
            </ul>
        </li>

    </ul>

    
    
</nav><?php /**PATH /media/jchegenye/legibra/var/www/laravel-projects/monitor/resources/views/layouts/inner/sidebar.blade.php ENDPATH**/ ?>