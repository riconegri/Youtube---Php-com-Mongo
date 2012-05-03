<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Youtube</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <?php echo App::css($this->css('bootstrap')); ?>
        <?php echo App::css($this->css('bootstrap-responsive')); ?>
        <?php echo App::css($this->css('app')); ?>
        <script type="text/javascript">
            Path = {
                base:'<?php echo $this->base_path ?>',
                css:'<?php echo $this->css ?>', 
                js:'<?php echo $this->js ?>',
                app:'<?php echo $this->base_path . 'youtube/' ?>',
                page:'<?php echo $this->base_path . 'youtube/' . $this->page ?>'
            }
        </script>
        <?php echo Auth::loginJs(); ?>
        <?php echo App::js($this->js('swfobject')) ?>
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>

        <div class="navbar navbar-fixed-top">
            <?php $this->block('menu_topo'); ?>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <?php $this->block('menu_lateral'); ?>
                </div>
                <div class="span7">
                    <?php echo $this->view_html; ?>
                    <?php $this->block('playlist'); ?>
                </div>
                <div class="span3">
                    <?php $this->block('search_video'); ?>
                </div>
            </div>
        </div>
        <?php echo TwitterBootstrap::js($this->js); ?>
        <?php echo App::js($this->js('yahoo-dom-event')); ?>
        <?php echo App::js($this->js('animation-min')); ?>
        <?php echo App::js($this->js('dragdrop-min')); ?>
        <?php echo App::js($this->js('app')); ?>
        <?php echo App::js($this->js('rpc')); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                if(question.val()){
                    clearList('ul1');
                    makeRequest('search',question.val())
                    createPlaylist(); 
                }else{
                    getHot();
                }
                $.('a.twitter-share-button').each(function()
                {
                    var tweet_button = new twttr.TweetButton( $( this ).get( 0 ) );
                    tweet_button.render();
                });
            });
        </script>
        <hr>
        <footer class="row-fluid">
            <p>&copy; Interage Teste</p>
        </footer>
        <?php //pr($this->bid->auth, false); ?>
    </body>
</html>