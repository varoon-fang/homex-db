<div class="container bgHeaderZone">

   <header id="headerZone">

   <!-- =====Left====-->

    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 logo ">
      <a href="<?= site_url();?>"><img src="<?= site_url("frontend/assets/img/logo.png");?>" alt="Home solution center นครสวรรค์"></a>
    </div>



   <!-- =====Right====-->
    <div class="col-md-4 col-md-offset-4  col-sm-6 col-xs-12 " >

    <address>

        <p><i class="glyphicon glyphicon-earphone"></i>&nbsp;0 5327 7855, 0 5394 2806-7 <br>
        youremail@company.com | <a href=""><img src="<?= site_url();?>frontend/assets/img/icon-facebook.png" alt="logo facebook"></a><br>
         </p>

    </address>

  <!-- =====Search ======-->
   <form action="<?= site_url("product/search/");?>" medthod="GET">
     <div class="input-group input-group-sm">
       <input type="text" name="keyword" class="form-control">
       <span class="input-group-btn">
         <button class="btn btn-default" type="submit">Search</button>
       </span>
     </div><!-- /input-group -->
     </form>

    </div><!--end Right col-4-->

   </header>

  </div>