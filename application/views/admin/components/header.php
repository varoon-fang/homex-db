<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Backoffice | <?= $meta_title;?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?= site_url();?>backend/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= site_url();?>backend/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= site_url();?>backend/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= site_url();?>backend/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?= site_url();?>backend/assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?= site_url();?>backend/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?= site_url();?>backend/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?= site_url();?>backend/assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?= site_url();?>backend/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<link href="<?= site_url();?>backend/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?= site_url();?>backend/assets/plugins/select2/select2_metro.css" />
	<link rel="stylesheet" type="text/css" href="<?= site_url();?>backend/assets/plugins/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" href="<?= site_url();?>backend/assets/plugins/data-tables/DT_bootstrap.css" />

	<link rel="stylesheet" type="text/css" href="<?= site_url();?>backend/assets/plugins/bootstrap-datepicker/css/datepicker.css" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />

<!-- auto close alert -->
<script>
	window.setTimeout(function() {
    $("#alert-message").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
</script>

<script>
	window.setTimeout(function()
	{
		$("#alert-close").remove();
	}
	,4000);

</script>


</head>


