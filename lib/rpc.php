<?php

required('lib/static', 'Set');

class rpc {

    public $tipo = false;
    public $flat = false;
    public $value = false;
    public $result = false;

    public function __construct($obj) {
        if (!isset($_POST['value']) || !$_POST['value'] || !isset($_POST['flat']) || !$_POST['flat']) {
            $this->result = false;
            return false;
        }
        $this->obj = $obj;
        $this->auth = $this->obj->bid->auth;
        if (isset($_POST) && !empty($_POST)) {
            $this->tipo = $_POST['tipo'];
            $this->flat = $_POST['flat'];
            $this->value = urldecode($_POST['value']);
            $this->title = isset($_POST['title']) ? $_POST['title'] : false;
        } else {
            $this->result = false;
            return false;
        }
        switch ($this->tipo) {
            case 'search':
                $this->searchAdd();
                break;
            case 'visualizados':
                $this->visualizadosAdd();
                break;
            default:
                return false;
                break;
        }
    }

    public function searchAdd() {
        if (in_array($this->value, $this->auth['videos']['buscas']['keywords'])) {
            $this->result = false;
            return false;
        }

        $this->data_add = $this->unflat($this->auth['videos']['buscas']['keywords']);
        $this->auth = Set::merge($this->auth, $this->data_add);

        $this->auth['videos']['buscas']['keywords'] = array_values(
                array_filter(
                        array_unique(
                                $this->auth['videos']['buscas']['keywords']
                        )
                )
        );
//        $this->auth['videos']['buscas']['keywords'] = array();
//        $this->auth['videos']['visualizados'] = array();
        $this->auth['videos']['buscas']['atual'] = $this->value;

        $this->save();
    }

    public function visualizadosAdd() {
        if (in_array($this->value, $this->auth['videos']['visualizados'])) {
            $this->result = false;
            return false;
        }

        $this->data_add = $this->unflatVisualizados();
        $this->auth = Set::merge($this->auth, $this->data_add);

        $this->auth['videos']['ultimo_visualizado'] = $this->value;
        $this->save();
    }

    public function unflatVisualizados() {
        return Set::insert(array(), 
                $this->flat, 
                array(
                    $this->value => array(
                        'title'=>  $this->title,
                        'data_view' => time()
                            )
                        )
                );
    }

    public function unflat($contar=false) {
        return Set::insert(array(), $this->flat, array(count($contar) => $this->value));
    }

    public function save() {
        $conn = new Mongo('localhost');
        $db = $conn->users;
        $collection = $db->items;
        $collection->save($this->auth);
        $this->obj->bid->userAuthData();
        $this->result = 'ok';
        $conn->close();
    }

}

?>