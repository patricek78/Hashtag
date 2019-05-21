<?php
session_start();
if (!isset($_SESSION['login']))
{
    header ('Location: index.php');
    exit();	
}
?>
<!DOCTYPE html>
<html>
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
                        <div class="row">
                                <div class="col-md-12 content_webserie">
                                        <div class="row episodes">
                                              <div class="col-xs-12 col-sm-6 col-md-6 col_episodes">
                                                <a href="http://wpc.507E.edgecastcdn.net/00507E/video/hashtag/IDEES_RECUES_ST_HD2.mp4" class="rollover_ep1 fancyboxVideo fancybox.iframe"></a>
                                                <span>#Idées reçues</span><br/><span class="soustitre_episode2">(Ce soir-là)</span><br/>
                                                <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                                              </div>
                                              <div class="col-xs-12 col-sm-6 col-md-6 col_episodes">
                                                <a href="http://wpc.507E.edgecastcdn.net/00507E/video/hashtag/RQTH_ST_HD.mp4" class="rollover_ep2 fancyboxVideo fancybox.iframe"></a>
                                                <span>#RQTH</span><br/><span class="soustitre_episode2">(Regards croisés)</span><br/>
                                                <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                                              </div>
                                        </div>
                                        
                                        <div class="row episodes">
                                              <div class="col-sm-6 col_episodes">
                                                <a href="http://wpc.507E.edgecastcdn.net/00507E/video/hashtag/HANDICAP_MOTEUR_ST_HD.mp4" class="rollover_ep3 fancyboxVideo fancybox.iframe"></a>
                                                <span>#Handicap moteur</span><br/><span class="soustitre_episode2">(J’aurais pu me dire)</span><br/>
                                                <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                                              </div>
                                              <div class="col-sm-6 col_episodes">
                                                <a href="http://wpc.507E.edgecastcdn.net/00507E/video/hashtag/Maladies_invalidante_ST_HD.mp4" class="rollover_ep4 fancyboxVideo fancybox.iframe"></a>
                                                <span>#Maladies invalidantes</span><br/><span class="soustitre_episode2">(Statistiquement)</span><br/>
                                                <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                                              </div>
                                        </div>
                                        
                                        <div class="row episodes">
                                              <div class="col-sm-6 col_episodes">
                                                <a href="http://wpc.507E.edgecastcdn.net/00507E/video/hashtag/AIDES_MATERIELLES_ST_HD.mp4" class="rollover_ep5 fancyboxVideo fancybox.iframe"></a>
                                                <span>#Aides matérielles</span><br/><span class="soustitre_episode2">(Soulagé !)</span><br/>
                                                <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                                              </div>
                                              <div class="col-sm-6 col_episodes_txt">
                                                <span class="titre_txt_col">Interneto</span> <span class="txt_col">expert sur le handicap</span><br/>
                                                <b>Interneto accompagne, depuis 2007, plus de 50 missions handicap par an, grands comptes du secteur public ou privé.<br/><br/>
                                                Nous réalisons tout type de prestations :</b><br/>
                                                <ul>
                                                    <li>Portraits métier de collaborateurs en situation de handicap,
                                                    films de présentation de missions handicap</li>
                                                    <li>aptations d’événements internes ou de conférences sur le thème du
                                                    handicap,</li>
                                                    <li>animations motion design orientées sensibilisation/formation
                                                    (ex : Qu’est-ce qu’une RQTH ? Comment se déclarer ? Les
                                                    bénéfices salariés...)</li>
                                                    <li>Recrutement : Handilive Printemps et SEEPH</li>
                                                </ul>
                                              </div>
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
                        </div>
                </div>
        </body>
</html>