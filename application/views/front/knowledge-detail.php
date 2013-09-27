
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

		  <section id="subContent" class="konwleage-detail">

		  				<div class="row">
		  						<div class="col-lg-8">

		  							<div class="page-header">
		  								<h1> <a href="<?= site_url("knowledge");?>">Knowledge </a> &gt; <small> <?= $rs_know['knowledge_title'];?></small> </h1>
		  							</div><!--end page-header-->

		  							<img src="<?= site_url("images/knowledge/resize/$rs_know[knowledge_img]");?>" alt="<?= $rs_know['knowledge_title'];?>" class="img-responsive" />

		  							<?= $rs_know['knowledge_detail'];?>

		  						</div><!--end col-lg-8-->

		  						<div class="col-lg-4 ">

		  						<h3><span class="glyphicon glyphicon-book"></span>&nbsp;Knowledge center</h3>

		  						    <div class="list-group">
			  							<?php foreach($know_list as $row){?>
		  							    <div class="media">

		  						                <div class="media-body">
		  							              <h4 class="media-heading"><?= $row['knowledge_title'];?></h4>
		  							              <a href="<?= site_url("knowledge/detail/$row[knowledge_id]/".str_replace(" ", "-", $row['knowledge_title'])."");?>">
		  							              	<?= character_limiter(strip_tags($row['knowledge_detail']), 45);?>
		  							              </a>
		  							            </div>

		  							     </div><!--end media-->
		  								 <? }?>

		  					        </div><!--end list group-->

		  						</div><!--end col-lg-4-->
		  				</div><!--end row-->
		  			</section>
      </div><!--end content-sub-section-->

  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

