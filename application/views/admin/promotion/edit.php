
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
							<a href="<?= site_url('admin/promotion');?>"><i class="back-link icon-circle-arrow-left icon-large"></i></a> Edit data Promotion
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
								<?= form_open_multipart("admin/promotion/edit/$rs_promotion[promotion_id]", array('class' => 'form-horizontal', 'id' =>'form_sample_3' ));?>
								<div class="alert alert-error hide" id="alert-close">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
								</div>

								<div class="control-group">
										<label class="control-label">หัวข้อ<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" value="<?= $rs_promotion['promotion_title'];?>" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label">รายละเอียด<span class="required">*</span></label>
										<div class="controls">
											<textarea class="ckeditor m-wrap" name="detail" rows="6" data-error-container="#editor_error"><?= $rs_promotion['promotion_detail'];?></textarea>
											<div id="editor_error"></div>
										</div>
									</div>

									<?php
										if($rs_promotion['promotion_img']=="" OR $rs_promotion['promotion_img']=="NULL"){
									?>
									<div class="control-group">
									<label class="control-label">เพิ่มรูป</label>
										<div class="controls">
											<span class="label label-important">NOTE!</span>
											<span>ขนาดรูปภาพ 255×335 px </span>
											<br /><br />
											<a data-toggle="modal" class="btn purple " href="#PopModel"><span class="icon-plus icon-white"></span> Add </a>
										</div>
									</div>
									<?	}else{ ?>
										<div class="control-group">
										<label class="control-label">รูปภาพ</label>
											<div class="controls">
												<img src="<?= site_url("images/promotion/img/$rs_promotion[promotion_img]");?>">
												<a class="btn red" onclick="return confirm('Delete ?')" href="<?= site_url("admin/promotion/delete_image/$rs_promotion[promotion_img]");?>">Delete</a>
											</div>

										</div>
									<? }?>
									<br />
									<?php
										if($rs_promotion['promotion_pdf']=="" OR $rs_promotion['promotion_pdf']=="NULL"){
									?>
									<div class="control-group">
									<label class="control-label">เพิ่มไฟล์ PDF</label>
										<div class="controls">
											<a data-toggle="modal" class="btn purple " href="#PopPDFModel"><span class="icon-plus icon-white"></span> Add </a>
										</div>
									</div>
									<?	}else{ ?>
										<div class="control-group">
										<label class="control-label">ไฟล์ PDF</label>
											<div class="controls">
												<p><a href="<?= site_url("images/promotion/$rs_promotion[promotion_pdf]");?>" target="_blank"><?= $rs_promotion['promotion_pdf'];?></a></p>
												<a class="btn red" onclick="return confirm('Delete ?')" href="<?= site_url("admin/promotion/delete_pdf/$rs_promotion[promotion_pdf]");?>">Delete</a>
											</div>

										</div>
									<? }?>

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


<!-- MODEL Upload PDF -->

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="PopPDFModel" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" onclick="javascript:window.location.reload();" type="button"></button>
					<h3>Upload PDF</h3>
				</div>
				<div class="modal-body">
				<?= form_open_multipart('admin/promotion/upload_pdf', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs_promotion['promotion_id'];?>" name="id_promotion" >

		        	<div class="control-group">
						<label class="control-label">ไฟล์ PDF<span class="required">*</span></label>
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
									<input type="file" name="file" data-error-container="#file_error" class="default" />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
								<div id="file_error"></div>
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

<!-- MODEL Upload Image -->

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="PopModel" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" onclick="javascript:window.location.reload();" type="button"></button>
					<h3>Upload images</h3>
				</div>
				<div class="modal-body">
				<?= form_open_multipart('admin/promotion/upload_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs_promotion['promotion_id'];?>" name="id_promotion" >

		        	<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 180px; height: 220px;">
									<img src="http://www.placehold.it/180x220/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
								</div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 180px; max-height: 220px; line-height: 20px;"></div>
								<div>
									<span class="btn btn-file"><span class="fileupload-new">Select image</span>
									<span class="fileupload-exists">Change</span>
									<input type="file" name="userfile" class="default" /></span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
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
