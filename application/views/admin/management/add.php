
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
		<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">

						<h3 class="page-title">
							<i class="icon-pencil"></i> Add account
						</h3>
					</div>
				</div>
				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Information</div>
							</div>

							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<?= form_open_multipart('admin/management/add', array('class' => 'form-horizontal', 'id' => 'form_sample_3'));?>

									<div class="alert alert-error hide" id="alert-close">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
									</div>

									<div class="control-group">
										<label class="control-label">Username<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Password<span class="required">*</span></label>
										<div class="controls">
											<input type="password" name="password" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Email<span class="required">*</span></label>
										<div class="controls">
											<input type="email" name="email" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Permission</label>
										<div class="controls">
											<div class="row-fluid">
												<div class="span3">
													<label class="checkbox line">
													<input type="checkbox" name="product" value="1" /> Product
													</label>
													<label class="checkbox line">
													<input type="checkbox" name="promotion" value="1" /> Promotion
													</label>
													<label class="checkbox line">
													<input type="checkbox" name="banner" value="1" /> Banner
													</label>
												</div>
												<div class="span3">
													<label class="checkbox line">
													<input type="checkbox" name="news" value="1"/> News
													</label>
													<label class="checkbox line">
													<input type="checkbox" name="jobs" value="1"/> Jobs
													</label>
													<label class="checkbox line">
													<input type="checkbox" name="knowledge" value="1" /> Knowledge
													</label>
												</div>
											</div>
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" name="send" class="btn green" value="Confirm Save">
										<button type="reset" class="btn">Cancel</button>
									</div>

								<?= form_close();?>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END VALIDATION STATES-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
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
