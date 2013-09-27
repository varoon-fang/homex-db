

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="<?= site_url();?>backend/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?= site_url();?>backend/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?= site_url();?>backend/assets/plugins/excanvas.min.js"></script>
	<script src="<?= site_url();?>backend/assets/plugins/respond.min.js"></script>
	<![endif]-->
	<script src="<?= site_url();?>backend/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/select2/select2.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->


	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?= site_url();?>backend/assets/scripts/index.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/scripts/tasks.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->

	<!-- BEGIN TABLE PLUGINS -->
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/data-tables/DT_bootstrap.js"></script>
	<!-- END TABLE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/ckeditor/ckeditor.js"></script>

	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE PLUG-IN SCRIPTS -->
	<script src="<?= site_url();?>backend/assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/scripts/login.js" type="text/javascript"></script>
	<script src="<?= site_url();?>backend/assets/scripts/table-advanced.js"></script>
	<script src="<?= site_url();?>backend/assets/scripts/forms-validations.js"></script>
	<script src="<?= site_url();?>backend/assets/scripts/form-validations.js"></script>
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="<?= site_url();?>backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?= site_url();?>backend/assets/scripts/form-components.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {
		   App.init(); // initlayout and core plugins
		   Login.init();
		   Validations.init();
		   FormValidation.init();
		   TableAdvanced.init();
		   FormComponents.init();
		   Index.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
	</body>
<!-- END BODY -->
</html>