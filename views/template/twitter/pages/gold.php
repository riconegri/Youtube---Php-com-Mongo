<div class="row">
    <div class="span8">
        <form onsubmit="makeRequest(1); return false;" class="well form-search">
            <input id="searchinput" name="tags" class="input-xlarge searchlist offset1" value="" type="text" />
            <button type="submit" class="btn" onclick="makeRequest(1)"><i class="icon-search"></i>Buscar Vídeos</button>
        </form>
        <h2>Resultados da Busca</h2>
        <ul id="ul1" class="playlist well"></ul>
    </div>
    <div class="span4">
        <h2>Player</h2>
        <ul id="ul2" class="draglist well">
            <li>
                <object width="290" height="221" type="application/x-shockwave-flash" id="playerid" 
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
            <div style="float:right" id="twitter_button">
                <a href="http://twitter.com/share" data-url="http://www.youtube.com/watch?v=BBPU-fy_zdM&feature=g-all-pls" data-text="Que vídeo maneiro!" class="twitter-share-button">Tweet</a>
                <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
            </div>
            <p>
                Clique e arraste os vídeos que deseja assistir para este bloco.
            </p>
            <p>Para criar uma playlist de vídeos, arraste os vídeos para o bloco abaixo</p>
        </ul>
    </div>
    <div class="span4">
        <h4>Playlist - Arraste e solte os vídeos neste bloco<a href="javascript:clearPlaylist('playlist');" style="font-size: 75%;">Limpar playlist</a></h4>
        <div class="well">
            <ul id="ul3" class="playlistBottom"></ul>
        </div>
    </div>
</div>

<hr>

<footer>
    <p>&copy; Company 2012</p>
</footer>