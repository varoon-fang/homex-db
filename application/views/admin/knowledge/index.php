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
							<i class="icon-table icon-large"></i> knowledge
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
								<div class="caption"><i class="icon-list-alt"></i>Data knowledge</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="<?= site_url('admin/knowledge/add');?>">
											<button id="sample_editable_1_new" class="btn green">
											 <i class="icon-pencil"></i> Add knowledge
											</button>
										</a>
									</div>

								</div>
								<table class="table table-striped table-hover table-bordered" id="sample_3">
									<thead>
										<tr>
											<th width="10%">ID</th>
											<th width="30%">Name</th>
											<th width="5%">Edit</th>
											<th width="5%">Delete</th>
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
											<td><a class="edit" href="<?= site_url("admin/knowledge/edit/$knowledge_id");?>" ><i class="back-link icon-edit icon-large"></i></a></td>
											<td><a class="delete" onclick="return confirm('Delete ?')" href="<?= site_url("admin/knowledge/delete/$knowledge_id");?>"><i class="back-link icon-trash icon-large"></i></a></td>
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