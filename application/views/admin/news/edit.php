
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
							<a href="<?= site_url('admin/news');?>"><i class="back-link icon-circle-arrow-left icon-large"></i></a> Edit data news
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
								<?= form_open_multipart("admin/news/edit/$rs_news[news_id]", array('class' => 'form-horizontal', 'id' => 'form_sample_3' ));?>

									<div class="alert alert-error hide" id="alert-close">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
									</div>

									<div class="control-group">
										<label class="control-label">ชื่อข่าวสาร<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" value="<?= $rs_news['news_title'];?>" data-required="1" class="span6 "/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">รายละเอียด<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="editor2" rows="6" data-error-container="#editor2_error"><?= $rs_news['news_detail'];?></textarea>
											<div id="editor2_error"></div>
										</div>
									</div>


										<div class="control-group">
											<label class="control-label"> ข้อมูลรูปภาพ</label>
												<div class="controls">
													<div class="span12">
													<!-- ===== Picture Add ======= -->
											    	<div class="well ">
											    	<span class="label label-important">NOTE!</span>
													<span><b>ขนาดรูปภาพ 740x442 px </b></span>
													<br /><br />
														 <ul class="thumbnails">
															 <li class="span3">
																 <a data-toggle="modal" class="btn green" href="#PopModel"><i class="icon-plus"></i> Add </a>
															 </li>
														 </ul>
														<ul class="thumbnails">

															<?php
																$i=0;
																foreach($rs_act_img as $fett){
																$i++;
																	$name_img = $fett['news_album_name'];
																	$id_img = $fett['news_album_id'];
															?>

															<li class="span3" <? if($i=1){ echo "style='margin-left:20px'";}?>>
															    <div class="thumbnail">
															    <img src="<?= site_url("images/news/resize/$name_img");?>" alt="<?=$name_img;?>">
																    <div class="caption">
																		<p align="center"><a href="<?= site_url("admin/news/delete_image/$id_img");?>" onclick="return confirm('Delete?')" class="btn red btn-block">Delete</a></p>
																    </div>
															    </div>
														    </li>

															<? }?>
														</ul>
													</div> <!-- well -->
										          </div>
												</div> <!-- end control -->
											</div><!-- end control group -->

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
				<?= form_open_multipart('admin/news/upload_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs_news['news_id'];?>" name="id_news" >

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
