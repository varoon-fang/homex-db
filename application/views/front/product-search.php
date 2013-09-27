 <!-- RGB7 Extend Product-->
     <link href="<?= site_url();?>frontend/assets/css/bxslider-4-product.css" rel="stylesheet">

<!-- NAVBAR
================================================== -->
  <body class="bgBodyZone">

  <!-- Header
  ================================================== -->
	<?= $this->load->view('front/temp/sub_header');?>
 <!-- Navigator
   ================================================== -->
   <?= $this->load->view('front/temp/menu');?>

<div class="container bgContentZone">

  <!--=========Content====================-->
  <div class="row">

      <div class="content-sub-section">


       <div class="page-header ">

             <h1>
             	ค้นหา : <small><?= $this->input->get('keyword');?></small></h1>

           </div>

          <!--================== Product  List========-->

			      <div class=" product-sub-section">


			         	         <section class="product-group-list">


			         	               <div class="row">
						 			<?php foreach($search_list as $row){?>
			         	              <!--=======item======-->
			         	                <div class=" col-sm-3 col-md-2 col-lg-2 col-xs-6 ">

			         	                    <div class="product-thumbnail">

			         	                    <a href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", "-", $row['product_title'])."");?>">
			         	                    	<img src="<?= site_url("images/product/thumbs/$row[product_img]");?>" class="img-responsive" >
		         	                    	</a>

			         	                    <div class="caption">
			         	                      <h3>
			         	                      <?if($row['product_type']=="สินค้าใหม่"){
				         	                      $type="<p><span class=\"label label-new\">สินค้าใหม่</span></p>";
			         	                      }elseif($row['product_type']=="สินค้าขายดี"){
				         	                      $type="<p><span class=\"label label-best\">สินค้าขายดี</span></p>";
			         	                      }elseif($row['product_type']=="สินค้าแนะนำ"){
				         	                      $type="<p><span class=\"label label-info\">สินค้าแนะนำ</span></p>";
			         	                      }else{
						 						  $type="<p><span class=\"label\"></span></p><br />";
			         	                      }
			         	                      ?>
			         	                      <?= $type;?>
			         	                      <a href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", "-", $row['product_title'])."");?>"><?= character_limiter($row['product_title'], 10);?></a></h3>
			         	                      </div>

			         	                      </div><!--end product-thumb-->

			         	                </div><!--end col-->
					 					<? }?>

	         	            </div><!--end row-->

	         	     </section>

			         	    <!-- =====pagination===========  -->
			         	   <div class="text-center col-md-12 ">

			         	     <ul class="pagination ">
			         	       <?= $this->pagination->create_links(); ?>
			         	     </ul>

			         	  </div>

          </div>
   </div><!--end content-sub-secction-->


  </div>
  <!--end content-sub-secction-->

  </div><!--end Main contineir-->

   <!-- FOOTER -->
   <br>
   <?= $this->load->view('front/temp/menu_footer');?>
