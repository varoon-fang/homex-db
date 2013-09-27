<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="<?= site_url();?>frontend/assets/js/bootstrap.min.js"></script>
    <script src="<?= site_url();?>frontend/assets/js/holder.js"></script>

    <script>

			    $('.carousel').carousel({
			      interval: 0
			    })
    </script>
      <script type="text/javascript" src="<?= site_url();?>frontend/assets/plugins/bxslider/jquery.bxslider.js"></script>

     <?php
     	if($this->uri->segment(1)=="product"  OR $this->uri->segment(1)=="product_detail"){
	     	$slide='6';
     	}else{
	     	$slide='4';
     	}
     ?>
      <script src="<?= site_url();?>frontend/assets/scripts/index.js"></script>
      <script type="text/javascript">
          jQuery(document).ready(function() {
              App.init();
              App.initBxSlider();
              Index.initRevolutionSlider();
          });

          $('.bxslider').bxSlider({
            minSlides: <?= $slide;?>,
            maxSlides: <?= $slide;?>,
            slideWidth: 360,
            slideMargin: 10
          });
      </script>
  </body>
</html>
