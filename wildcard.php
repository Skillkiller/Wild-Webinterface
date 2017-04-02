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
	if (isset($_POST['card']) && isset($_POST['username'])) {
		
		$sql = "SELECT * FROM card WHERE card LIKE '" . $_POST['card'] . "'";
		$db_erg = mysqli_query( $db_link, $sql );
		
		if ( ! $db_erg )
		{
		  
			?>
			<body>
				<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
					<div class="box box-solid box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Wildcard ungültig!</h3>
						</div>
						<div class="box-body">
							<p>Diese Wildcard wurde entweder bereits verwendet oder sie exestiert nicht!</p>
							<p>Leite dich zurück auf die Startseite.</p>
						</div>
					</div>
				</div>
				<meta http-equiv="refresh" content="5; URL=index.php"  />	
			</body>
			<?php
		  die();
		}
		
		$zeile = mysqli_fetch_array($db_erg, MYSQLI_ASSOC);
		if ($zeile['used'] <  $zeile['maxuse']) {
			$currentuse = $zeile['used'] + 1;
			$sql = "UPDATE `card` SET `used` = '" . $currentuse . "' WHERE `card`.`card` =  '". $_POST['card'] . "'";
			
			$db_erg = mysqli_query( $db_link, $sql );
			if ( ! $db_erg) {
				//Das Updaten der Datenbank schlug fehl
				?>
				<body>
					<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
						<div class="box box-solid box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Unerwarteter Fehler!</h3>
							</div>
							<div class="box-body">
								<p>Es ist leider ein unerwarter Fehler aufgetreten! Das tut uns leid :C</p>
								<p>Leite dich zurück auf die Startseite.</p>
							</div>
						</div>
					</div>
					<meta http-equiv="refresh" content="5; URL=index.php"  />	
				</body>
				<?php
				die();
			}
			
			//INSERT INTO `player` (`id`, `name`, `card`) VALUES (NULL, 'username', '123');
			$sql = "INSERT INTO `player` (`id`, `name`, `card`) VALUES (NULL, '" . $_POST['username'] . "', '" . $_POST['card'] . "')";
			$db_erg = mysqli_query( $db_link, $sql );
			if ( ! $db_erg ) {
				//Fehler beim Einfügen des Spielers auf die Whitelist
				?>
				<body>
					<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
						<div class="box box-solid box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Unerwarteter Fehler!</h3>
							</div>
							<div class="box-body">
								<p>Es ist leider ein unerwarter Fehler aufgetreten! Das tut uns leid :C</p>
								<p>Leite dich zurück auf die Startseite.</p>
							</div>
						</div>
					</div>
					<meta http-equiv="refresh" content="5; URL=index.php"  />	
				</body>
				<?php
				die();
			}
			
			?>
			<body>
			<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Wildcard eingelöst!</h3>
						<div class="box-tools pull-right">
						<span class="label label-success">WildCard-ID: <?php echo $zeile['id']?></span>
						</div><!-- /.box-tools -->
					</div><!-- /.box-header -->
					<div class="box-body">
						<p>Du hast die Wildcard erfolgreich eingelöst, du kannst nun den Server betreten.</p>
						<p>Viel Spaß</p>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>	
			</body>
			<?php
			
			
		} else {
			//Card zu oft verwendet
			?>
			<body>
				<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
					<div class="box box-solid box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Wildcard ungültig</h3>
						</div>
						<div class="box-body">
							<p>Diese Wildcard wurde bereits zu oft verwendet!</p>
							<p>Leite dich zurück auf die Startseite.</p>
						</div>
					</div>
				</div>
				<meta http-equiv="refresh" content="5; URL=index.php"  />	
			</body>
			<?php
		}
		
		
		
	} else {
		//Keine Daten eingegeben!
		?>
		<body>
			<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
				<div class="box box-solid box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Keine Angaben!</h3>
					</div>
					<div class="box-body">
						<p>Du hast leider nicht alle benötigten Daten angegeben!</p>
						<p>Leite dich zurück auf die Startseite.</p>
					</div>
				</div>
			</div>
			<meta http-equiv="refresh" content="3; URL=index.php"  />	
		</body>
		<?php
	}
	
} else {
	//Datenbank nicht erreicht!
	
}

?>
</html>