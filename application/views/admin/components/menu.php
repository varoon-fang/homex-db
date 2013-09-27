<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
				<img src="<?= site_url();?>backend/assets/img/logo.png" alt="logo" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="<?= site_url();?>backend/assets/img/menu-toggler.png" alt="" />
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav pull-right">

					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username">Welcome, <?= $this->session->userdata['logged_in']['username'];?> </span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a></li>
							<li><a href="<?= site_url('admin/profile');?>"><i class="icon-user-md"></i> My Profile</a></li>
							<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['type']!="admin" ){ }else{?>
							<li><a href="<?= site_url('admin/management');?>"><i class="icon-user"></i> Management User</a></li>
							<li><a href="<?= site_url('admin/profile/backup');?>"><i class="icon-download-alt"></i> Backup SQL</a></li>
							<? }?>
							<li><a href="<?= site_url('admin/dashboard/logout');?>"><i class="icon-off"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->