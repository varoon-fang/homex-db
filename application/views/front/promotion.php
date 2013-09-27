
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



 <div class="row">

     <div class="content-sub-section">


          <div class="page-header ">

            <h1>Promotion</h1>

          </div>

            <!--=========Content====================-->
            <div class="promotion-section">

		               <div class="">

		                  <section id="promotion">

		                 <!--======promotion item======-->
						 <? foreach($list_promotion as $row){ ?>
		                   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6  ">

			                            <div class="promotion-thumbnail clearfix">

					                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  ">

					                            <img src="<?= site_url("images/promotion/img/$row[promotion_img]");?>" alt="<?= $row['promotion_title'];?>" class="img-responsive">

					                       </div>

					                       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">

					                            <h2><?= $row['promotion_title'];?></h2>
					                            <?= $row['promotion_detail'];?>
					                            <p><button type="button" class="btn  btn-default " onclick="window.open('<?= site_url("images/promotion/$row[promotion_pdf]");?>')"><span class="glyphicon glyphicon-download "></span>&nbsp;Download PDF</button></p>

					                       </div>

				                   </div><!--end thumb-->
						  <? }?>

		                  </section>

		                  <br>
		                  <br>

		               </div><!--end row-->

		            </div>

 	         <!--end promotion-section-->


		    <!--=========end Content====================-->

           </div><!--end content-sub-secction-->

      </div><!-- end row-->

  </div>
  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

