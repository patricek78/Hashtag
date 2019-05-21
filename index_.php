<?php
include("inc/conf.php");//connexion à la base de données

if (isset($_POST['valid_connect']) && $_POST['valid_connect'] == 'Se connecter') {
    //On verifie si le formulaire a ete envoye
	if(isset($_POST['pseudo'], $_POST['mdp'])){
		//session_start();
		$username = mysql_real_escape_string($_POST['pseudo']);
		$password = md5($_POST['mdp']);
		//On recupere le mot de passe de lutilisateur
		$req = mysql_query('SELECT password,id FROM user WHERE login="'.$username.'"');
		$dn = mysql_fetch_array($req);
		//On le compare a celui quil a entre et on verifie si le membre existe
		if($dn['password']==$password and mysql_num_rows($req)>0)
		{
			//Si login/mot de passe OK
			//On enregistre le pseudo dans la session username et son identifiant dans la session userid
			session_start();
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['userid'] = $dn['id'];
			
			//Requête SQL pour vérif de la date de validité du compte
			$sql = 'SELECT date_debut, date_fin FROM user WHERE login="'.$username.'"';
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$data = mysql_fetch_assoc($req);
			$sql_datedebut = $data['date_debut'];
			$sql_datefin = $data['date_fin'];
			$date_jours = date("Y-m-d");
			
			//si date du jours supérieur à date_debut ET date du jours inférieure à date_fin
			//on est dans l'intervalle de validité
			if(strtotime($date_jours) > strtotime($sql_datedebut) && strtotime($date_jours) < strtotime($sql_datefin)){
					header('Location: index_videoDemo.php');
			}else{
				if(strtotime($date_jours) < strtotime($sql_datedebut)){
					$message_erreur = 'Votre compte n\'est pas encore actif (actif à partir du '.date("d/m/Y", strtotime($sql_datedebut)).')';
				}elseif(strtotime($date_jours) > strtotime($sql_datefin)){
					$message_erreur = 'Votre compte est désactivé (depuis le '.date("d/m/Y", strtotime($sql_datefin)).')';
				}
			}	
		}
		else
		{
			//Sinon, on indique que la combinaison nest pas bonne
			$message_erreur = 'Login ou mot de passe incorrect.';
		}
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
		<link href="index.css" rel="stylesheet" type="text/css">
		
		<link type="text/css" rel="stylesheet" href="js/jquery.fancybox.css" media="screen" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>	
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
						   <span>La première web-série animée sur le handicap</span> 
					</div>
					 <div class="visible-sm col-sm-12 titre_webserie">
							<span>La première web-série animée sur le handicap</span>
					</div>
					 <div class="visible-xs col-xs-12 titre_webserie">
							<span>La première web-série animée<br/>sur le handicap</span>
					</div>
			</div>
		</div>
			
		<div class="section section_content">
			<div class="row row_password">
				<form name="form_connect" method="post" action="">
					<table id="table_connect" cellpadding="5">
						<tr>
							<td height="80" valign="top" align="center" class="titre_form">Connectez-vous pour accéder à la page</td>
						</tr>
						<tr>
							<td class="txt_form"><label for="pseudo">Login : </label></td>
						</tr>
						<tr>
							<td><input type="text" class="inpt" name="pseudo" value="<?php  if (!empty($_POST["pseudo"])) {  echo htmlspecialchars($_POST["pseudo"],ENT_QUOTES);  }; ?>" /></td>
						</tr>
						<tr>
							<td class="txt_form"><label for="mdp">Mot de passe :</label></td>
						</tr>
						<tr>
							<td><input type="password" class="inpt" value="" name="mdp" /></td>
						</tr>
						<tr>
							<td height="75" valign="bottom"><input type="submit" class="btn" name="valid_connect" value="Se connecter" /></td>
						</tr>
						<tr>
							<td class="msg_erreur">
								<?php
									if(isset($message_erreur)) echo $message_erreur;
								?>
							</td>
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