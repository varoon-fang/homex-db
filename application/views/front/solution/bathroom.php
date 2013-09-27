
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

             <h1>Solution <small>Bath Room</small></h1>

           </div>

          <!--================== Product  List========-->

			      <div class="product-list-section">

			         	      <!--=======Left List Group=======-->
					 		  <?= $this->load->view('front/temp/solution-list');?>

			         	      <!--=======Right  Content Solution=======-->

			         	     <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9  ">


			         	         <section id="solution">

			         	       		<!--  =====Tab Bar======-->
			         	              <div class="row">


			         	               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12    ">

					         	               <ul class="nav nav-tabs">
					         	                 <li class="active"><a href="#">บริการห้องน้ำครบวงจร</a></li>
					         	                 <li><a href="#">บริการพลิกโฉมห้องน้ำ (Speed Bathroom System)</a></li>

					         	               </ul>

			         	               </div>
			         	               <!--  =====Content======-->

			         	               <br>
			         	               <img src="<?= site_url();?>frontend/assets/img/solutions/bathroom.jpg" alt="" class="img-responsive" />
			         	               <br />
			         	                <ul>
				         	                <li> มืออาชีพทุกขั้นตอนการบริการ</li>
				         	                <li> ปรับเล็กเปลี่ยนใหญ่ไลฟ์สไตล์ไม่เคยหยุดนิ่ง</li>
			         	                </ul>
			         	                <p>บริการที่จะช่วยให้ห้องน้ำในฝันของคุณเป็นเรื่องง่ายด้วยบริการจากมืออาชีพ ตั้งแต่การแนะนำ ให้คำปรึกษา ออกแบบห้องน้ำ ซึ่งสะท้อนสไตล์ของผู้ใช้ จนถึงการติดตั้งโดยช่างมืออาชีพจาก COTTO พร้อมให้บริการทั้งห้องน้ำใหม่ และห้องน้ำที่ต้องการปรับปรุง ไม่ว่าจะปรับเล็กเปลี่ยนใหญ่ก็ทำได้ง่ายๆด้วยมาตรฐานที่มั่นใจได้ ตรงต่อเวลา พร้อมการรับประกัน 1 ปี</p>

			         	               </div><!--end row-->



	         	               </section>



			    </div><!--end col9-->

		    <!--=========end Content====================-->

           </div><!--end content-sub-secction-->

      </div><!-- end row-->

  </div>
  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

