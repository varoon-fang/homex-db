
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
							<a href="<?= site_url('admin/jobs');?>"><i class="back-link icon-circle-arrow-left icon-large"></i></a> Edit data jobs
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
								<?= form_open_multipart("admin/jobs/edit/$rs_jobs[jobs_id]", array('class' => 'form-horizontal', 'id' => 'form_sample_3'));?>

								<div class="alert alert-error hide" id="alert-close">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>

								<div class="control-group">
										<label class="control-label">ชื่อตำแหน่ง<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" data-required="1" value="<?= $rs_jobs['jobs_name'];?>" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ระดับการศึกษา<span class="required">*</span></label>
										<div class="controls">
											<select class="span6 m-wrap" name="education">
												<option value="มัธยมต้น" <? if($rs_jobs['jobs_education']=="มัธยมต้น"){ echo "selected";}?>>มัธยมต้น</option>
												<option value="มัธยมปลาย" <? if($rs_jobs['jobs_education']=="มัธยมปลาย"){ echo "selected";}?>>มัธยมปลาย</option>
												<option value="ปวช." <? if($rs_jobs['jobs_education']=="ปวช."){ echo "selected";}?>>ปวช.</option>
												<option value="ปวส." <? if($rs_jobs['jobs_education']=="ปวส."){ echo "selected";}?>>ปวส.</option>
												<option value="ปริญญาตรี" <? if($rs_jobs['jobs_education']=="ปริญญาตรี"){ echo "selected";}?>>ปริญญาตรี</option>
												<option value="ปริญญาโท" <? if($rs_jobs['jobs_education']=="ปริญญาโท"){ echo "selected";}?>>ปริญญาโท</option>
												<option value="ปริญญาเอก" <? if($rs_jobs['jobs_education']=="ปริญญาเอก"){ echo "selected";}?>>ปริญญาเอก</option>
												<option value="ไม่ระบุ" <? if($rs_jobs['jobs_education']=="ไม่ระบุ"){ echo "selected";}?>>ไม่ระบุ</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">จำนวนอัตรา<span class="required">*</span></label>
										<div class="controls">
											<select class="span6 m-wrap" name="amount">
												<?php
													for($i=1;$i<=10;$i++){
												?>
												<option value="<?= $i;?>" <? if($rs_jobs['jobs_amount']=="$i"){ echo "selected";}?> ><?= $i;?> อัตรา</option>
												<? } ?>
												<option value="999" <? if($rs_jobs['jobs_amount']=="999"){ echo "selected";}?>>ไม่จำกัดอัตรา</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ประสบการณ์<span class="required">*</span></label>
										<div class="controls">
											<select class="span6 m-wrap" name="experience">
												<option value="น้อยกว่า 1 ปี" <? if($rs_jobs['jobs_expert']=="น้อยกว่า 1 ปี"){ echo "selected";}?> >น้อยกว่า 1 ปี</option>
												<option value="1 ปี" <? if($rs_jobs['jobs_expert']=="1 ปี"){ echo "selected";}?>>1 ปี</option>
												<option value="2 ปี" <? if($rs_jobs['jobs_expert']=="2 ปี"){ echo "selected";}?>>3 ปี</option>
												<option value="3 ปี" <? if($rs_jobs['jobs_expert']=="3 ปี"){ echo "selected";}?>>3 ปี</option>
												<option value="มากกว่า 3 ปี" <? if($rs_jobs['jobs_expert']=="มากกว่า 3 ปี"){ echo "selected";}?>>มากกว่า 3 ปี</option>
												<option value="ไม่จำกัด" <? if($rs_jobs['jobs_expert']=="ไม่จำกัด"){ echo "selected";}?>>ไม่จำกัด</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">วันสิ้นสุดรับสมัคร<span class="required">*</span></label>
										<div class="controls">
											<input class="m-wrap m-ctrl-medium date-picker" data-date-format="yyyy-mm-dd" value="<?= $rs_jobs['jobs_date_end'];?>" readonly size="16" type="text" name="date_end" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">รายละเอียด<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="detail" rows="6" data-error-container="#editor2_error"><?= $rs_jobs['jobs_detail'];?></textarea>
											<div id="editor2_error"></div>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">คุณสมบัติ<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="ability" rows="6" data-error-container2="#editor3_error"><?= $rs_jobs['jobs_ability'];?></textarea>
											<div id="editor3_error"></div>
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" name="send" class="btn blue" value="Confirm Change">
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

<!-- MODEL Upload Image -->

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="PopModel" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" onclick="javascript:window.location.reload();" type="button"></button>
					<h3>Upload images</h3>
				</div>
				<div class="modal-body">
				<?= form_open_multipart('admin/jobs/upload_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs_jobs['jobs_id'];?>" name="id_jobs" >

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
