<?php

define('DRIPS_STARTUP', __DIR__.'/vendor/drips/drips/index.php');
define('IS_INSTALLED', is_dir(__DIR__.'/vendor') && file_exists(__DIR__.'/composer.lock'));

chdir(__DIR__);

$permissions = false;
if(is_writable(__DIR__)){
    $permissions = true;
}

if(getenv('COMPOSER_HOME') === false && getenv('HOME') === false){
    putenv('COMPOSER_HOME='.__DIR__.'/.composer');
}

if (!IS_INSTALLED) {
    if (!isset($_GET['install'])) {
        $htaccess = __DIR__.'/.htaccess';
        if(file_exists($htaccess) && $permissions){
            unlink($htaccess);
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        	<meta charset="utf-8">
        	<meta name="viewport" content="width=device-width, initial-scale=1">
        	<title>Willkommen bei Drips | Installation</title>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/github-gist.min.css"/>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" charset="utf-8">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css">
            <script type="text/javascript">
                $(document).ready(function () {
                    $('pre code').each(function (i, block) {
                        hljs.highlightBlock(block);
                    });
                });
            </script>
        	<style type="text/css">
                @import url(https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700);
                body {
                	margin:0;
                	padding:0;
                	font-size: 18px;
                	font-family: 'Maven Pro', sans-serif;
                }
                #page-header{
                	background-color:#434a54;
                	color:white;
                	min-height:250px;
                }
                .header_img{
                	padding-top:12px;
                }
                h1{
                	text-align:center;
                }
                hr{
                	width: 80px;
                    border: none;
                    border-top: 3px solid #A0D468;
                }
                section {
                	padding-top: 20px;
                }
                section, .header_img {
                    width: 70%;
                    margin: auto;
                }
                section p, section li{
                	color:#717F8C;
                }
                a {
                	color:#A0D468;
                	text-decoration: none;
                }
                a:hover {
                	text-decoration: underline;
                	color: #8CC152;
                }
                .button {
                	background-color: #A0D468;
                	color: #FFF;
                	display: inline-block;
                	padding: 10px 25px;
                	text-decoration: none !important;
                	margin-bottom: 50px;
                	transition: all 0.2s;
                }
                .button:hover {
                	background-color: #8CC152;
                	color: white;
                }
                h2 {
                	color: #A0D468;
                }
                h3 {
                	margin-top: 30px;
                	margin-bottom: -10px;
                	color: #434A54;
                }
                p > code, h2 > co {
                	color: #DA4453;
                }
                pre > code {
                	border: 1px solid #E6E9ED;
                	border-radius: 3px;
                	background-color: #F5F7FA !important;
                }
                code {
                	font-size: 16px;
                }
                cite {
                	color: #AAB2BD;
                	border-left: 5px solid #E6E9ED;
                	padding-left: 15px;
                	font-style: normal;
                	display: block;
                	margin-top: 5px;
                	margin-bottom: 20px;
                }
                @media (max-width: 992px){
                	section, .header_img{
                		width:80%;
                	}
                }
                @media (max-width: 350px){
                	header{
                		height:300px;
                	}
                }
                #drips-error, .error {
                    color: #DA4453;
                }

                #drips-success {
                    color: #A0D468;
                }

                #drips-error, #drips-success {
                    font-size: 22px;
                }

                td {
                    color: #717F8C;
                }

                .color-change {
                    transition: color 1s;
                }

                li {
                    margin-bottom: 10px;
                    list-style-type: none;
                }
                li > label > p {
                    margin: 0;
                    padding: 0;
                    text-indent: 22px;
                }
				#systemvariable li{
					list-style-type: decimal;
				}
				#systemvariable pre{
					display:inline;
				}

                small {
                    text-align: center;
                }
                .morphext > .animated {
                    display: inline-block;
                }
        	</style>
            <script>
                /*! Morphext - v2.4.5 - 2015-08-26 */!function(a){"use strict";function b(b,c){this.element=a(b),this.settings=a.extend({},d,c),this._defaults=d,this._init()}var c="Morphext",d={animation:"bounceIn",separator:",",speed:2e3,complete:a.noop};b.prototype={_init:function(){var b=this;this.phrases=[],this.element.addClass("morphext"),a.each(this.element.text().split(this.settings.separator),function(c,d){b.phrases.push(a.trim(d))}),this.index=-1,this.animate(),this.start()},animate:function(){this.index=++this.index%this.phrases.length,this.element[0].innerHTML='<span class="animated '+this.settings.animation+'">'+this.phrases[this.index]+"</span>",a.isFunction(this.settings.complete)&&this.settings.complete.call(this)},start:function(){var a=this;this._interval=setInterval(function(){a.animate()},this.settings.speed)},stop:function(){this._interval=clearInterval(this._interval)}},a.fn[c]=function(d){return this.each(function(){a.data(this,"plugin_"+c)||a.data(this,"plugin_"+c,new b(this,d))})}}(jQuery);
            </script>
        </head>
        <body>
        	<header id="page-header">
        		<div class="header_img">
        			<img src="data:image/png;base64,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" height="60" alt="Drips Logo"></img>
        		</div>
        		<h1>Willkommen bei Drips</h1>
        		<hr/>
        	</header>
        	<section id="content">
                <h2>Schön dass du dich für Drips entschieden hast.</h2>
                <p>
                    Damit Drips ordnungsgemäß funktioniert, ist ein Installationsvorgang nötig. Klicke auf den Button um den Installationsvorgang zu starten.
                </p>
                <cite>
                    Auch wenn du Drips bereits installiert hast, kann es sein, dass einige Abhängigkeiten fehlen - diese werden einfach nachinstalliert. Deine bestehenden Daten bleiben natürlich erhalten.</p>
                </cite>

                <?php if (strncasecmp(PHP_OS, 'WIN', 3) == 0 && stripos(getenv('PATH'), 'php') === false): ?>
                    <div class="error"><strong>Achtung:</strong> Damit Drips auch unter Windows funktioniert, muss eine Umgebungsvariable gesetzt werden.</div>
					<p>Gehe dazu wie folgt vor:</p>
					<ol id="systemvariable">
						<li>Öffne die Systemsteuerung</li>
						<li>System und Sicherheit / System / Erweiterte Systemeinstellungen / Umgebungsvariablen</li>
						<li>Wähle unter Systemvariablen bearbeiten <pre>Path</pre> aus</li>
						<li>Öffne den Explorer und kopiere den Pfad zum Verzeichnis in dem sich die <pre>php.exe</pre> befindet</li>
						<li>Mit einem Klick auf 'Neu' kannst du den Dateipfad einfügen</li>
						<li>Bevor du die Installation starten kannst, musst du deinen Computer neustarten, dass die Änderungen in Kraft treten</li>
					</ol>
                    <br>
                    <a href="./" class="button">Weiter <i class="fa fa-arrow-right"></i></a>
                <?php else: ?>
                    <div style="text-align:center">
                        <p id="drips-error" style="display: none;"><i class="fa fa-times"></i> Drips konnte nicht installiert werden!</p>
                        <div id="loading" style="display: none;">
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw color-change" style="color: #717F8C;"></i>
                            <p><span id="status-text">Drips wird installiert ..., Abhängigkeiten werden heruntergeladen ..., Abhängigkeiten werden installiert ..., Abhängigkeiten werden aktualisiert ..., Nach Aktualisierungen suchen ..., Updates installieren ..., Installation abschließen ...</span><br><br>
                                <small>
                                    Der Installationsprozess, kann abhängig von deiner Internetverbindung mehrere Minuten in Anspruch nehmen - wir bitten um Geduld.
                                </small>
                            </p>
                        </div>
                        <div style="font-size: 14px; text-align: left;" id="envsel">
                            <h3>Umgebung wählen</h3>
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="env" value="dev" checked="checked">
                                        <strong>Development</strong>
                                        <p>Drips wird im Debug-Modus installiert - sämtlich Fehlermeldungen und Debugging-Informationen werden angezeigt.</p>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="env" value="prod">
                                        <strong>Production</strong>
                                        <p>Drips deaktiviert Fehlermeldungen und aktiviert spezielle Sicherheitsmechanismen für den Produktivbetrieb.</p>
                                    </label>
                                </li>
                            </ul>
                            <p>Die Umgebung kann jederzeit während dem Betrieb geändert werden.</p>
                        </div>
                        <br>
                        <?php if($permissions): ?>
                            <a href="#" class="button" id="installBtn">Installation starten <i class="fa fa-arrow-right"></i></a>
                        <?php else: ?>
                            <div style="text-align: left;">
                                <p class="error">Drips verfügt nicht über ausreichend Berechtigungen um die Installation durchführen zu können. Passe deine Berechtigungen bitte wie folgt an:</p>
                                <pre><code>chmod -R 0777 .</code></pre>
                            </div>
                            <a href="./" class="button">Weiter <i class="fa fa-arrow-right"></i></a>
                        <?php endif; ?>
                        <p id="drips-success" style="display: none;"><i class="fa fa-check"></i> Drips wurde erfolgreich installiert!</p>
                        <a href="./" class="button" id="continueBtn" style="display: none;"><i class="fa fa-check"></i> Installation abschließen</a>
                        <div id="install-failed" style="display: none;text-align: left;">
                            <cite>
                                Wenn Drips mithilfe dieses Installers nicht installiert werden kann, kannst du versuchen es manuell zu installieren. Hierfür musst du folgendes Kommando auf der Kommandozeile ausführen:
                            </cite>
                            <pre><code>php drips install</code></pre>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var colors = ['#FFCE54', '#F6BB42', '#FC6E41', '#E9573F', '#ED5565', '#DA4453', '#EC87C0', '#D770AD', '#AC92EC', '#967ADC', '#4A89DC', '#5D9CEC', '#3BAFDA', '#4FC1E9', '#37BC9B', '#48CFAD', '#A0D468', '#8CC152'];
                        var current_color = 0;

                        $("#installBtn").click(function(e){
                            e.preventDefault();
                            $("#drips-error").hide();
                            $("#install-failed").hide();
                            $(this).hide();
                            $("#envsel").hide();
                            $("#loading").show();
                            current_text = 0;
                            setInterval(function(){
                                $('.color-change').css('color', colors[current_color]);
                                if((current_color + 1) < colors.length){
                                    current_color++;
                                } else {
                                    current_color = 0;
                                }
                            }, 1500);
                            $('#status-text').Morphext({
                                animation: "fadeInRight",
                                speed: 10000,
                            });
                            var url = '?install';
                            if($('input[value="prod"]').is(':checked')){
                                url += '&prod';
                            }
                            $.get(url, function(result){
                                $("#loading").hide();
                                if(result == 1){
                                    $("#drips-success").show();
                                    $("#continueBtn").show();
                                } else {
                                    $("#drips-error").show();
                                    $("#install-failed").show();
                                    $("#installBtn").show();
                                    $("#envsel").show();
                                }
                                $("html, body").animate({ scrollTop: $(document).height() - $(window).height() }, 'slow');
                            });
                        });
                    </script>
                <?php endif; ?>
                <br>
            </section>
        </body>
        </html>
        <?php

    } else {
        $output = "Systeminfo:\n";
        foreach($_SERVER as $key => $val){
            if(is_string($val)){
                $output .= "$key => $val\n";
            }
        }

        $output .= "\n\nInstallation:\n";
        $output .= shell_exec('php drips install 2>&1');
        if (isset($_GET['prod'])) {
            $output .= "\nProduction:\n";
            $output .= shell_exec('php drips env prod 2>&1');
        }
        $installed = is_dir(__DIR__.'/vendor') && file_exists(__DIR__.'/composer.lock');

        if($installed){
            $output .= "\n\nInstallation successfully completed!";
        } else {
            $output .= "\n\nInstallation failed!";
        }

        $dir = __DIR__.'/logs';
        $file = 'install.log';
        if(!is_dir($dir)){
            @mkdir($dir);
        }
        @file_put_contents($dir.'/'.$file, $output);

        echo (int)$installed;
    }
} else {
    if (!defined('DRIPS_DIRECTORY')) {
        define('DRIPS_DIRECTORY', __DIR__);
    }
    if (!include(DRIPS_STARTUP)) {
        die('Die Drips-Installation ist fehlgeschlagen!');
    }
}
