<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <?php echo App::css($this->css('bootstrap')); ?>
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
        <link href="<?php $this->css('app'); ?>" rel="stylesheet" />
        <script src="<?php $this->js('swfobject') ?>"></script>
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link href="<?php $this->css('bootstrap-responsive'); ?>" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php $this->js('jquery'); ?>/ico/favicon.ico" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php $this->js('jquery'); ?>/ico/apple-touch-icon-144-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php $this->js('jquery'); ?>/ico/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php $this->js('jquery'); ?>/ico/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="<?php $this->js('jquery'); ?>/ico/apple-touch-icon-57-precomposed.png" />
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <?php $this->block('menu_topo'); ?>
        </div>

        <div class="container">
            <?php echo $this->view_html; ?>
        </div>
        <!-- /container -->
        <?php echo TwitterBootstrap::js($this->js); ?>
        <?php echo App::js($this->js('yahoo-dom-event')); ?>
        <?php echo App::js($this->js('animation-min')); ?>
        <?php echo App::js($this->js('dragdrop-min')); ?>
        <?php echo App::js($this->js('yahoo-dom-event')); ?>
        <?php echo App::js($this->js('app')); ?>
        <script>
            $(document).ready(function(){
                $.('a.twitter-share-button').each(function()
                {
                    var tweet_button = new twttr.TweetButton( $( this ).get( 0 ) );
                    tweet_button.render();
                });
            });
        </script>
    </body>
</html>