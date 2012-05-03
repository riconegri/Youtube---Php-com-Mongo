<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Mais visualizados do Mês - YouTube - Busque e compartilhe vídeos no Twitter</title>
        <meta name="keywords" content="youtube video search twitter compartilhar buscar">
        <meta name="description" content="Buscar, visualizar vídeos do Youtube, compartilhando pelo Twitter" />
        <?php echo App::css($this->css('style')) ?>
        <?php echo App::css($this->css('fonts-min')) ?>
        <?php echo App::js($this->js('swfobject')) ?>
        <!--link rel="shortcut icon" type="image/x-icon" href="favicon.ico>"-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <style media="screen" type="text/css">#ytapiplayer {visibility:hidden}</style>
    </head>
    <body style="width: 840px;">
        <?php echo $this->view_html ?>
        <!-- start js -->
        <?php echo App::js($this->js('yahoo-dom-event')) ?>
        <?php echo App::js($this->js('animation-min')) ?>
        <?php echo App::js($this->js('dragdrop-min')) ?>
        <?php echo App::js($this->js('app')) ?>
        <!-- end js -->
    </body>
</html>