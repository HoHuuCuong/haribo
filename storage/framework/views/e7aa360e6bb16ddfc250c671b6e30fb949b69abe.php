<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            <?php echo e(__('backend.title.menu')); ?>

        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html"
            data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main">
                    <?php echo $menus; ?>

                    <?php if(Auth::guard('backend')->user()->username == 'admin'): ?>
                    <li class="nav-parent nav-link" id="addfuncs" style="cursor: pointer"
                        data-api1="<?php echo e(route('b.system.getfuncs')); ?>" data-api2="<?php echo e(route('b.system.createfunc')); ?>"
                        data-api3="<?php echo e(route('b.system.getroutes')); ?>"> <i class="fas fa-plus" aria-hidden="true"></i>
                        <span>Thêm mới chức năng</span>
                    </li>
                    <li class="nav-parent nav-link" id="editfunc" style="cursor: pointer"
                        data-api1="<?php echo e(route('b.system.getfuncs')); ?>" data-api2="<?php echo e(route('b.system.getfunc')); ?>"
                        data-api3="<?php echo e(route('b.system.updatefunc')); ?>" data-api4="<?php echo e(route('b.system.getroutes')); ?>"> <i
                            class="fas fa-edit" aria-hidden="true"></i>
                        <span>Sửa chức năng</span>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>

            <hr class="separator" />

            <div class="sidebar-widget widget-tasks d-none">
                <div class="widget-header">
                    <h6>Projects</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul class="list-unstyled m-0">
                        <li><a href="#">Porto HTML5 Template</a></li>
                        <li><a href="#">Tucson Template</a></li>
                        <li><a href="#">Porto Admin</a></li>
                    </ul>
                </div>
            </div>

            <hr class="separator" />

            <div class="sidebar-widget widget-stats d-none">
                <div class="widget-header">
                    <h6>Company Stats</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul>
                        <li>
                            <span class="stats-title">Stat 1</span>
                            <span class="stats-complete">85%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number"
                                    role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 85%;">
                                    <span class="sr-only">85% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 2</span>
                            <span class="stats-complete">70%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number"
                                    role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 70%;">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 3</span>
                            <span class="stats-complete">2%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number"
                                    role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 2%;">
                                    <span class="sr-only">2% Complete</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>


    </div>

</aside>
<!-- end: sidebar -->
<?php /**PATH /Users/myho/Sites/Sources/harico/resources/views/backend/widgets/sidebar.blade.php ENDPATH**/ ?>