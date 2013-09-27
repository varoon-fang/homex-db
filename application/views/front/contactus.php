
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

            <h1>Contact Us</h1>

          </div>

            <!--=========Content====================-->
 	         <div class="contact">

			             <section>

					             <div class="col-lg-8">

						             <form role="form" class="rgb7-style" >
						               <div class="form-group">
						                 <label for="exampleInputEmail1">ชื่อ</label>
						                 <input type="email" class="form-control" id="exampleInput-Name" placeholder="Enter Name">
						               </div>
						             <div class="form-group">
						               <label for="exampleInputEmail1">e-mail</label>
						               <input type="email" class="form-control" id="exampleInput-email" placeholder="Enter email">
						             </div>
						             <div class="form-group">
						               <label for="exampleInputEmail1">หัวข้อ</label>
						               <input type="email" class="form-control" id="exampleInput-Type" placeholder="Enter Type">
						             </div>
						             <div class="form-group">
						               <label for="exampleInput-detail">ข้อความ</label>
						             <textarea class="form-control" rows="3"></textarea>
						             </div>
						               <button type="submit" class="btn btn-default">Submit</button>
						             </form>
					             </div>

					             <div class="col-lg-4">

						             <h4 class="bgNavZoneSub">Address</h4>
						             <div class="map">
						            <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps/ms?msa=0&amp;msid=211752819583780063017.0004e5dd67df8fef328a4&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=15.687171,100.05352&amp;spn=0.115687,0.145912&amp;z=12&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.co.th/maps/ms?msa=0&amp;msid=211752819583780063017.0004e5dd67df8fef328a4&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=15.687171,100.05352&amp;spn=0.115687,0.145912&amp;z=12&amp;source=embed" style="color:#0000FF;text-align:left">SCG Solution Center นครสวรรค์</a> in a larger map</small>
						              </div>
						             <address>

						             <p><strong>SCG Solution Center</strong><br>
						             450 ม. 8  ต. นครสวรรค์ตก<br>
						              อ.เมืองฯ    จ.นครสวรรค์     60000 <br>
						              056-313777 ต่อ 125  <br>
						              Fax 056-334923 </p>

						             </address>

					             </div>

				             </section>

				              <div class="">

				                  <h2>About us</h2>
				                  <div class="col-lg-3">
				                      <img src="frontend/assets/img/New/240x160.jpg" class="img-responsive" />
				                  </div>
				                  <div class="col-lg-9">
				                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget facilisis odio, vel ultrices sapien. Etiam faucibus convallis feugiat. Aliquam porta fringilla quam, congue feugiat odio ullamcorper ut. Nulla vehicula mi ut accumsan porta. Proin sed velit nec ligula iaculis tempor at id metus. Nulla facilisi. Maecenas dui tortor, scelerisque et felis vel, iaculis auctor nisl. Etiam ac augue sed magna pharetra aliquet eu a nibh. Phasellus auctor pellentesque nisl non pellentesque. Vivamus sed varius diam. Aliquam vel dictum tortor, sed mattis lacus. Duis sed tortor lacinia, auctor ipsum vitae, scelerisque orci. Sed tortor est, dapibus ut nunc eu, consequat consectetur dolor. Aenean laoreet euismod ante.
				                      </p><br />
				                   </div>

				            </div>

		           </div><!--end promotion-section-->


		    <!--=========end Content====================-->

           </div><!--end content-sub-secction-->

      </div><!-- end row-->

  </div>
  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

