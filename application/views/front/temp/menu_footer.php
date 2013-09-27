 <hr>
<div class="bgFooterZone">

  <footer>
    <br>
     <div class="container ">

		   <div class="row">

		      <div class="col-md-3 col-sm-3 col-xs-6">

		      		     <nav id="listFooter">
		      		     		 <h3>Sitemap</h3>

				      		     <ul class=" list-unstyled">

				      		       <li><a href="<?= site_url('promotion');?>">PROMOTION</a></li>
				      		       <li><a href="<?= site_url('news');?>">NEWS</a></li>
				      		       <li><a href="<?= site_url('services');?>">SERVICES</a></li>
				      		       <li><a href="<?= site_url('knowledge');?>">KNOWLEDGE</a></li>
				      		       <li><a href="<?= site_url('contact');?>">CONTACT</a></li>
				      		       <li><a href="<?= site_url('jobs');?>">JOBS</a></li>

				      		      </ul>

		      		       </nav>

		      </div>

				        <div class="col-md-3 col-sm-3 col-xs-6">

				            		     <nav class="listFooter">

				            		     	<h3>Solution</h3>

				            		     	 <ul class=" list-unstyled">
				      		      		     <li ><a href="#">Roof Solution</a></li>
				      		      		     <li ><a href="#">Donec sed odio dui </a></li>
				      		      		     <li> <a href="#">Donec sed odio dui</a></li>
				      		      		     <li ><a href="#">Donec sed odio dui</a></li>
				      		      		     <li ><a href="#">Donec sed odio dui</a></li>
				      		      		     <li ><a href="#">Donec sed odio dui</a></li>
				      		      		     <li ><a href="#">Donec sed odio dui</a></li>



				            		        </ul>
				            		       </nav>

				          </div>

				          <div class="col-md-3 col-sm-3 col-xs-6">

				                   		     <nav class="listFooter">

				                   		     	<h3>Product</h3>

				                   		     	 <ul class=" list-unstyled">
				                   		     	 	<?php foreach($cate_list as $row){?>
				             		      		       <li>
				             		      		       	<a href="<?= site_url("product/$row[product_group_id]/".str_replace(" ", "-", $row['product_group_name'])."");?>">
								 			  			   	<?= $row['product_group_name'];?>
							 			  			   	</a>
							 			  			   </li>
				             		      		    <? }?>
				                   		        </ul>
				                   		       </nav>

				                 </div>


					      <div class="col-md-3 col-sm-3 col-xs-6  ">


					         <address>

					             <p><strong>SCG Solution Center</strong><br>
					           450 ม. 8  ต. นครสวรรค์ตก<br>
					            อ.เมืองฯ    จ.นครสวรรค์     60000 <br>
					            056-313777 ต่อ 125  <br>
					            Fax 056-334923 </p>

					         </address>


					       </div><!--end col sm-4-->


		        </div><!--end row-->

		     <div class="row">

		          <br class="clearfix">
		          <p class="pull-right"><a href="#">Back to top</a></p>
		         <p class="copyright">&copy; 2013 SCG Solution Center All rights reserved. </p>

		      </div><!--end row-->



    </div><!-- /.container -->

    </footer>

</div><!-- /main .container -->