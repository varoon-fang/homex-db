<!-- dropdown -->
<script type="text/javascript" src="<?= site_url('backend/assets/js/1.7.1.jquery.min.js');?>"></script>
<script type="text/javascript" >
	$(document).ready(function(){
        $('#options').change(function(){ //any select change on the dropdown with id options trigger this code
            $("#suboptions > option").remove(); //first of all clear select items
            var option = $('#options').val();  // here we are taking option id of the selected one.

            if(option == '#'){
                return false; // return false after clearing sub options if 'please select was chosen'
            }

            $.ajax({
                type: "POST",
                url: "<?= site_url();?>admin/product/getsuboptions/"+option, //here we are calling our dropdown controller
                success: function(suboptions) //we're calling the response json array 'suboptions'
                {
                    $.each(suboptions,function(id,value) //here we're doing a foeach loop round each sub
                    {
                        var opt = $('<option />'); // here we're creating a new select option for each suboption
                        opt.val(id);
                        opt.text(value);
                        $('#suboptions').append(opt); //here we will append these new select options
                    });
                }

            });

        });
    });
</script>

<!-- price comma -->
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
							<i class="icon-pencil"></i> Add product
						</h3>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<? echo $this->session->flashdata('feedback');?>
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
								<?= form_open_multipart('admin/product/add', array('class' => 'form-horizontal', 'id' => 'form_sample_3'));?>
									<div class="alert alert-error hide" id="alert-close">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
									</div>

									<div class="control-group">
										<label class="control-label">หมวดหมู่<span class="required">*</span></label>
										<div class="controls">
											<?php echo form_dropdown('category', $options, '', 'id="options" class="span6" required="required"'); ?>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">หมวดหมู่ย่อย<span class="required">*</span></label>
										<div class="controls">
											<select name="subcategory" class="span6" required="required" id="suboptions">
										    	<option value="">-- เลือกหมวดหมู่ย่อย --</option>
											</select>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label">รหัสสินค้า<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="codename" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ชื่อสินค้า<span class="required">*</span></label>
										<div class="controls">
											<input type="text" name="name" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ราคาสินค้า</label>
										<div class="controls">
											<input type="text" name="price" data-required="1" class="span6 m-wrap formattingNumber"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">ประเภทสินค้า<span class="required">*</span></label>
										<div class="controls">
											<label class="radio line">
											<input type="radio" name="type" value="0" checked="checked"/>
											สินค้าทั่วไป
											</label>
											<label class="radio line">
											<input type="radio" name="type" value="สินค้าใหม่" />
											สินค้าใหม่
											</label>
											<label class="radio line">
											<input type="radio" name="type" value="สินค้าขายดี" />
											สินค้าขายดี
											</label>
											<label class="radio line">
											<input type="radio" name="type" value="สินค้าแนะนำ" />
											สินค้าแนะนำ
											</label>

											<div id="form_2_membership_error"></div>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">รายละเอียด<span class="required">*</span></label>
										<div class="controls">
											<textarea class="span12 ckeditor m-wrap" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
											<div id="editor2_error"></div>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">รูปภาพ<span class="required">*</span></label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" name="userfile" class="default" data-error-container="#img_error" /></span>
													<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>

											<span class="label label-important">NOTE!</span>
											<span><b>ขนาดรูปภาพ 500x500 px </b></span>
											<div id="img_error"></div>
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
