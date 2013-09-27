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
							<a href="<?= site_url('admin/knowledge');?>"><i class="back-link icon-circle-arrow-left icon-large"></i></a> Edit data Knowledge
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
								<?= form_open_multipart("admin/knowledge/edit/$rs_knowledge[knowledge_id]", array('class' => 'form-horizontal', 'id' => 'form_sample_3' ));?>
									<div class="alert alert-error hide" id="alert-close">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
									</div>

									<div class="control-group">
										<label class="control-label">ชื่อหัวข้อ<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" value="<?= $rs_knowledge['knowledge_title'];?>" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label">รายละเอียด<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="detail" rows="6" data-error-container="#editor2_error"><?= $rs_knowledge['knowledge_detail'];?></textarea>
											<div id="editor2_error"></div>
										</div>
									</div>
									<?php
										if($rs_knowledge['knowledge_img']=="" OR $rs_knowledge['knowledge_img']=="NULL"){
									?>
									<div class="control-group">
									<label class="control-label">เพิ่มรูป</label>
										<div class="controls">
										<span class="label label-important">NOTE!</span>
										<span><b>ขนาดรูปภาพ 720x480 px </b></span>
										<br /><br />
											<a data-toggle="modal" class="btn purple " href="#PopModel"><span class="icon-plus icon-white"></span> Add </a>
										</div>
									</div>
									<?	}else{ ?>
										<div class="control-group">
										<label class="control-label"></label>
											<div class="controls">
												<img src="<?= site_url("images/knowledge/thumbs/$rs_knowledge[knowledge_img]");?>">
												<a class="btn red" onclick="return confirm('Delete ?')" href="<?= site_url("admin/knowledge/delete_image/$rs_knowledge[knowledge_img]");?>">Delete</a>
											</div>

										</div>


									<? }?>


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
				<?= form_open_multipart('admin/knowledge/upload_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs_knowledge['knowledge_id'];?>" name="id_knowledge" >

		        	<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
								</div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
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
