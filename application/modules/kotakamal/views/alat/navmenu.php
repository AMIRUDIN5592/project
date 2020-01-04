<nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="<?php echo base_url();?>/assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">James Brown</div><small>Admin Aje</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="<?php if($title=='Beranda'){ echo 'active';}else{echo '';}?>" href="<?php echo site_url('beranda');?>"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
					<li>
                       <a class="<?php if($title=='List Kotak'){ echo 'active';}else{echo '';}?>" href="<?php echo site_url('list_kotak'); ?>">
                            <i class="sidebar-item-icon fa fa-sitemap"></i>
							<span class="nav-label">List Kotak</span>
                        </a>
						
                    </li>
					<li>
                       <a class="<?php if($title=='Setor Kotak'){ echo 'active';}else{echo '';}?>" href="<?php echo site_url('setor_kotak'); ?>">
                            <i class="sidebar-item-icon fa fa-sitemap"></i>
							<span class="nav-label">Setor Kotak</span>
                        </a>
                    </li>
					<li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Setting</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a class="<?php if($title=='Manajemen Admin'){ echo 'active';}else{echo '';}?>" href="<?php echo site_url('man_admin'); ?>">
									<i class="sidebar-item-icon fa fa-sitemap"></i>
									<span class="nav-label">Manajemen Admin</span>
								</a>
                            </li>
                            <li>
								<a class="<?php if($title=='Manajemen Menu'){ echo 'active';}else{echo '';}?>" href="<?php echo site_url('man_menu'); ?>">
									<i class="sidebar-item-icon fa fa-sitemap"></i>
									<span class="nav-label">Manajemen Menu</span>
								</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>