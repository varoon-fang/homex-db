
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

		    <section id="subContent">

				    <div class="page-header">
				    	<h1> News</h1>
				    </div><!--end page-header-->
		    	  <div class="row">
					  <? foreach($news_list as $row){?>
		    			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 ">
		    				<div class="carousel-inner news">
		    				  <a href="<?= site_url("news_detail/$row[news_id]/".str_replace(" ", "-", $row['news_title'])."");?>">
		    					<img src="<?= site_url("images/news/thumbs/$row[news_album_name]");?>" alt="<?= $row['news_title'];?>" class="img-responsive"/>
		    				  </a>
		    					<div class="carousel-indicators news">
		    						<h4>
		    							<a href="<?= site_url("news_detail/$row[news_id]/".str_replace(" ", "-", $row['news_title'])."");?>">
				    						<?= character_limiter($row['news_title'], 20);?>
		    							</a>
		    						</h4>
		    						<p><?= osdate("%d %B %Y", $row['news_date'], 'ISO-8859-7'); ?></p>
		    					</div>
		    				 </div>
		    		   </div><!--end col-->
					   <? }?>
		        </div> <!--end row-->

		        <!-- ==========Page Nation=========== -->


		         <div class="row">

		         <div class="text-center">

		        			    <ul class="pagination">
		        			      <?= $this->pagination->create_links();?>
		        			    </ul>

		          </div>

		          </div><!--end row -->

		    </section>


      </div><!--end content-sub-section-->




      </div><!--end content-sub-secction-->
  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

