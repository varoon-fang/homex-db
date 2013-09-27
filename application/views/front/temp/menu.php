<div class="bgNavZone">

      <div class="container bgNavZone">

		     <nav class="navigatorZone rgb7-style-nav navbar ">

		       <ul class="nav nav-justified">
		         <li ><a href="<?= site_url("promotion");?>">PROMOTION</a></li>

		         <li class="dropdown">
		             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		               PRODUCTS <span class="caret"></span>
		             </a>
		             <ul class="dropdown-menu">
						 <?php foreach($cate_list as $fett){?>
		                   <li><a href="<?= site_url("product/$fett[product_group_id]/".str_replace(" ", "-", $fett['product_group_name'])."");?>"><?= $fett['product_group_name'];?></a></li>
		                 <? }?>
		             </ul>
		           </li>
		         <li class="dropdown">
		             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		               SOLUTIONS <span class="caret"></span>
		             </a>
		             <ul class="dropdown-menu">

		                   <li ><a href="<?= site_url("solution/bathroom");?>">Bathroom Solution</a></li>
		                   <li ><a href="#">Donec sed odio dui</a></li>
		                   <li ><a href="#">Donec sed odio dui</a></li>
		                   <li ><a href="#">Donec sed odio dui</a></li>
		                   <li ><a href="#">Donec sed odio dui</a></li>
		                   <li ><a href="#">Donec sed odio dui</a></li>

		             </ul>
		           </li>
		         <li ><a href="<?= site_url("news");?>">NEWS</a></li>
		         <li ><a href="<?= site_url("services");?>">SERVICES</a></li>
		         <li ><a href="<?= site_url("knowledge");?>">KNOWLEDGE</a></li>
		         <li ><a href="<?= site_url("contact");?>">CONTACT</a></li>


		       </ul>


         </nav>



    </div><!--end container-->

 </div><!--end bgnavzone-->