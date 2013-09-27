
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
							<i class="icon-pencil"></i> Edit profile
						</h3>
					</div>
				</div>
				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<? echo $this->session->flashdata('feedback');?>
						<div class="portlet box grey">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Information</div>
							</div>

							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<?= form_open_multipart("admin/profile/update/$rs_management[admin_id]", array('class' => 'form-horizontal validation-form'));?>
								<div class="control-group">
										<label class="control-label">Username<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" data-required="1" value="<?= $rs_management['admin_user'];?>" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Password<span class="required">*</span></label>
										<div class="controls">
											<input type="password" name="pass" data-required="1" class="span6 m-wrap" id="submit_form_password"/>
										</div>
									</div>

									<!--
<div class="control-group">
										<label class="control-label">Confirm password<span class="required">*</span></label>
										<div class="controls">
											<input type="password" name="c_pass" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>
-->

									<div class="control-group">
										<label class="control-label">Email<span class="required">*</span></label>
										<div class="controls">
											<input type="email" name="email" value="<?= $rs_management['admin_email'];?>" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" name="send" class="btn blue" value="Confirm Change">
										<button type="button" class="btn">Cancel</button>
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

<!-- MODEL Upload Image -->

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="PopModel" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" onclick="javascript:window.location.reload();" type="button"></button>
					<h3>Upload images</h3>
				</div>
				<div class="modal-body">
				<?= form_open_multipart('admin/management/upload_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs_management['management_id'];?>" name="id_management" >

		        	<div class="controls">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="icon-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
									<span class="btn btn-file">
									<span class="fileupload-new">Select file</span>
									<span class="fileupload-exists">Change</span>
									<input type="file" name="userfile[]" multiple="multiple" class="default" />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div>
					<br />
	    <input type="submit" name="upload_img" class="btn btn green " data-loading-text="Loading now..." value="Confirm Upload">
	    <button onclick="javascript:window.location.reload();" class="btn" data-dismiss="modal">Close</button>
    <?= form_close();?>
				</div>
			</div>
    <!-- END MODEL -->

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
