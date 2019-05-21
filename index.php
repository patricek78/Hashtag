<?php
if(isset($_POST['valid_connect']))
{
	$pseudo_user=$_POST['pseudo'];
	$mdp_user=$_POST['mdp'];
	
	if($pseudo_user=="h-tag" && $mdp_user=="handicap")
	{
		session_start();
        $_SESSION['login'] = $pseudo_user;
		header('Location:index_video.php');
	}else{
		$message_erreur="Erreur : les identifiants ne correspondent pas";
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
			
		<script type="text/javascript">
				$(function() {
					$(".fancyboxVideo").fancybox({
						padding: 2,
						/*maxWidth	: 1024,
						maxHeight	: 576,
						minWidth	: 1024,
						minHeight   : 576,*/
						scrolling   : 'no',
						fitToView	: false,
						autoSize	: false,
						width	    : '100%',
						height	    : '100%',
						closeClick	: false,
						openEffect  : 'fade',
						closeEffect : 'fade',
						iframe      :
							{
								scrolling : 'no'
							}
						});
				} );
		</script>

	</head>
	<body>
		<?php 
			if(isset($_SESSION['login']))
				{
					echo '<center><div id="player"></div></center>';	
				}else{
			?>
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
									<td class="txt_form"><label for="pseudo">Login : </label></td>
								</tr>
								<tr>
									<td><input type="text" class="inpt" value="" name="pseudo" /></td>
								</tr>
								<tr>
									<td class="txt_form"><label for="mdp">Mot de passe :</label></td>
								</tr>
								<tr>
									<td><input type="password" class="inpt" value="" name="mdp" /></td>
								</tr>
								<tr>
									<td><input type="submit" class="btn" name="valid_connect" value="Se connecter" /></td>
								</tr>
								<tr>
									<td class="msg_erreur">
										<?php
											if(isset($message_erreur)) echo $message_erreur;
											}
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