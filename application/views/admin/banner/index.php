
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
							<i class="icon-picture"></i> Manage banner
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

							<div class="portlet-body form-horizontal form">
								<!-- BEGIN FORM-->
										<div class="control-group">
											<label class="control-label"> ข้อมูลรูปภาพ</label>
												<div class="controls">
													<div class="span12">
													<!-- ===== Picture Add ======= -->
											    	<div class="well ">
											    		<span class="label label-important">NOTE!</span>
														<span><b>ขนาดรูปภาพ 760x335 px </b></span>
														<br /><br />
														 <ul class="thumbnails">
															 <li class="span3">
																 <a data-toggle="modal" class="btn green " href="#PopModel"><i class="icon-plus"></i> Add </a>
															 </li>
														 </ul>
														<ul class="thumbnails">

															<?php
																$i=0;
																foreach($rs_banner as $fett){
																$i++;
																	$name_img = $fett['banner_name'];
																	$id_img = $fett['banner_id'];
															?>

															<li class="span3" <? if($i=1){ echo "style='margin-left:20px'";}?>>
															    <div class="thumbnail">
															    <img src="<?= site_url("images/banner/resize/$name_img");?>" alt="<?=$name_img;?>">
																    <div class="caption">
																		<p align="center"><a href="<?= site_url("admin/banner/delete/$id_img");?>" onclick="return confirm('Delete?')" class="btn red btn-block">Delete</a></p>
																    </div>
															    </div>
														    </li>

															<? }?>
														</ul>
													</div> <!-- well -->
										          </div>
												</div> <!-- end control -->
											</div><!-- end control group -->

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
				<?= form_open_multipart('admin/banner/upload_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

  		        	<div class="controls">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="icon-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
									<span class="btn btn-file">
									<span class="fileupload-new">Select Multifile</span>
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
