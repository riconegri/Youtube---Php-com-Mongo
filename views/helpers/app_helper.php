<?php

/**
 * @author Ricardo Negri
 * helpers html para layouts e views
 * somente metodos estaticos
 */

/**
 * Class used for manipulation of arrays.
 *
 * @package       Cake.Utility
 */
class Auth {

    public function loginJs() {
        return "
        <script type=\"text/javascript\">
         (function() {
            if (typeof window.janrain !== 'object') window.janrain = {};
                if (typeof window.janrain.settings !== 'object') window.janrain.settings = {};
                janrain.settings.tokenUrl = Path.page;
                function isReady() { janrain.ready = true; };
                if (document.addEventListener) {
                    document.addEventListener('DOMContentLoaded', isReady, false);
                } else {
                    window.attachEvent('onload', isReady);
                }

                var e = document.createElement('script');
                e.type = 'text/javascript';
                e.id = 'janrainAuthWidget';

                if (document.location.protocol === 'https:') {
                    e.src = 'https://rpxnow.com/js/lib/youv/engage.js';
                } else {
                    e.src = 'http://widget-cdn.rpxnow.com/js/lib/youv/engage.js';
                }

                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(e, s);
            })();   
            </script>
";
    }

}

/**
 * Classe para manusear html do BrowserId - autenticacao 
 */
class BrowserId {

    /**
     *
     * @return string - bloco de js do layout
     */
    public function bidJs() {
        return "
            <script type='text/javascript'>
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
        </script>";
    }

}

class App {

    public function js($file = false) {
        if (!$file)
            return false;
        return '
        <script src="' . $file . '" type="text/javascript"></script>';
    }
    
    public function ready($code = false) {
        if (!$code)
            return false;
        return App::readyOpen().App::readyContent($code).App::readyClose();
    }
    
    public function readyContent($code){
        return $code;
    }
    
    public function readyOpen(){
        return '
        <script type="text/javascript">
                ';
    }

    public function readyClose(){
        return '
        </script>';
    }

    public function css($file = false) {
        if (!$file)
            return false;
        return '
        <link href="' . $file . '" rel="stylesheet" />';
    }

}

class TwitterBootstrap {

    public function js($template_path = false) {
        if (!$template_path)
            return false;
        $tb = array(
            "jquery.js",
            "bootstrap-transition.js",
            "bootstrap-alert.js",
            "bootstrap-modal.js",
            "bootstrap-dropdown.js",
            "bootstrap-scrollspy.js",
            "bootstrap-tab.js",
            "bootstrap-tooltip.js",
            "bootstrap-popover.js",
            "bootstrap-button.js",
            "bootstrap-collapse.js",
            "bootstrap-carousel.js",
            "bootstrap-typeahead.js"
        );
        foreach ($tb as $path) {
            $js[] = App::js($template_path . $path);
        }
        return implode('', $js);
    }

}

class Youtube {
    
}
