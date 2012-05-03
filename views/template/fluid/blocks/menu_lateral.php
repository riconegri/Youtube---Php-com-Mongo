<?php
$visualizados = isset($this->bid->auth['videos']['visualizados'])
    ? $this->bid->auth['videos']['visualizados'] : array();
?>
<div class="well sidebar-nav">
    <h3 style="margin-left: 15px;">Atividades</h3>
    <ul class="nav nav-list">
        <li class="nav-header">Filtro atual:
            <span id="videos_buscas_atual" class="label label-info">
                <?php echo $this->bid->auth['videos']['buscas']['atual']; ?>
            </span>
        </li>
        <li  class="nav-header" onclick="$(this).next().toggle('slow')">Últimos visualizados</li>
        <li>
            <div class="accordion-inner" id="visualizados">
                <ul id="ul4">
                    <?php foreach ($visualizados as $id => $video) :?>
                        <li id="<?php echo $id ?>">
                            <a title="<?php echo $video['title'];?>" href="javascript:playVideo('<?php echo $id ?>',false,'$video['title']',true)">
                                <img onmouseover="mousOverImage(this,'<?php echo $id ?>',1)" 
                                     onmouseout="mouseOutImage(this)" src="http://img.youtube.com/vi/<?php echo $id ?>/2.jpg" 
                                     style="border: 3px solid rgb(51, 51, 51);">
                            </a>
                            <br>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </li> 

        <li  class="nav-header" style="clear: both;" onclick="$(this).next().toggle('slow')">Termos pesquisados</li>
        <li>
            <div class="accordion-inner" id="termos_search">
                <?php
                foreach ($this->bid->auth['videos']['buscas']['keywords'] as $keyword) :
                    if ($keyword == $this->bid->auth['videos']['buscas'])
                        continue;
                    ?>
                    <a href="javascript:makeRequest('search','<?php echo $keyword; ?>')" class="label label-success"><?php echo $keyword; ?></a>
                <?php endforeach; ?>
            </div>
        </li>


    </ul>
</div>