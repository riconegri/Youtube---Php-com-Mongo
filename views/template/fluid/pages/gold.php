<?php
$visuados = $this->bid->auth['videos']['ultimo_visualizado'];
?>
<div class="well">
    <ul id="ul2">
        <li>
            <object width="100%" height="480" type="application/x-shockwave-flash" id="playerid" 
                    data="http://www.youtube.com/v/<?php echo $visuados ? $visuados : 'BBPU-fy_zdM' ?>?fs=1&amp;playerapiid=playerid&amp;enablejsapi=1&amp;rel=0">
                <param name="wmode" value="transparent">
                <param name="AllowScriptAccess" value="always">
                <param name="allowfullscreen" value="true">
            </object>
        </li>
        <script type="text/javascript">
            var flashvars = {};
            var params = {};
            params.wmode = "transparent";
            params.AllowScriptAccess = "always";
            params.allowfullscreen = "true";
            var attributes = { id: "playerid" };
            swfobject.embedSWF("http://www.youtube.com/v/<?php echo $visuados ?>?fs=1&playerapiid=playerid&enablejsapi=1&rel=0", "ytapiplayer","320", "240", "8", "false", flashvars, params, attributes);
        </script> 
        <p>
            Clique e arraste os vídeos que deseja assistir para este bloco.
        </p>
        <!-- AddThis Button END -->
        <div style="float:right" id="twitter_button">
            <a href="http://twitter.com/share" data-url="http://www.youtube.com/watch?v=BBPU-fy_zdM&feature=g-all-pls" data-text="Que vídeo maneiro!" class="twitter-share-button">Tweet</a>
            <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
        </div>
        <p>Para criar uma playlist de vídeos, arraste os vídeos para o bloco abaixo</p>
    </ul>
</div>