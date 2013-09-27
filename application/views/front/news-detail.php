<!-- slider -->
	<link href="<?= site_url();?>frontend/assets/slider/slider.css" rel="stylesheet">
	<!-- <script type="text/javascript" src="<?= site_url();?>frontend/assets/slider/1.4.jquery.min.js"></script> -->
	<script type="text/javascript" src="<?= site_url();?>frontend/assets/slider/jquery.easing.1.3.js"></script>

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

			   <div class="row">
			  				<div class="col-lg-8 fillGreen">

			  					<div class="page-header">
			  						<h1> <a href="<?= site_url("news");?>">News</a> &gt; <small><?= $list_news['news_title'];?></small>
			  						<span class="pull-right DateNew"><?= osdate("%d %B %Y", $list_news['news_date'], "ISO-8859-7");?></span></h1>
			  					</div><!--end page-header-->

						  			<section class="midItemDetail">

										<div class="gallery col-lg-12 col-md-8 col-xs-12">
										<!--======Picture Preview ======-->

												<div id="bg"><a href="#" class="nextImageBtn" title="next"></a><a href="#" class="prevImageBtn" title="previous"></a>
												<img src="<?= site_url("images/news/resize/$album_news[news_album_name]");?>"  alt="<?= $list_news['news_title'];?>" id="bgimg" /></div>
												<div id="preloader"><img src="<?= site_url();?>frontend/assets/slider/ajax-loader_dark.gif" width="32px" height="32px" /></div>
												<div id="thumbnails_wrapper">
												<div id="outer_container">
												<div class="thumbScroller">
													<div class="container-img">
													<? foreach($list_album as $row){?>
												    	<div class="content">
												        	<div><a href="<?= site_url("images/news/resize/$row[news_album_name]");?>"><img src="<?= site_url("images/news/thumbs/$row[news_album_name]");?>" width="120px" alt="Denebola" class="thumb" /></a></div>
												        </div>
												    <? }?>

													</div>
												</div>
												</div>
												</div>

										</div>	<!--end gallery-->
										<br /><br /><br />

										<?= $list_news['news_detail'];?>
			  			 			</section>


			  				</div><!--end col-lg-8-->
			  				<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 fillRed">
			  				<br />
			  				<div class="row">
			  					<? foreach($news_more as $fett){?>
			  					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12 Newright">
			  						<div class="carousel-inner news">
			  						  <a href="<?= site_url("news_detail/$fett[news_id]/".str_replace(" ", "-", $fett['news_title'])."");?>">
			  							<img src="<?= site_url("images/news/thumbs/$fett[news_album_name]");?>" alt="<?= $fett['news_title'];?>" class="img-responsive"/>
			  						  </a>
			  							<div class="carousel-indicators news">
				  							<h4><a href="<?= site_url("news_detail/$fett[news_id]/".str_replace(" ", "-", $fett['news_title']))."";?>"><?= $fett['news_title'];?></a></h4>
				  							<p><?= osdate("%d %B %Y", $fett['news_date'], "ISO-8859-7");?></p>
				  						</div>
			  						</div>
			  					</div><!--end Newright-->
			  					<? }?>

		  					</div>
			  			  </div><!--end col-lg-4-->
			  		  </div><!--end row-->

		  </section><!--end subContent-->
      </div><!--end content-sub-secction-->
  </div><!--end Main contineir-->

   <!-- FOOTER -->
   <br />
   <?= $this->load->view("front/temp/menu_footer");?>
   <!--slider -->
	<script src="<?= site_url();?>frontend/assets/slider/slider.js" type="text/javascript"></script>
