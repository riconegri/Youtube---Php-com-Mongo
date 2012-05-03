<div style="width: 840px; text-align:left; display: block; ">
    <div id="top">
        <h1 style="float: right">Ver e Compartilhar</h1>
        <div style="float: left">
            <h3>Buscar vídeos no Youtube</h3>
            <form onsubmit="makeRequest(1); return false;" style="margin: 2px; padding: 2px; font-size: 1.2em;">
                <input id="searchinput" name="tags" style="width: 280px;" value="" type="text">
                <input id="searchbutton" onclick="makeRequest(1);" value="Buscar vídeos" type="button">
            </form>
        </div>
    </div>
    <div style="width: 490px; float: left; clear: left;">
        <h4>Resultados da Busca | <a href="javascript:mostViewed()">Mais Visualizados</a></h4>
        <ul id="ul1" class="playlist"></ul>
    </div>
    <div style="width: 330px; float: right;">
        <h4>Drag&amp;Drop Player</h4>
        <ul id="ul2" class="draglist">
            <li>
                <object width="320" height="240" type="application/x-shockwave-flash" id="playerid" 
                        data="http://www.youtube.com/v/pRpeEdMmmQ0?fs=1&amp;playerapiid=playerid&amp;enablejsapi=1&amp;rel=0">
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

                swfobject.embedSWF(
                "http://www.youtube.com/v/pRpeEdMmmQ0?fs=1&playerapiid=playerid&enablejsapi=1&rel=0", 
                "ytapiplayer",
                "320", "240", "8", "false", flashvars, params, attributes
            );
            </script> 
            <p>
                Clique e arraste os vídeos que deseja assistir para este bloco.
            </p>
            <p>Para criar uma playlist de vídeos, arraste os vídeos para o bloco abaixo</p>
        </ul>
        <h4>Drag&amp;Drop Playlist - <a href="javascript:clearPlaylist('playlist');" style="font-size: 75%;">Limpar playlist</a></h4>
        <ul id="ul3" class="playlistBottom">
        </ul>
    </div>
</div>
<script type="text/javascript">
    //new YAHOO.util.DD("video");
</script>