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

			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							<i class="icon-table"></i></a> News
						</h3>

					</div>
				</div>
				<!-- END PAGE HEADER-->
				<? echo $this->session->flashdata('feedback');?>
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-list-alt"></i>Data news</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="<?= site_url('admin/news/add');?>">
											<button id="sample_editable_1_new" class="btn green">
											 <i class="icon-pencil"></i> Add news
											</button>
										</a>
									</div>

								</div>
								<table class="table table-striped table-hover table-bordered" id="sample_3">
									<thead>
										<tr>
											<th width="20%">ID</th>
											<th width="30%">Name</th>
											<th width="10%">Edit</th>
											<th width="10%">Delete</th>
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
											<td><a class="edit" href="<?= site_url("admin/news/edit/$news_id");?>" ><i class="back-link icon-edit icon-large"></i></a></td>
											<td><a class="delete" onclick="return confirm('Delete ?')" href="<?= site_url("admin/news/delete/$news_id");?>"><i class="back-link icon-trash icon-large"></i></a></td>
										</tr>
										<? }?>

									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT -->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
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