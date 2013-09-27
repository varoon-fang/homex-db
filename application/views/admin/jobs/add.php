
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
							<i class="icon-pencil"></i> Add Jobs
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
								<?= form_open_multipart('admin/jobs/add', array('class' => 'form-horizontal', 'id' => 'form_sample_3'));?>

									<div class="alert alert-error hide" id="alert-close">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
									</div>

									<div class="control-group">
										<label class="control-label">ชื่อตำแหน่ง<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ระดับการศึกษา<span class="required">*</span></label>
										<div class="controls">
											<select class="span6 m-wrap" name="education">
												<option value="">Select...</option>
												<option value="มัธยมต้น">มัธยมต้น</option>
												<option value="มัธยมปลาย">มัธยมปลาย</option>
												<option value="ปวช.">ปวช.</option>
												<option value="ปวส.">ปวส.</option>
												<option value="ปริญญาตรี">ปริญญาตรี</option>
												<option value="ปริญญาโท">ปริญญาโท</option>
												<option value="ปริญญาเอก">ปริญญาเอก</option>
												<option value="ไม่ระบุ">ไม่ระบุ</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">จำนวนอัตรา<span class="required">*</span></label>
										<div class="controls">
											<select class="span6 m-wrap" name="amount">
												<option value="">Select...</option>
												<?php
													for($i=1;$i<=10;$i++){
												?>
												<option value="<?= $i;?>"><?= $i;?> อัตรา</option>
												<? } ?>
												<option value="999">ไม่จำกัดอัตรา</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ประสบการณ์<span class="required">*</span></label>
										<div class="controls">
											<select class="span6 m-wrap" name="experience">
												<option value="">Select...</option>
												<option value="น้อยกว่า 1 ปี">น้อยกว่า 1 ปี</option>
												<option value="1 ปี">1 ปี</option>
												<option value="2 ปี">3 ปี</option>
												<option value="3 ปี">3 ปี</option>
												<option value="มากกว่า 3 ปี">มากกว่า 3 ปี</option>
												<option value="ไม่จำกัด">ไม่จำกัด</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">วันสิ้นสุดรับสมัคร<span class="required">*</span></label>
										<div class="controls">
											<input class="m-wrap m-ctrl-medium date-picker" data-date-format="yyyy-mm-dd" readonly size="16" type="text" name="date_end" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">รายละเอียด<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="detail" rows="6" data-error-container="#editor2_error"></textarea>
											<div id="editor2_error"></div>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">คุณสมบัติ<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="ability" rows="6" data-error-container="#editor2_error"></textarea>
											<div id="editor2_error"></div>
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
