<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Teste para Interage">
        <meta name="author" content="Ricardo Negri"/>

        <!-- CSS -->
        <link href="<?php $this->css('bootstrap'); ?>" rel="stylesheet" />
        <script type="text/javascript">
            Path = {
                base:'<?php echo $this->base_path ?>',
                css:'<?php echo $this->css ?>', 
                js:'<?php echo $this->js ?>',
                app:'<?php echo $this->base_path . 'youtube/' ?>',
                page:'<?php echo $this->base_path . 'youtube/' . $this->page ?>'
            }
        </script>
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
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Youtube - Twitter</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li><a href="javascript:mostViewed()">Mais Visualizados</a></li>
                            <li><a href="javascript:mostLinked()">Mais Linkados</a></li>
                            <li><a href="javascript:getHot()">Melhores</a></li>
                            <li>
                            <?php if(!isset($this->bid->auth['email'])):?>
                                <button><img src="https://browserid.org/i/sign_in_green.png" alt="sign in with browser ID"></button>
                            <?php else:?>
                                <a href="#" onclick="return false;">Olá <?php echo $this->bid->auth['email'];?></a>
                            <?php endif ?>
                            </li>
                            <?php if(isset($this->bid->auth['email'])):?>
                            <li><a onclick="logout();return false;" href="#">Logout</a></li>
                            <?php endif ?>
                            <li class="info_bid"></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <?php echo $this->view_html; ?>
        </div>
        <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php $this->js('jquery'); ?>"></script>
        <script src="<?php $this->js('bootstrap-transition'); ?>"></script>
        <script src="<?php $this->js('bootstrap-alert'); ?>"></script>
        <script src="<?php $this->js('bootstrap-modal'); ?>"></script>
        <script src="<?php $this->js('bootstrap-dropdown'); ?>"></script>
        <script src="<?php $this->js('bootstrap-scrollspy'); ?>"></script>
        <script src="<?php $this->js('bootstrap-tab'); ?>"></script>
        <script src="<?php $this->js('bootstrap-tooltip'); ?>"></script>
        <script src="<?php $this->js('bootstrap-popover'); ?>"></script>
        <script src="<?php $this->js('bootstrap-button'); ?>"></script>
        <script src="<?php $this->js('bootstrap-collapse'); ?>"></script>
        <script src="<?php $this->js('bootstrap-carousel'); ?>"></script>
        <script src="<?php $this->js('bootstrap-typeahead'); ?>"></script>
        <script src="<?php $this->js('yahoo-dom-event') ?>"></script>
        <script src="<?php $this->js('animation-min') ?>"></script>
        <script src="<?php $this->js('dragdrop-min') ?>"></script>
        <script src="https://browserid.org/include.js"></script>
        <script src="<?php $this->js('app') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var button = $('.nav li button'),
                    infos = $('.info_bid');
                button.click(function() {
                    navigator.id.getVerifiedEmail(function(assertion) {
                        if (assertion) {
                            login(assertion,button,infos);
                        } else {
                            alert('I still don\'t know you...');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
