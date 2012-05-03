<form onsubmit="makeRequest(1); return false;" class="well form-search">
    <input id="searchinput" name="tags" class="input-medium searchlist" value="<?php echo $this->bid->auth['videos']['buscas']['atual']; ?>" type="text" />
    <button type="submit" class="btn" onclick="makeRequest('search',false);return false;"><i class="icon-search"></i>Buscar Vídeos</button>
</form>
<ul id="ul1" class="playlist well"></ul>