<!--
When creating a new menu item on the top-most level
Please ensure that you assign the LI a unique ID

Examples can be seen below for menu_bep_system
-->
<!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="nav-item start active open">
                            <a href="<?php echo base_url() ?>admin" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>
                        <li class="heading ">
                            <h3 class="uppercase">General</h3>
                        </li>
                        <li class="nav-item  <?php if ($this->uri->segment(1) == 'orders') {
                            echo "active open";
                        } ?>">
                            <a href="<?php echo base_url() ?>orders/admin" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Orders</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item  <?php if ($this->uri->segment(1) == 'products') {
                            echo "active open";
                        } ?>">
                            <a href="<?php echo base_url() ?>products/admin" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Products</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'categories') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>categories/admin" class="nav-link nav-toggle">
                                <i class="icon-paper-plane"></i>
                                <span class="title">Categories</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'customers') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>customers/admin" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Customers</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'subscribers') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>subscribers/admin" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Subscribers</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'messages') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>messages/admin" class="nav-link nav-toggle">
                                <i class="icon-envelope"></i>
                                <span class="title">Messages</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'calendar') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>calendar/admin" class="nav-link nav-toggle">
                                <i class="icon-calendar"></i>
                                <span class="title">Calendar</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'file_manager') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>file_manager/admin" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">File Manager</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">System</h3>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(3) == 'members') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>auth/admin/members" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Members</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(3) == 'access_control') {
                            echo "active open";
                        } ?> ">
                            <a href="<?php echo base_url() ?>auth/admin/access_control" class="nav-link nav-toggle">
                                <i class="icon-feed"></i>
                                <span class="title">Access Control</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item  <?php if ($this->uri->segment(2) == 'settings') {
                            echo "active open";
                        } ?>">
                            <a href="<?php echo base_url() ?>admin/settings" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Settings</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>