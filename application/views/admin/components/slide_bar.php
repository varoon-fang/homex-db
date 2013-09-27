<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<br />
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li <? if($this->uri->segment(2)=="dashboard"){ $open="open"; echo "class='active'"; }else{}?>>
					<a href="<?= site_url('admin/dashboard');?>">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>

					</a>
				</li>


				<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['product']!="yes" ){

				}else{?>
				<!-- Product -->
				<li <? if($this->uri->segment(2)=="product"){ $open="open"; echo "class='active'";}else{ $open="";}?>>
					<a href="javascript:;">
					<i class="icon-gift"></i>
					<span class="title">Product</span>
					<span class="arrow <?= $open;?>"></span>
					<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li <? if($this->uri->segment(2)=="product" AND $this->uri->segment(3)=="category"){ echo "class='active'";}else{ $open="";}?>>
							<a href="<?= site_url('admin/product/category');?>">Categories</a>
						</li>
						<li <? if($this->uri->segment(2)=="product" AND $this->uri->segment(3)=="sub_category" OR $this->uri->segment(3)=="list_subcategory"){ echo "class='active'";}else{ $open="";}?>>
							<a href="<?= site_url('admin/product/sub_category');?>">Sub categories</a>
						</li>
						<li <? if($this->uri->segment(2)=="product" AND $this->uri->segment(3)=="" OR $this->uri->segment(3)=="view"){ echo "class='active'";}?>>
							<a href="<?= site_url('admin/product');?>">Product</a>
						</li>
					</ul>
				</li>
				<? }?>

				<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['promotion']!="yes" ){

				}else{?>
				<!-- Promotion -->
				<li <? if($this->uri->segment(2)=="promotion"){ $open="open"; echo "class='active'";}else{ $open="";}?>>
					<a href="javascript:;">
					<i class="icon-tags"></i>
					<span class="title">Promotion</span>
					<span class="arrow <?= $open;?>"></span>
					<span class="selected"></span>

					</a>
					<ul class="sub-menu">

						<li <? if($this->uri->segment(2)=="promotion" AND $this->uri->segment(3)=="" ){ echo "class='active'";}?>>
							<a href="<?= site_url('admin/promotion');?>">Promotion</a>
						</li>
					</ul>
				</li>
				<? }?>

				<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['news']!="yes" ){

				}else{?>
				<!-- News -->
				<li <? if($this->uri->segment(2)=="news"){ $open="open"; echo "class='active'";}else{ $open="";}?>>
					<a href="javascript:;">
					<i class="icon-file"></i>
					<span class="title">News</span>
					<span class="arrow <?= $open;?> "></span>
					<span class="selected"></span>

					</a>
					<ul class="sub-menu">

						<li <? if($this->uri->segment(2)=="news" AND $this->uri->segment(3)=="" ){ $open="open"; echo "class='active'";}?>>
							<a href="<?= site_url('admin/news');?>">News</a>
						</li>
					</ul>
				</li>
				<? }?>

				<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['knowledge']!="yes" ){

				}else{?>
				<!-- Knowledge -->
				<li <? if($this->uri->segment(2)=="knowledge"){ $open="open"; echo "class='active'";}else{ $open="";}?>>
					<a href="javascript:;">
					<i class="icon-globe"></i>
					<span class="title">Knowledge</span>
					<span class="arrow <?= $open;?>"></span>
					<span class="selected"></span>

					</a>
					<ul class="sub-menu">

						<li <? if($this->uri->segment(2)=="knowledge" AND $this->uri->segment(3)=="" ){ echo "class='active'";}?>>
							<a href="<?= site_url('admin/knowledge');?>">Knowledge</a>
						</li>
					</ul>
				</li>
				<? }?>

				<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['jobs']!="yes" ){

				}else{?>
				<!-- Jobs -->
				<li <? if($this->uri->segment(2)=="jobs"){ $open="open"; echo "class='active'";}else{ $open="";}?>>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">Jobs</span>
					<span class="arrow <?= $open;?>"></span>
					<span class="selected"></span>

					</a>
					<ul class="sub-menu">

						<li <? if($this->uri->segment(2)=="jobs" AND $this->uri->segment(3)=="" ){ echo "class='active'";}?>>
							<a href="<?= site_url('admin/jobs');?>">Jobs</a>
						</li>
					</ul>
				</li>
				<? }?>

				<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['banner']!="yes" ){

				}else{?>
				<!-- Banner -->
				<li <? if($this->uri->segment(2)=="banner"){ $open="open"; echo "class='active'";}else{ $open="";}?>>
					<a href="javascript:;">
					<i class="icon-picture"></i>
					<span class="title">Banner</span>
					<span class="arrow <?= $open;?>"></span>
					<span class="selected"></span>

					</a>
					<ul class="sub-menu">

						<li <? if($this->uri->segment(2)=="banner" AND $this->uri->segment(3)=="" ){ echo "class='active'";}?>>
							<a href="<?= site_url('admin/banner');?>">Banner</a>
						</li>
					</ul>
				</li>
				<? }?>
			</ul>
			<!-- END SIDEBAR MENU -->