<html>
<head>


  <!-- Admin LTE Preset
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
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
<?php


require_once (getcwd() . '/config/config.php');


// Check connection
$db_link = mysqli_connect (MYSQL_HOST, 
                           MYSQL_BENUTZER, 
                           MYSQL_KENNWORT, 
                           MYSQL_DATENBANK);
						   
						   

if ( $db_link )
{
    if (isset($_GET['card'])) {
		//Weiterleitung einstellen
		
		
	}
    
	?>
	<body style="background-color: #e5e5e5;">
		<div class="col-md-8" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
			<div class="content-wrapper">
				  <div class="box box-primary">
					
					<div class="box-header with-border">
					  <h3 class="box-title">WildCard eingeben</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal" method="post" action="wildcard.php">
					  <div class="box-body">
						<div class="form-group">
						  <label for="inputWildCard" class="col-sm-2 control-label">Wildcard</label>

						  <div class="col-sm-10">
							<input class="form-control" id="inputWildCard" placeholder="WildCard" type="text" minlength="<?php echo $minlengthwildcard;?>" maxlength="<?php echo $maxlengthwildcard;?>" required>
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputUsername" class="col-sm-2 control-label">Username</label>

						  <div class="col-sm-10">
							<input class="form-control" id="inputUsername" placeholder="Username" type="text" maxlength="16" required>
						  </div>
						</div>
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-info pull-right">Einlösen</button>
					  </div>
					  <!-- /.box-footer -->
					</form>
				  
				  </div><!-- /.box -->
				</div>
			</div>
		</div>
	</body>
	
	
	<?php
}
else
{
    // hier sollte dann später dem Programmierer eine
    // E-Mail mit dem Problem zukommen gelassen werden
		?>
		<body>
		<div class="col-md-8" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
			<div class="box box-solid box-danger">
				<div class="box-header">
					<h3 class="box-title">Fehler!</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<p>Es gab einen Fehler. Die Webseite ist nicht einsatzbereit</p>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
		</body>
		<?php
    //die('keine Verbindung möglich: ' . mysqli_error());
}
?>
</html>