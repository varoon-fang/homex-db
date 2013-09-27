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
  <div class="content-sub-section">

        <br>

        <div class="row">

		        <ol class="breadcrumb">
		          <li><a href="<?= site_url("product/$group_list[product_group_id]/".str_replace(" ", "-", $group_list['product_group_name'])."");?>"><?= $group_list['product_group_name'];?></a></li>

		          <li><a href="<?= site_url("product_list/$sub_list[product_sub_id]/".str_replace(" ", "-", $sub_list['product_sub_name'])."");?>"><?= $sub_list['product_sub_name'];?></a></li>

		          <li class="active"><?= $list_product['product_title'];?></li>
		        </ol>

      </div>

   <!-- ===========Product Detail ======================-->
		   <div class="row">

					   <section id="product-detail">
					           <!--====Images=====-->
							     <div class="col-md-5  col-lg-5 col-sm-6 fill-blue">

							          <img src="<?= site_url("images/product/resize/$list_product[product_img]");?>" class="img-responsive" alt="<?= $list_product['product_title'];?>">

							     </div>


							     <!--=======Data======-->
							     <div class="col-md-7 col-lg-7 col-sm-6 fill-red">

							          <h3><?= $list_product['product_title'];?></h3>
							           <?
							           	  if($list_product['product_type']=="สินค้าใหม่"){
			         	                      $type="<div><span class=\"label label-new\">สินค้าใหม่</span></div><br />";
		         	                      }elseif($list_product['product_type']=="สินค้าขายดี"){
			         	                      $type="<div><span class=\"label label-best\">สินค้าขายดี</span></div><br />";
		         	                      }elseif($list_product['product_type']=="สินค้าแนะนำ"){
			         	                      $type="<div><span class=\"label label-info\">สินค้าแนะนำ</span></div><br />";
		         	                      }else{
					 						  $type="<br />";
		         	                      }
			         	                      ?>
			         	                      <?= $type;?>
							          <h4>รหัสสินค้า : <?= $list_product['product_codename'];?></h4>
							          <?= $list_product['product_detail'];?>
							          <div class="share-social"><img src="frontend/assets/img/test-social-icon.png" alt=""></div>

							     </div>



					     </section>


		  </div><!--end row-->

         <!--==================Related Product ========-->
         <div class="row">

         <div class="content-section borderSlider">

         	   <aside class="related-product">

         	    <h1 class="bxSliderBox">สินค้าใกล้เคียง</h1>

         	   <div class="recent-work">

         					 <ul class="bxslider">

			 					 <?php foreach($res_product as $row){?>

         					      <li>
         					         <em>
         					             <a href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", " -", $row['product_title'])."");?>">
         					             	<img src="<?= site_url("images/product/thumbs/$row[product_img]");?>" alt="<?= $row['product_title'];?>" />
     					             	 </a>

         					         </em>
         					         <a class="bxslider-block" href="#">
         					             <strong><?= $row['product_title'];?></strong>

         					         </a>
         					     </li>
		 						 <? }?>

         					  </ul>

         	            </div>

         	          </aside>

             </div><!--end content section border-->

         </div><!--end row-->



      </div>
  <!--end content-sub-secction-->

  </div><!--end Main contineir-->

   <!-- FOOTER -->
   <br>
   <?= $this->load->view('front/temp/menu_footer');?>
