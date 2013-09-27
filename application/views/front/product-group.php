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


       <div class="page-header">

             <h1><?= $group_list['product_group_name'];?></h1>

           </div>

          <!--==================Related Product ========-->


         <section class="product-group-list">

         <!-- ========== Group========-->
           <div class="product-group-section">
			   <? foreach($sub_list as $fett){
				   $sub_id = $fett['product_sub_id'];
				   $sub_name = $fett['product_sub_name'];
			   ?>
         	    <h2><a href="<?= site_url("product_list/$sub_id/$sub_name");?>"><?= $fett['product_sub_name'];?></a></h2>

         	      <div class="recent-work">

         					 <ul class="bxslider">
			 					 <?php
			 					 $sql = "select * from product where product_sub='$sub_id' order by product_id desc limit 18";
			 					 	$product_list=$this->db->query($sql)->result_array();
			 					 foreach($product_list as $row){ ?>
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

         	            </div><!--end recent work-->


         	           </div><!--end group-->
		 			  <? }?>


         	      </section>


       </div>
      </div><!--end content-sub-secction-->

  </div><!--end Main contineir-->

   <!-- FOOTER -->
   <br>
   <?= $this->load->view('front/temp/menu_footer');?>
