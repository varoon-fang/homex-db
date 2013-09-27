<!-- BEGIN BODY -->
<body class="page-header-fixed">

	<div class="header navbar navbar-inverse navbar-fixed-top">
		<?= $this->load->view('admin/components/menu');?>
	</div>
	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<?= $this->load->view('admin/components/slide_bar');?>
		</div>
		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					Widget settings form goes here
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							<i class="icon-home"></i> Dashboard
						</h3>
						<hr/>
						<!-- END PAGE TITLE & BREADCRUMB-->
<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['type']!="admin" ){ }else{?>
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">

						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption"><i class="icon-user"></i>Account</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
								<div class="actions">
									<a href="<?= site_url("admin/management/add");?>" class="btn red"><i class="icon-pencil"></i> Add</a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th width="10%">#</th>
											<th width="10%">Status</th>
											<th width="30%">Username</th>
											<th width="30%">Email</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($rs_management as $row)
											{
												$account_id 	= $row['admin_id'];
												$account_status =  $row['admin_status'];
												$account_name   =  $row['admin_user'];
												$account_email  =  $row['admin_email'];
										?>
										<tr>
											<td><?= $account_id;?></td>
											<td><? if($row['admin_status']=="no"){ echo "<span class='icon-remove-sign icon-large'></span>";}else{ echo "<span class='icon-ok-sign icon-large'></span>";}?></td>
											<td><?= $account_name;?></td>
											<td><?= $account_email;?></td>
										</tr>
										<? }?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
				</div><!-- end row-fluid-->
<? }?>

				<!-- Table -->
				<div class="row-fluid">
<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['product']!="yes" ){ }else{?>
					<div class="span6">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-gift"></i>Product</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
								<div class="actions">
									<a href="<?= site_url("admin/product/add");?>" class="btn blue"><i class="icon-pencil"></i> Add</a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($rs_product as $rows){
								    		 	$group_id 	= $rows['product_group'];

								    		 	$sql2="select * from product_group where product_group_id='$group_id' ";
											 		$rs=$this->db->query($sql2);

												 foreach($rs->result_array() as $row){
													$product_id 	= $row['product_group_id'];
									    		 	$product_name 	= $row['product_group_name'];
								    			 }
										 ?>
										<tr>
											<td><?= $product_id;?></td>
											<td><?= $product_name;?></td>
											<td><a href="<?= site_url("admin/product/view/$group_id");?>"><span class="label label-info">View</span></a></td>
										</tr>
										<? }?>

									</tbody>
								</table>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div><!-- end span6 -->
<? }?>
<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['promotion']!="yes" ){ }else{?>
					<div class="span6">
						<!-- BEGIN BORDERED TABLE PORTLET-->
						<div class="portlet box yellow">
							<div class="portlet-title">
								<div class="caption"><i class="icon-tags"></i>Promotion</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
								<div class="actions">
									<a href="<?= site_url("admin/promotion/add");?>" class="btn yellow"><i class="icon-pencil"></i> Add</a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($rs_promotion as $row)
											{
												$promotion_id = $row['promotion_id'];
												$promotion_name =  $row['promotion_title'];
										?>
										<tr>
											<td><?= $promotion_id;?></td>
											<td><?= $promotion_name;?></td>
											<td><a href="<?= site_url("admin/promotion/edit/$promotion_id");?>"><span class="label label-warning">Edit</span></a></td>
											<td><a onclick="return confirm('Delete ?')" href="<?= site_url("admin/promotion/delete/$promotion_id");?>"><span class="label label-success">Delete</span></a></td>
										</tr>
										<? }?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END BORDERED TABLE PORTLET-->
					</div> <!-- end span6 -->

<? }?>
				</div><!-- end fluid-->

				<div class="row-fluid">
<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['news']!="yes" ){ }else{?>
					<div class="span6">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-file"></i>News</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
								<div class="actions">
									<a href="<?= site_url("admin/news/add");?>" class="btn green"><i class="icon-pencil"></i> Add</a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($rs_news as $row)
											{
												$news_id = $row['news_id'];
												$news_name =  $row['news_title'];
										 ?>
										<tr>
											<td><?= $news_id;?></td>
											<td><?= $news_name;?></td>
											<td><a href="<?= site_url("admin/news/edit/$news_id");?>"><span class="label label-success">Edit</span></a></td>
											<td><a onclick="return confirm('Delete ?')" href="<?= site_url("admin/news/delete/$news_id");?>"><span class="label label-danger">Delete</span></a></td>
										</tr>
										<? }?>

									</tbody>
								</table>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
<? }?>
<?php if(!$this->session->userdata('logged_in') OR $this->session->userdata['logged_in']['knowledge']!="yes" ){ }else{?>
					<div class="span6">
						<!-- BEGIN BORDERED TABLE PORTLET-->
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption"><i class="icon-globe"></i>Knowledge</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
								<div class="actions">
									<a href="<?= site_url("admin/knowledge/add");?>" class="btn purple"><i class="icon-pencil"></i> Add</a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($rs_knowledge as $row)
											{
												$knowledge_id   = $row['knowledge_id'];
												$knowledge_name = $row['knowledge_title'];
										?>
										<tr>
											<td><?= $knowledge_id;?></td>
											<td><?= $knowledge_name;?></td>
											<td><a href="<?= site_url("admin/knowledge/edit/$knowledge_id");?>"><span class="label label-important">Edit</span></a></td>
											<td><a onclick="return confirm('Delete ?')" href="<?= site_url("admin/knowledge/delete/$knowledge_id");?>"><span class="label label-danger">Delete</span></a></td>
										</tr>
										<? }?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END BORDERED TABLE PORTLET-->
					</div>
<? }?>
				</div>
			<!-- END Table -->
					</div>
				</div>
				<!-- END PAGE HEADER-->

				</div>
				<!-- BEGIN PAGE -->

	</div>
	<!-- END CONTAINER -->
<!-- BEGIN COPYRIGHT -->
	<div class="footer">
		<div class="footer-inner">
			<?= $footer_title;?>
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END COPYRIGHT -->