<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Admin" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">HirenWork</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="<?= base_url() . 'admin/dashboard' ?>" class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
                </li>
                <li class="nav-item has-treeview <?= ($this->uri->segment(2) == 'client-list') ? 'menu-open' : '' ?> ">
                    <a href="<?= base_url() . 'admin/client-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'client-list') ? 'active' : '' ?> ">
                        <i class="fas fa-user-tie"></i> Client <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
<!--                        <li class="nav-item">
                            <a href="<?= base_url() . 'admin/client-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'client-list') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user-tie"></i> Client Listing
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/client-list/active' ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'client-list' && $this->uri->segment(3) == 'active') ? 'active' : '' ?>"><i class="far fa-circle nav-icon"></i><p>Active Client</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/client-list/inactive' ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'client-list' && $this->uri->segment(3) == 'inactive') ? 'active' : '' ?>"><i class="far fa-circle nav-icon"></i><p>Inactive Client</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Client Task</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Client Earning</p></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= ($this->uri->segment(2) == 'freelancer-list') ? 'menu-open' : '' ?> ">

                    <?Php
                    $sql = "SELECT count(*) as total FROM user_login where (profile_status=0 and user_type=4) ";
                    $query = $this->db->query($sql);
                    $count = $query->row();
                    ?>
                    <a href="<?= base_url() . 'admin/freelancer-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'freelancer-list') ? 'active' : '' ?>">
                        <i class="fas fa-users"></i> Freelancer <i class="right fas fa-angle-left"></i>
                    </a> 
                    <ul class="nav nav-treeview">
<!--                        <li class="nav-item">
                            <a href="<?= base_url() . 'admin/freelancer-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'freelancer-list') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>Freelancer Listing 
                                <?php if ($count->total > 0)  ?>
                                <span class="countinactive"><?= isset($count->total) ? $count->total : '' ?></span>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/freelancer-list/active' ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'freelancer-list' && $this->uri->segment(3) == 'active') ? 'active' : '' ?>"><i class="far fa-circle nav-icon"></i><p>Active Freelancer</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/freelancer-list/inactive' ?>" class="nav-link <?php echo ($this->uri->segment(2) == 'freelancer-list' && $this->uri->segment(3) == 'inactive') ? 'active' : '' ?>"><i class="far fa-circle nav-icon"></i><p>Inactive Freelancer</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() . 'admin/freelancer-list' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Freelancer Work</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() . 'admin/freelancer-list' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Freelancer Earning</p></a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview <?= ($this->uri->segment(2) == 'naluacer-list') ? 'menu-open' : '' ?> ">


                    <a href="<?= base_url() . 'admin/naluacer-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'naluacer-list') ? 'active' : '' ?>">
                        <i class="fas fa-users"></i> Naluacer <i class="right fas fa-angle-left"></i>
                    </a> 
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() . 'admin/naluacer-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'naluacer-list') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>Naluacer Listing 

                            </a>
                        </li>


                    </ul>
                </li>




                <li><a href="<?= base_url() . 'admin/category-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'category-list') ? 'active' : '' ?>"><i class="fas fa-bars"></i> Category </a></li>
                <li><a href="<?= base_url() . 'admin/task-list' ?>" class="nav-link <?= ($this->uri->segment(2) == 'task-list') ? 'active' : '' ?>"><i class="fas fa-bars"></i> Task </a></li>
                <li class="nav-item has-treeview <?php echo ($this->uri->segment(2) == 'problem-ticket') ? 'menu-open' : '' ?> ">
                    <a href="javascript:void(0);" class="nav-link <?= ($this->uri->segment(2) == 'problem-ticket') ? 'active' : '' ?> ">
                        <i class="fas fa-user-tie"></i> Problem Ticket <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/problem-ticket/solved'; ?>" class="nav-link <?php echo ($this->uri->segment(3) == 'solved') ? 'active' : '' ?>"><i class="far fa-circle nav-icon"></i><p>Solved</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'admin/problem-ticket/unsolved'; ?>" class="nav-link <?php echo ($this->uri->segment(3) == 'unsolved') ? 'active' : '' ?> "><i class="far fa-circle nav-icon"></i><p>Unsolved</p></a>
                        </li>
                    </ul>
                </li>                
    <!-- <li><a href="<?= base_url() . 'admin/problem_ticket_history' ?>" class="nav-link <?= ($this->uri->segment(2) == 'problem_ticket_history') ? 'active' : '' ?>"><i class="fas fa-bars"></i> Ticket History</a></li> -->


                <li><a href="<?= base_url() . 'admin/user-messages' ?>" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>User Messages</p></a></li>
                <li><a href="<?= base_url() . 'logout' ?>" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>