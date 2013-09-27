
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

            <!--=========Content====================-->
            <div class="job-detail">
				<div class="page-header">
						<h1><a href="<?= site_url("jobs");?>">JOBS</a> > <small><?= $list_jobs['jobs_name'];?></small></h1>
					</div><!--end page-header-->
			           <section>

			           			<div class="col-lg-4">
				           			<div class="job-edge">
				           				<h4><?= $list_jobs['jobs_name'];?></h4>
				           				<p><b>วุฒิการศึกษา </b>: <?= $list_jobs['jobs_education'];?></p>
				           				<p><b>รายละเอียด  </b>: <?= $list_jobs['jobs_detail'];?></p>
				           				<p><b>คุณสมบัติ  </b>: <?= $list_jobs['jobs_ability'];?></p>
				           				<p><b>ประสบการณ์ <?= $list_jobs['jobs_expert'];?> </b></p>
				           				<p><b><?= $list_jobs['jobs_amount'];?> อัตรา</b></p>
			           				</div><!--end job-edge-->
			           			</div><!--end col-lg-4-->

			           			<div class="col-lg-8 ">
					           		<div class="job-edge">
				           				<h2>แบบฟอร์มสมัครงาน</h2>
				           				<form role="form" class="rgb7-style" >
				           				  <div class="form-group">
				           				    <label for="exampleInputEmail1">ชื่อ<font color="red">*</font></label>
				           				    <input type="text" name="name" required="required" class="form-control" id="exampleInput-Name" placeholder="Enter Name">
				           				  </div>
				           				  <div class="form-group">
				           				    <label for="exampleInput-sex">เพศ<font color="red">*</font></label>
				           				    <input type="radio" required="required" name="gender" value="ชาย" checked="checked"> ชาย
				           				    <input type="radio" required="required" name="gender" value="หญิง" > หญิง

				           				</div>
				           				<div class="form-group">
				           				  <label for="exampleInputEmail1">เบอร์ติดต่อ<font color="red">*</font></label>
				           				  <input type="tel" name="telephone" required="required" class="form-control" id="exampleInput-Tel" placeholder="Enter Tel">
				           				</div>
				           				<div class="form-group">
				           				  <label for="exampleInputEmail1">อีเมล์</label>
				           				  <input type="email" name="email" class="form-control" id="exampleInput-email" placeholder="Enter email">
				           				</div>
				           				<div class="form-group">
				           				  <label for="exampleInput-detail">ข้อความ</label>
				           				<textarea class="form-control" name="detail" rows="3"></textarea>
				           				</div>
				           				  <button type="submit" class="btn btn-default">Submit</button>
				           				</form>
			           				</div><!--end job-edge-->
			           			</div><!--end col-lg-8-->

			               </section><!--end subContent-->

		            </div>
 	         <!--end promotion-section-->


		    <!--=========end Content====================-->

           </div><!--end content-sub-secction-->

      </div><!-- end row-->

  </div>
  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

