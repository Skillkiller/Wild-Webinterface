<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">



</head>
<body>
<script src="dist/js/clipboard.min.js"></script>
<script>new Clipboard('.btn');</script>
	<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Copy</h3>
				<div class="box-tools pull-right">				
				<button type="button" data-clipboard-target="#card" class="btn btn-block btn-success btn-sm" ><span class="glyphicon glyphicon-copy"></span></button>
				</div>
			</div>
			<div class="box-body">
			<input id="card" class="form-control input-lg" readonly placeholder="Error!" type="text" value="<?php echo $_GET['copy'];?>">
			</div>
		</div>
		
		
		
	</div>
</body>





</html>