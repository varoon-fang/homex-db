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
							<i class="icon-edit"></i> Edit Categories
						</h3>
					</div>
				</div>
				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Information</div>
							</div>

							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<?= form_open("admin/product/edit_category/".$this->uri->segment(4)."", array('class' => 'form-horizontal validation-form'));?>

									<div class="control-group ">
										<label class="control-label">ชื่อหมวดหมู่<span class="required">*</span></label>
										<div class="controls">
											<div class="input-icon">
												<input class="m-wrap placeholder-no-fix" value="<?= $title_name;
;?>" type="text" name="title"/>
											</div>
										</div>
									</div>

									<div class="form-actions">

										<input type="reset" name="reset" class="btn" value="Cencel">
										<input type="submit" name="send" class="btn blue" value="Confirm Save">
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