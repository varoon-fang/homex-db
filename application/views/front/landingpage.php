
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



   <!-- Carousel
   ================================================== -->

     <div class="row bannerHeader">


      <div class="col-md-9 col-lg-9 col-sm-9">

        <div id="myCarousel" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
          	<?php
			  	$i=0;
			  	foreach($banner_list as $fett){
				  	$i++;

			  ?>
            <li data-target="#myCarousel" data-slide-to="<?= $i;?>" "<? if($i==1){ echo 'class="active"';}?>"></li>
            <? }?>
          </ol>
          <div class="carousel-inner">
			  <?php
			  	$i=0;
			  	foreach($banner_list as $fett){
				  	$i++;

			  ?>
            <div class="item <? if($i==1){ echo 'active';}?>">

              <img src="<?= site_url("images/banner/resize/$fett[banner_name]");?>" alt="<?= $fett['banner_name']?>">

            </div>
			<? }?>
          </div>

          <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div><!-- /.carousel -->

       </div><!--end col-->



       <!-- Promotion
       ================================================== -->

       <div class="col-md-3 col-lg-3 col-sm-3 hidden-xs ">


         <img src="<?= site_url("images/promotion/img/$promotion_list[promotion_img]");?>" class="img-responsive" alt="<?= $promotion_list['promotion_title'];?>">

       </div>

     </div><!--end row-->



     <!--============== Content===========================-->


     <div class="row">
     <div class="col-md-9  ">

   <!--=========solution===========-->

    <div class="content-section">

    <section id="landingSolution">


     <div class="row h1Tab bgH1Zone">

        <div class="pull-left"><h1 class="pull-left">SOLUTION </h1></div>


      </div>

      <br class="clearfix">

	    <div class="row ">

			   <div class="col-lg4 col-sm-4  col-md- 4 col-xs-6 ">
			        <a href="#"><img src="<?= site_url();?>frontend/assets/img/solution_0000_Layer-Comp-1.png" alt="Generic placeholder image" class="img-responsive"></a>
			   </div><!-- /.col-lg-3 -->

			   <div class="col-lg4 col-sm-4  col-md- 4 col-xs-6 ">
			        <a href="#"><img src="<?= site_url();?>frontend/assets/img/solution_0001_Layer-Comp-2.png" alt="Generic placeholder image" class="img-responsive"></a>
			   </div><!-- /.col-lg-3 -->


			   <div class="col-lg4 col-sm-4  col-md- 4 col-xs-6 ">
			        <a href="#"><img src="<?= site_url();?>frontend/assets/img/solution_0002_Layer-Comp-3.png" alt="Generic placeholder image" class="img-responsive"></a>
			   </div><!-- /.col-lg-3 -->

			   <div class="col-lg4 col-sm-4  col-md- 4 col-xs-6 ">
			        <a href="#"><img src="<?= site_url();?>frontend/assets/img/solution_0003_Layer-Comp-4.png" alt="Generic placeholder image" class="img-responsive"></a>
			   </div><!-- /.col-lg-3 -->

			   <div class="col-lg4 col-sm-4  col-md- 4 col-xs-6 ">
			        <a href="#"><img src="<?= site_url();?>frontend/assets/img/solution_0004_Layer-Comp-5.png" alt="Generic placeholder image" class="img-responsive"></a>
			   </div><!-- /.col-lg-3 -->

			   <div class="col-lg4 col-sm-4  col-md- 4 col-xs-6 ">
			        <a href="#"><img src="<?= site_url();?>frontend/assets/img/solution_0005_Layer-Comp-6.png" alt="Generic placeholder image" class="img-responsive"></a>
			   </div><!-- /.col-lg-3 -->


	    </div><!-- /.row -->


    </section><!--end solution-->

    </div><!--end content section-->

   <!-- ==============new Product ===================-->
    <div class="row ">

       <div class="content-section borderSlider">

		   <section class="landingNewProduct">

		    <h1 class="bxSliderBox">NEW PRODUCT</h1>
		   <div class="recent-work ">
						 <ul class="bxslider">
							 <?php
							 	foreach($product_new as $row){
							 ?>
						     <li>
						         <em>
						             <a href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", "-", $row['product_title'])."");?>">
						             <img src="<?= site_url("images/product/thumbs/$row[product_img]");?>" alt="<?= $row['product_title'];?>" /></a>

						         </em>
						         <a class="bxslider-block" href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", "-", $row['product_title'])."");?>">
						             <strong><?= character_limiter($row['product_title'],10);?></strong>
						             <div class="hidden-xs"><b><?= character_limiter(strip_tags($row['product_detail']), 40);?></b></div>
						         </a>
						     </li>
							 <? }?>
						  </ul>
		            </div>

		          </section>

           </div>
    </div><!--end row-->

    <br>

    <!-- ============== Best Seller ===================-->
     <div class="row">

        <div class="content-section borderSlider">

    		   <section class="landingNewProduct">

    		    <h1 class="bxSliderBox">BEST SELLER</h1>
    		   <div class="recent-work">
    						 <ul class="bxslider">

								  <?php
							 	foreach($product_best as $row){
							 ?>
						     <li>
						         <em>
						             <a href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", "-", $row['product_title'])."");?>"> <img src="<?= site_url("images/product/thumbs/$row[product_img]");?>" alt="<?= $row['product_title'];?>" /></a>

						         </em>
						         <a class="bxslider-block" href="<?= site_url("product_detail/$row[product_id]/".str_replace(" ", "-", $row['product_title'])."");?>">
						             <strong><?= character_limiter($row['product_title'],10);?></strong>
						             <div class="hidden-xs"><b><?= character_limiter(strip_tags($row['product_detail']), 40);?></b></div>
						         </a>
						     </li>
							 <? }?>

    						  </ul>

    		            </div>

    		          </section>

            </div>
     </div><!--end row-->

    </div><!--end col-9-->


    <div class="col-md-3 col-lg-3 ">

       <div class="rightZone">

        <!--  =====Knowlede Center=======-->
        <div class="row">
        <div class="col-md-12 col-lg-12 ">

         <div class="content-section   borderRightZone ">

              <section class="landingRightZone">

		          <h3><span class="glyphicon glyphicon-book"></span>&nbsp;Knowledge Center</h3>

				      <div class="list-group">
						  <?php
						  		foreach($knowledge_list as $row){
						  ?>
						        <div class="media">
									<a class="pull-left" href="<?= site_url("knowledge/detail/$row[knowledge_id]/".str_replace(" ", "-",$row['knowledge_title'])."");?>">
					                  <img class="media-object" src="<?= site_url("images/knowledge/thumbs/$row[knowledge_img]");?>" alt="<?= $row['knowledge_title'];?>">
				                    </a>
        			                <div class="media-body">
						                  <h4 class="media-heading"><?= $row['knowledge_title'];?></h4>
						                  <a href="<?= site_url("knowledge/detail/$row[knowledge_id]/".str_replace(" ", "-",$row['knowledge_title'])."");?>"><?= character_limiter(strip_tags($row['knowledge_detail']), 20);?></a>
						                </div>
						            </div><!--end media-->
						<? }?>
				      </div>
				        <br>
				        <div class="pull-right"><a href="<?= site_url("knowledge");?>">more >>&nbsp;</a></div>
				        <br>

				   </section>

            </div><!--end cotent-section-->
            </div>

            </div><!--end row-->


            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-4  col-xs-6">
            <!--  =====News=======-->
                  <div class="content-section   borderRightZone">

                       <section class="landingRightZone">

            		          <h3><span class="glyphicon glyphicon-bullhorn"></span>&nbsp;NEWS</h3>
							  	<?php
							  		foreach($news_list as $row){


							  	?>
							  	<a href="<?= site_url("news_detail/$row[news_id]/".str_replace(" ", "-", $row['news_title'])."");?>">
            				     <img src="<?= site_url("images/news/thumbs/$row[news_album_name]");?>" alt="<?= $row['news_title'];?>" class="img-responsive">
							  	</a>
		            				   <div class="media">
		            				         <div class="media-body">
		            				                  <h4 class="media-heading"><?= character_limiter($row['news_title'], 15);?></h4>
		            				                 	 <?= character_limiter(strip_tags($row['news_detail']), 20);?>
		            				          </div>
		            				     </div>

								 <? }?>
            				             <div class="pull-right"><a href="<?= site_url("news");?>">more >>&nbsp;</a></div>
            				             <br>
            				   </section>

                     </div><!--end cotent-section-->
             </div>


              <!--  =====Job=======-->


                <div class="col-md-12 col-lg-12 col-sm-4 col-xs-6 ">
                    <div class="content-section   borderRightZone">

                         <section class="landingRightZone">

              		          <h3><span class="glyphicon glyphicon-user"></span>&nbsp; JOBS</h3>
			  				  		<?php
			  				  			foreach($jobs_list as $fett){
			  				  		?>
              		                 <div class="media">

              				              <div class="media-body">

              				                <h4 class="media-heading">ตำแหน่ง : <?= $fett['jobs_name'];?></h4>
              				                   <ul class="list-unstyled">

              				                      <li>วันที่ : <?= $fett['jobs_date'];?></li>
              				                      <li>รายละเอียด : <?= character_limiter(strip_tags($fett['jobs_detail']), 20);?> </li>

              				                   </ul>
              				              </div>

              				            </div>
			  						<? }?>
              				        <div class="pull-right"><a href="<?= site_url("jobs");?>">more >>&nbsp;</a></div>
              				        <br>

              				   </section>

                       </div><!--end cotent-section-->
                  </div>


            <!--  =====Address=======-->
            <div class="col-md-12 col-lg-12 col-sm-4 col-xs-12 addressFloatLeft ">

                  <div class="content-section   borderRightZone">

                       <section class="landingRightZone">

            		          <h3><span class="glyphicon glyphicon-globe"></span>&nbsp;Address</h3>

            				       <img src="<?= site_url();?>frontend/assets/img/map260x150.jpg" alt="" class="img-responsive">
            				     <div class="media">
            				     <div class="media-body">
            				    <h4 class="media-heading">Media heading</h4>
            				    <p>Donec facilisis ac nulla vitae ultrices. Aliquam lacinia nulla turpis, eget varius elit feugiat id. Vestibulum tristique arcu quis auctor accumsan. Fusce euismod, nisi vel ullamcorper <br><br>
            				    <span class="glyphicon glyphicon-earphone"></span>&nbsp;056-313777 ต่อ 125  <br>
            				    <span class="glyphicon glyphicon-earphone"></span> Fax 056-334923 </p>
            				       </div>
            				             </div>
            				   </section>

                     </div><!--end cotent-section-->

                    </div><!--end col-->
                </div><!--end row-->

             <br>

       </div>

    </div><!--end col 3-->




    </div>


    <!--end content-section-->


   </div><!--end container content-->

   <!-- FOOTER -->

   <br>

   <?= $this->load->view('front/temp/menu_footer');?>
   <!-- <script src="<?= site_url();?>frontend/assets/scripts/app.js"></script>-->

