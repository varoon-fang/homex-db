
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
 	         <div class="content-sub-section">
	 			 <section id="subContent">

					<div class="page-header">
						<h1>JOBS</h1>
					</div><!--end page-header-->
					<div class="table-responsive">
					<table class="table table-striped ">

					<?php foreach($list_jobs as $row){ ?>
						<!-- =====  item  ===== -->
					<tr>
					  <td width="20%">
						<span class="Jobdate"><?= osdate("%d %B %Y", $row['jobs_date'], 'ISO-8859-7'); ?></span><br />
						<span class="JobHed">ตำแหน่ง : <?= $row['jobs_name'];?></span><br />
						<span class="Jobdegree">วุฒิการศึกษา : <?= $row['jobs_education'];?> </span>
					 </td>
					 <td width="55%">
						 <span class="Jobdate"></span><br />
						 <span class="JobHed"></span><br />
						 <span class="Jobdegree"><?= character_limiter(strip_tags($row['jobs_detail']), 100);?></span>
					 </td>
					 <td width="15%">
						 <span class="Jobdate"></span><br />
						 <span class="JobHed"></span><br />
						 <span class="Jobdegree">ประสบการณ์ <?= $row['jobs_expert'];?></span>
					 </td>
					 <td width="10%">
						 <span class="Jobdate"></span><br />
						 <span class="JobHed"></span><br />
						 <span class="Jobdegree"><?= $row['jobs_amount'];?> อัตรา</span>
					 </td>
					 <td width="20%">
					 <span class="Jobdate"></span><br />
					 <span class="JobHed"></span><br />
					 <button type="button" onclick="window.location.href='<?= site_url("jobs_detail/$row[jobs_id]/".str_replace(" ", "-", $row['jobs_name']) ."");?>'" class="btn btn-sm btn-primary"> <span class="glyphicon glyphicon-edit text-w"></span> กรอกใบสมัคร</button>
					 </td>
				   </tr>
				   <? }?>
		    </table>



			</div>
			<div class="row">

				<div class="text-center">

							    <ul class="pagination">
							     	<?= $this->pagination->create_links();?>
							    </ul>

				 </div>

			 </div><!--end row -->

	    </section><!--end subContent-->
      </div><!--end promotion-section-->


		    <!--=========end Content====================-->

           </div><!--end content-sub-secction-->

      </div><!-- end row-->

  </div>
  </div><!--end Main contineir-->

   <!-- FOOTER -->

   <?= $this->load->view('front/temp/menu_footer');?>

