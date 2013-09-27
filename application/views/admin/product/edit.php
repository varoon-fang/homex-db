<!-- price comma -->
<script type="text/javascript" src="<?php echo site_url('backend/assets/js/1.8.3.jquery.min.js');?>"></script>
<script>
    		$(document).ready(function(){

(function($){
                   $.fn.extend({
                           formatInput: function(settings) {
                                   var $elem = $(this);
                                   settings = $.extend({
                                           errback: null
                                   }, settings);
                                   $elem.bind("keyup.filter_input", $.fn.formatEvent);
                           },
                           formatEvent: function(e) {
                                   var elem = $(this);
                                   var initial_value = elem.val();
                                   elem.val($.fn.insertCommas(initial_value));
                           },
                           insertCommas: function(number) {
                                   return number.replace(/,/g, "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                           }
                           });
           })(jQuery);

    $(".formattingNumber").formatInput();
});
    	</script>

<script language="javascript" src="<?= site_url();?>backend/assets/control/list.php"></script>

<!-- BEGIN BODY -->
<body onload="fillCategory();" class="page-header-fixed">

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
							<a href="<?= site_url("admin/product/view_more/$rs_product[product_sub]");?>"><i class="back-link icon-circle-arrow-left icon-large"></i></a>
							 Edit data product
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
								<?= form_open_multipart("admin/product/edit/$rs_product[product_id]", array('class' => 'form-horizontal', 'id' => 'form_sample_3', 'name' =>'drop_list'));?>

									<div class="alert alert-error hide" id="alert-close">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
									</div>

									<div class="control-group">
										<label class="control-label">หมวดหมู่<span class="required">*</span></label>
										<div class="controls">
											<select name="category" class="span6" id="group_category" onChange="SelectSubCat();" >
												<?php
							            		 $query = $this->db->get_where('product_group',array('product_group_id' => $rs_product['product_group']));
				        				    		foreach($query->result_array() as $row)
				        				    		{
				        				    			$cate_id=$row['product_group_id'];
				        				    			$cate_name=$row['product_group_name'];
				        				    		}
							            	?>
						            	 <option value="<?= $cate_id;?>" <? if($cate_id==$rs_product['product_group']){ echo "selected";}?>>
						            	 	<font><?= $cate_name;?></font>
						            	 </option>
						            </select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">หมวดหมู่ย่อย<span class="required">*</span></label>
										<div class="controls">
								            <select id="sub_category" class="span6" name="subcategory" onChange="SelectSubCatmodel();"  >
								             <?php
								             		 $query = $this->db->get_where('product_sub',array('product_sub_id' => $rs_product['product_sub']));
					        				    		foreach($query->result_array() as $row)
					        				    		{
								             				$sub_id=$row['product_sub_id'];
					        				    			$sub_name=$row['product_sub_name'];
								             			 }
								             	?>
								             	 <? if($sub_id==0){

								             	}else{
								             		echo "<option value=\"$sub_id\">$sub_name</option>";
								             	}
								             	?>
				        				   	</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">รหัสสินค้า<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="codename" value="<?= $rs_product['product_codename'];?>" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ชื่อสินค้า<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" value="<?= $rs_product['product_title'];?>" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ราคาสินค้า</label>
										<div class="controls">
											<input type="text" name="price" value="<?= $rs_product['product_price'];?>" data-required="1" class="span6 m-wrap formattingNumber"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ประเภทสินค้า <span class="required">*</span></label>
										<div class="controls">
											<label class="radio line">
											<input type="radio" name="type" value="0" <? if($rs_product['product_type']=="0"){ echo "checked";}?>/>
											สินค้าทั่วไป
											</label>
											<label class="radio line">
											<input type="radio" name="type" value="สินค้าใหม่" <? if($rs_product['product_type']=="สินค้าใหม่"){ echo "checked";}?> />
											สินค้าใหม่
											</label>
											<label class="radio line">
											<input type="radio" name="type" value="สินค้าขายดี" <? if($rs_product['product_type']=="สินค้าขายดี"){ echo "checked";}?> />
											สินค้าขายดี
											</label>
											<label class="radio line">
											<input type="radio" name="type" value="สินค้าแนะนำ" <? if($rs_product['product_type']=="สินค้าแนะนำ"){ echo "checked";}?> />
											สินค้าแนะนำ
											</label>

											<div id="form_2_membership_error"></div>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">รายละเอียด<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="editor2" rows="6" data-error-container="#editor2_error"><?= $rs_product['product_detail'];?></textarea>
											<div id="editor2_error"></div>
										</div>
									</div>
									<?php
										if($rs_product['product_img']=="" OR $rs_product['product_img']=="NULL"){
									?>
									<div class="control-group">
									<label class="control-label">เพิ่มรูป</label>
										<div class="controls">
											<a data-toggle="modal" class="btn purple " href="#PopModel"><span class="icon-plus icon-white"></span> Add </a>
										</div>
									</div>
									<?	}else{ ?>
										<div class="control-group">
										<label class="control-label"></label>
											<div class="controls">
												<img src="<?= site_url("images/product/thumbs/$rs_product[product_img]");?>">
												<a class="btn red" onclick="return confirm('Delete ?')" href="<?= site_url("admin/product/delete_image/$rs_product[product_img]");?>">Delete</a>
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
				<?= form_open_multipart('admin/product/upload_pic', array('id' =>'contact-form', 'name' =>'myform'));?>

			   	<input  type="hidden" value="<?= $rs_product['product_id'];?>" name="id_product" >

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
									<input type="file" name="userfile[]" class="default" /></span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
							<span class="label label-important">NOTE!</span>
							<span><b>ขนาดรูปภาพ 500x500 px </b></span>
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
