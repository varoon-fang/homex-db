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
             	<a href="<?= site_url("product/$group_list[product_group_id]/$group_list[product_group_name]");?>">
             		<?= $group_list['product_group_name'];?>
         		</a> > <small><?= $list_sub['product_sub_name'];?></small></h1>

           </div>

          <!--================== Product  List========-->

			      <div class=" product-list-section">

			         	          <!--=======Left List Group=======-->


					         	 <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12 ">


					         	            <aside>

					         	            <ul class=" list-group">

					         	              <li class="list-group-item"><h4 class="list-group-item-heading">List group item heading</h4></li>
					         	              <?php foreach($sub_more as $row){

						         	              	$sql = "select * from product where product_sub='$row[product_sub_id]'";
						         	              		$count=$this->db->query($sql)->num_rows();
					         	              ?>
					         	              <li class="list-group-item">
					         	              	<a href="<?= site_url("product_list/$row[product_sub_id]/".str_replace(" ", "-", $row['product_sub_name'])."");?>">
					         	              		<?= $row['product_sub_name'];?>
				         	              		</a>
					         	              <span class="badge"><?= $count;?></span></li>
					         	              <? }?>
					         	            </ul>

					         	           </aside>
					         	 </div><!-- /.col-sm-4 -->

			         	      <!--=======Right List Group=======-->

			         	     <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12  ">


			         	         <section id="product-list">


			         	               <div class="row">
						 			<?php foreach($sub_list as $row){?>
			         	              <!--=======item======-->
			         	                <div class=" col-sm-4 col-md-3 col-lg-3 col-xs-6 ">

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
						 						  $type="";
			         	                      }
			         	                      ?>
			         	                      <?= $type;?>
			         	                      <a href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", "-", $row['product_title'])."");?>"><?= character_limiter($row['product_title'], 15);?></a></h3>
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

			    </div><!--end col9-->


          </div>
   </div><!--end content-sub-secction-->


  </div>
  <!--end content-sub-secction-->

  </div><!--end Main contineir-->

   <!-- FOOTER -->
   <br>
   <?= $this->load->view('front/temp/menu_footer');?>
