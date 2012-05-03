<?php

class Schemas {

    /**
     * modelo de dados do usuario
     */
    public function user() {
        return array(
            'videos' => array(
                'contador' => 0,
                'visualizados' => array(),
                'compartilhados' => array(),
                'buscas' => array(
                    'keywords' => array(),
                    'users' => array()
                )
            ),
            'email' => false,
            'photo' => false,
            'providerName' => false,
            'identifier' => false,
            'verifiedEmail' => false,
            'preferredUsername' => false,
            'displayName' => false,
            'email' => false,
            'name' => array
                (
                'formatted' => false,
                'givenName' => false,
                'familyName' => false
            ),
            'url' => false,
            'photo' => false,
            'utcOffset' => false,
            'gender' => false
        );
    }

}

?>