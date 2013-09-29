
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
					         	                 <li ><a href="#">บริการห้องน้ำครบวงจร</a></li>
					         	                 <li class="active"><a href="#">บริการพลิกโฉมห้องน้ำ (Speed Bathroom System)</a></li>

					         	               </ul>

			         	               </div>
			         	               <!--  =====Content======-->

			         	               <br>
			         	               <img src="../assets/img/solutions/bathroom.jpg" alt="" class="img-responsive" />
			         	               <br /> 
			         	                <ul>
			         	                    <li> พลิกโฉมห้องน้ำได้ตามสไตล์คุณ </li>
			         	                    <li> เทคโนโลยีการออกแบบโครงสร้างที่มีความทันสมัย </li>
			         	                    <li> รวดเร็วกว่า สะอาดกว่า และยืดหยุ่นกว่า </li>
			         	                </ul>
			         	                <p>บริการที่ช่วยพลิกโฉมห้องน้ำได้ตามสไตล์คุณ ด้วยทีมช่างมืออาชีพจาก SCG ซึ่งจะขจัดความยุ่งยากในการปรับปรุงห้องน้ำแบบเดิมๆ ด้วยเทคโนโลยีการออกแบบโครงสร้างที่มีความทันสมัย ด้วย Smart Frame, Smart Board และ Smart Grip ทำให้การติดตั้งรวดเร็วกว่า สะอาดกว่า และยืดหยุ่นกว่า ไม่ต้องเสียเวลาทุบพื้นผิวเดิมออก ช่วยลดการเกิดฝุ่น เสียงรบกวน และไม่กระทบโครงสร้างหลัก เป็นระบบที่มีความยืดหยุ่นสูงกับพื้นที่ขนาดต่างๆ ง่ายต่อการปรับปรุงหรือซ่อมแซมในอนาคต</p>

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

