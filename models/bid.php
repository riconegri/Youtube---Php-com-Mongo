<?php

class bid {

    /**
     * CURL to browser id - need $_POST for work
     * return SESSION variables or false
     * @return type array()
     * @author Ricardo Negri
     * @ 
     */
    public $auth = array();

    /**
     * api from janrain - attention
     * @var type strin 
     */
    public $jan_api = '827871d43c9f49ba757db32ffb13c32087a721c7';

    /**
     * error out from json
     * @var type 
     */
    public $error = array();

    /**
     * @var type object mongodb users collection
     */
    public $U = false;

    public function __construct() {
        //RECEBE CHAMADA DO JAINRAIN
        if (isset($_REQUEST['token']) && strlen($_REQUEST['token']) == 40) {
            $this->login();
        }

        //SE ESTA LOGADO CARREGA DADOS DO USER
        if ($this->isLogged()) {
            $this->userAuthData();
        } else {
            //APAGA OS DADOS DE SESSAO
            $this->destroySession();
        }
    }

    public function destroySession() {
        session_destroy();
    }

    public function createSession() {
        if (empty($this->auth))
            return false;
        if ($this->isLogged()) {
            return $this->getUserData();
        } elseif ($this->isUser()) {
            return true;
        } elseif ($this->createUser()) {
            return $this->getUserData();
        } else {
            return false;
        }
    }

    public function getUserData() {
        $this->data_user = $this->U->findOne(array('email' => $this->auth['email']));
        if (is_array($this->data_user)) {
            $this->auth = array_merge($this->auth, $this->data_user);
            unset($this->auth['_id']);
            return true;
        }
        else
            return false;
    }

    public function isLogged() {
        if (isset($_SESSION['email'])) {
            $this->auth['email'] = $_SESSION['email'];
            return true;
        } elseif (!empty($this->auth)) {
            $_SESSION['email'] = $this->auth['email'];
            return false;
        } else {
            return false;
        }
    }

    public function createUser() {
        $user_schema = array(
            'email' => $this->auth['email'],
            'name' => '',
            'searchs' => array(),
            'vieweds' => array(),
        );
        if ($this->U->insert($user_schema))
            return true;
        else
            return false;
    }

    public function isUser() {
        if (!$this->auth)
            return false;
        return $this->data_user = $this->U->findOne(array('email' => $this->auth['email']));
    }

    private function __loadUserModel() {
        try {
            $conn = new Mongo('localhost');
            $db = $conn->users;
            $collection = $db->items;
            $obj = $collection->findOne(array('email' => $_SESSION['email']));
            pr($obj);
            if (!empty($obj)) {
                $this->auth = $obj;
            }
            $conn->close();
        } catch (MongoConnectionException $e) {
            die('Error connecting to MongoDB server');
        } catch (MongoException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function userAuthData() {
        try {
            $conn = new Mongo('localhost');

            $db = $conn->users;
            $collection = $db->items;
            $this->auth = $collection->findOne(array('email' => $_SESSION['email']));

            $conn->close();
        } catch (MongoConnectionException $e) {
            die('Error connecting to MongoDB server');
        } catch (MongoException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function login() {
        $this->token = $_REQUEST['token'];
        $url = "https://rpxnow.com/api/v2/auth_info?apiKey=" . $this->jan_api . "&token=" 
                . $this->token . "&extended=false&tokenURL=http://localhost:80";
        $infos_user = json_decode('[' . file_get_contents($url) . ']', true);
        if ($infos_user) {
            $u = $infos_user[0];
            $data_user = $u['profile'];

            $_SESSION['email'] = @$u['profile']['email'] ? $u['profile']['email'] : $u['profile']['url'];

            $this->userAuthData();
            if (!$this->auth) {
                $conn = new Mongo('localhost');
                $db = $conn->users;
                $collection = $db->items;

                required('models', 'schemas');
                $user_schema = Schemas::user();
                $collection->insert(array_merge_recursive($user_schema, $data_user));
                $this->auth = $collection->findOne(array('email' => $_SESSION['email']));
                $conn->close();
            }
            return true;
        }
        return false;
    }

}

?>