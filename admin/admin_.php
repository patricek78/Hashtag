<?php
session_start();
if (!isset($_SESSION['login']))
{
    header ('Location: index.php');
    exit();	
}

// on teste si le visiteur a soumis le formulaire
if (isset($_POST['valid_connect']) && $_POST['valid_connect'] == 'Envoyer') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['crea_login']) && !empty($_POST['crea_login'])) && (isset($_POST['crea_pwd']) && !empty($_POST['crea_pwd'])) && (isset($_POST['crea_pwd_verif']) && !empty($_POST['crea_pwd_verif']))) {
	// on teste les deux mots de passe
	if ($_POST['crea_pwd'] != $_POST['crea_pwd_verif']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
			$date_debut = $_POST['date_debut'];
			$date_fin = $_POST['date_fin'];
			if( strtotime($date_debut) < mktime(0, 0, 0, date('m'), date('d'), date('Y')) )
			{  
				$erreur = 'Date de début trop ancienne';
			}
			else{
				if( strtotime($date_debut) > strtotime($date_fin) )
				{  
					$erreur = 'La date de fin est inférieur à la date de début';
				}
				else{
					include("inc/conf.php");//connexion à la base de données
	
					// on recherche si ce login est déjà utilisé par un autre membre
					$sql = 'SELECT count(*) FROM user WHERE login="'.mysql_escape_string($_POST['crea_login']).'"';
					$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
					$data = mysql_fetch_array($req);
			
					if ($data[0] == 0) {
					$sql = 'INSERT INTO user VALUES("", "'.mysql_escape_string($_POST['crea_login']).'", "'.mysql_escape_string(md5($_POST['crea_pwd'])).'", "'.$date_debut.'", "'.$date_fin.'")';
					mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
			
					session_start();
					$_SESSION['crea_login'] = $_POST['crea_login'];
					$msg_valid = 'Login et mot de passe enregistrés';
					$_SESSION['msg_valid'] = $msg_valid;
					header('Location: admin.php');
					exit();
					}
					else {
					$erreur = 'Ce login existe déjà';
					}
				}
				
			}
			
		}
	}
	else {
	$erreur = 'Remplir tous les champs';
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<title>H-TAG</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../index.css" rel="stylesheet" type="text/css">
		
		<link type="text/css" rel="stylesheet" href="../js/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.fancybox.pack.js"></script>

	</head>
	<body>
			<div class="section section_header">
					<div class="container">
							<div class="row">
									<div class="col-md-12 header">
											<img src="img/header_titre.png" class="header_titre">
									</div>
							</div>
					</div>
			</div>
			
			<div class="section section_titre">
					<div class="row">
							<div class="visible-md visible-lg col-md-12 titre_webserie">
								   <span>Création des accès clients</span> 
							</div>
							 <div class="visible-sm col-sm-12 titre_webserie">
									<span>Création des accès clients</span>
							</div>
							 <div class="visible-xs col-xs-12 titre_webserie">
									<span>Création des accès clients</span>
							</div>
					</div>
			</div>
			
			<div class="section section_content">
					
					<div class="row row_password">
						<form name="form_acces_client" method="post" action="">
							<table id="table_connect" class="table_connect_admin" cellpadding="5">
								<!-- LOGIN -->
								<tr>
									<td class="txt_form"><label for="pseudo">Login : </label></td>
								</tr>
								<tr>
									<td><input type="text" class="inpt" name="crea_login" value="<?php  if (!empty($_POST["crea_login"])) {  echo htmlspecialchars($_POST["crea_login"],ENT_QUOTES);  } ?>" /></td>
								</tr>
								<!-- // LOGIN -->
								<!-- Mot de passe -->
								<tr>
									<td class="txt_form"><label for="pwd">Mot de passe :</label></td>
								</tr>
								<tr>
									<td><input type="password" class="inpt" value="" name="crea_pwd" /></td>
								</tr>
								<tr>
									<td class="txt_form"><label for="pwd">Confirmation mot de passe :</label></td>
								</tr>
								<tr>
									<td><input type="password" class="inpt" value="" name="crea_pwd_verif" /></td>
								</tr>
								<!-- // Mot de passe -->
								<!-- Date début -->
								<tr>
									<td class="txt_form"><label for="pwd">Début de la session :</label></td>
								</tr>
								<tr>
									<td><input type="date" class="inpt" name="date_debut" value="<?php  if (!empty($_POST["date_debut"])) {  echo htmlspecialchars($_POST["date_debut"]);  } ?>" /></td>
								</tr>
								<!-- // Date début -->
								<!-- Date fin -->
								<tr>
									<td class="txt_form"><label for="pwd">Fin de la session :</label></td>
								</tr>
								<tr>
									<td><input type="date" class="inpt" name="date_fin" value="<?php  if (!empty($_POST["date_fin"])) {  echo htmlspecialchars($_POST["date_fin"]);  } ?>" /></td>
								</tr>
								<!-- // Date fin -->
								<tr>
									<td><input type="submit" class="btn" name="valid_connect" value="Envoyer" /></td>
								</tr>
								<tr>
									<?php
											if (isset($erreur)){
												echo '<td class="msg_erreur">';
												echo $erreur;
												echo '</td>';
											}
											elseif (isset($_SESSION['msg_valid'])){
												echo '<td class="msg_valid">';
												echo $_SESSION['msg_valid'];
												echo '</td>';
												unset($_SESSION['msg_valid']);
											}
											
										?>
								</tr>
							</table>
						</form>
						
					</div>

					<div class="row row_footer">
							 <div class="visible-md visible-lg col-md-12 col-lg-12 titre_footer_webserie">
									Pour toute information, contactez :
							</div>
							<div class="visible-md visible-lg col-md-12 col-lg-12 footer_webserie">
									<div class="row">
											<div class="col-md-3 col-lg-3"></div>
											<div class="col-md-3 col-lg-3">
													Romain Castany<br/>
													Directeur général délégué<br/>
													Développement commercial<br/>
													01 53 34 92 06<br/>
											</div>
											
											<div class="col-md-3 col-lg-3">
													Pascal Guillery<br/>
													Directeur clientèle<br/><br/>
													01 73 78 17 34
											</div>
											<div class="col-md-3 col-lg-3"></div>
									</div>
							</div>
							
							<div class="visible-sm col-sm-12 titre_footer_webserie">
									Pour toute information, contactez :
							</div>
							<div class="visible-sm col-sm-12 footer_webserie">
									<div class="row">
											<div class="col-sm-4">
													Romain Castany<br/>
													Directeur général délégué<br/>
													Développement commercial<br/>
													01 53 34 92 06<br/>
											</div>
											<div class="col-sm-4"></div>
											<div class="col-sm-4">
													Pascal Guillery<br/>
													Directeur clientèle<br/><br/>
													01 73 78 17 34
											</div>
									</div>
							</div>
							<div class="visible-xs col-xs-12 footer_webserie2">
									<div class="visible-xs col-xs-12 titre_footer_webserie2">
									Pour toute information, contactez :
							</div>
							<div class="visible-xs col-xs-12 footer_webserie2">
									<div class="row">
											<div class="col-xs-6">
													Romain Castany<br/>
													Directeur général délégué<br/>
													Développement commercial<br/>
													01 53 34 92 06<br/>
											</div>
											<div class="col-xs-6">
													Pascal Guillery<br/>
													Directeur clientèle<br/><br/>
													01 73 78 17 34
											</div>
									</div>
							</div>
							</div>
					</div>
			</div>

	</body>
</html>