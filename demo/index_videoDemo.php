<?php
session_start();
if (!isset($_SESSION['pseudo']))
{
    header ('Location: index.php');
    exit();	
}
else unset($_SESSION['pseudo']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>H-TAG</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="index.css" rel="stylesheet" type="text/css">
        
        <!-- a player skin as usual -->
        <link rel="stylesheet" href="//releases.flowplayer.org/6.0.5/skin/minimalist.css">
        <!-- the quality selector stylesheet -->
        <!--link rel="stylesheet" href="//releases.flowplayer.org/quality-selector/flowplayer.quality-selector.css">
        <!-- Add fancyBox main stylesheet -->
        <link rel="stylesheet" type="text/css" href="js/source/jquery.fancybox.css?v=2.1.4" media="screen">
         
        <!-- ... -->
        <!-- the jQuery library -->
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <!-- the Flowplayer script as usual -->
        <!--script src="//releases.flowplayer.org/6.0.5/flowplayer.min.js"></script-->
        <script src="js/source/flowplayer.js"></script>
        <!-- The hlsjs plugin for playback of HLS without Flash in modern browsers -->
        <!--script src="//releases.flowplayer.org/hlsjs/flowplayer.hlsjs.min.js"></script>
        <!-- the quality selector plugin -->
        <!--script src="//releases.flowplayer.org/quality-selector/flowplayer.quality-selector.min.js"></script>
        <!-- Add fancyBox main JS -->
        <script src="js/source/jquery.fancybox.js?v=2.1.4"></script>
        
        
        <script>
            $(function() {
            var player;
           
                $('.fancybox').fancybox({
                  tpl: {
                    // wrap template with custom inner DIV: the empty player container
                    wrap: '<div class="fancybox-wrap" tabIndex="-1">' +
                          '<div class="fancybox-skin">' +
                          '<div class="fancybox-outer">' +
                          '<div id="player">' + // player container replaces fancybox-inner
                          '</div></div></div></div>' 
                  },
               
                  beforeShow: function () {
                    var base = this.href.slice(1),
                        cdn = "//wpc.507E.edgecastcdn.net/00507E/video/hashtag/";
               
                    // install player into empty container
                    player = flowplayer("#player", {
                      autoplay: true,
                      ratio: 9/16,
                      qualities: "216p,360p,720p,1080p",
                      defaultQuality: "360p",
                      rtmp: "rtmp://s3b78u0kbtx79q.cloudfront.net/cfx/st",
                      clip: {
                        autoplay: true,
                        sources: [
                            { type: "video/mp4",             src: cdn + base + ".mp4" },
                            { type: "application/x-mpegurl", src: cdn + base + ".m3u8" },
                            { type: "video/webm",            src: cdn + base + ".webm" },
                            { type: "video/flash",           src: "mp4:" + base }
                        ]
                      }
                    });
               
                  },
                  beforeClose: function () {
                    // important! shut down the player as fancybox removes container
                    player.shutdown();
                  }
                });
           
            });
        </script>
                       <style>
                        /* flexible width for the fancybox wrapper */

.fp-quality-selector{
    display: none!important;
}
.fp-embed{
    display: none!important;
}
.fp-brand{
    display: none!important;
}
.fp-close{
    display: none!important;
}
.fp-fullscreen{
    display: none!important;
}
.fancybox-wrap {/*TAILLE DU PLAYER*/
  width: 40% !important;
}

 
ul.boxes {
  color: #777;
  list-style: none;
  font-size: 18px;
  width: 7em;
  margin-left: 7em;
}
ul.boxes li {
  cursor: pointer;
  background: url(//d12zt1n3pd4xhr.cloudfront.net/fp/img/fp5arrow.png) 0 2px no-repeat;
  padding-left: 24px;
  margin: 0.5ex 0;
}
ul.boxes li:hover {
  color: #111;
}
                    </style>         
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
                            <a href="#IDEES_RECUES_ST_HD2" class="rollover_ep1 fancybox"></a>
                        
                            <span>#Idées reçues</span><br/><span class="soustitre_episode2">(Ce soir-là)</span><br/>
                            <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                            
                            <!--iframe height='252' scrolling='no' src='http://wpc.507E.edgecastcdn.net/00507E/video/hashtag/IDEES_RECUES_ST_HD.mp4' frameborder='no' allowtransparency='true' style='margin: auto;'></iframe-->
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6 col_episodes">
                            <a href="#RQTH_ST_HD" class="rollover_ep2 fancybox"></a>
                            <span>#RQTH</span><br/><span class="soustitre_episode2">(Regards croisés)</span><br/>
                            <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                        </div>
                    </div>
                                        
                    <div class="row episodes">
                        <div class="col-sm-6 col_episodes">
                            <a href="#HANDICAP_MOTEUR_ST_HD" class="rollover_ep3 fancybox"></a>
                            <span>#Handicap moteur</span><br/><span class="soustitre_episode2">(J’aurais pu me dire)</span><br/>
                            <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                        </div>
                        <div class="col-sm-6 col_episodes">
                            <a href="#Maladies_invalidante_ST_HD" class="rollover_ep4 fancybox"></a>
                            <span>#Maladies invalidantes</span><br/><span class="soustitre_episode2">(Statistiquement)</span><br/>
                            <img src="img/tiret_bleu.jpg" class="tiret_bleu">
                        </div>
                    </div>
                                        
                    <div class="row episodes">
                        <div class="col-sm-6 col_episodes">
                            <a href="#AIDES_MATERIELLES_ST_HD" class="rollover_ep5 fancybox"></a>
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