
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
	     	  	<h1> Knowleage</h1>
	     	  </div><!--end page-header-->
     		  <div class="row ">
		 		  <? foreach($knowledge_list as $row){ ?>
		     		   <!--  ======== item ========= -->
     		  			 <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 row knowledge-padding ">

		  					  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		  						  <a href="<?= site_url("knowledge/detail/$row[knowledge_id]/".str_replace(" ", "-",$row['knowledge_title'])."");?>">
		  						  <img src="<?= site_url("images/knowledge/resize/$row[knowledge_img]");?>" alt="<?= $row['knowledge_title'];?>" class="img-responsive" />
		  						  </a>
		  					  </div>
		  					  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		  						  <h4><?= $row['knowledge_title'];?></h4>
		  						  <h5><?= osdate("%d %B %Y, %H:%M", $row['knowledge_date'], 'ISO-8859-7');?></h5>
		  						  <p><?= character_limiter(strip_tags($row['knowledge_detail']), 350);?> <a href="<?= site_url("knowledge/detail/$row[knowledge_id]/".str_replace(" ","-",$row['knowledge_title'])."");?>">อ่านเพิ่มเติม&gt;&gt;</a></p>
		  					  </div>

     		  			  </div>
		  			  <!--  ========  end item ========= -->
	  			  <? }?>

     		  		</div><!--end row-->
	    	      <!-- ==========Page Nation=========== -->
     		  	       <div class="row">

	     		  	       <div class="text-center">

 		  	      			    <ul class="pagination">
 		  	      			      <?= $this->pagination->create_links();?>
 		  	      			    </ul>

	     		  	        </div>

     		  	        </div><!--end row -->
     	  </section><!--end subContent-->
     	</div><!--end content-sub-section-->




      </div><!--end content-sub-secction-->
  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

