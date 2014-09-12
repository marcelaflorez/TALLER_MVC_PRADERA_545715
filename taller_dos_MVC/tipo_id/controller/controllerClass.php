<?php  

/**
 * Description of controllerClass
 *
 * @author Marcelaflorez
 */
class controllerClass {

    public function index($args = NULL) {
        $args['datos'] = modelClass::getAll();

        if (is_array($args['datos'])) {//opcional if (is_array($args['datos'])=== true)
            viewClass::renderHTML('index.php', $args); //si se cambia el nombre al index del template  a read se cambia aqui tambien
        } else {
            viewClass::renderHTML('error.php', $args); //$args['error']=$data->getMessage();
        }
    }

    public function create() {
        $template = 'create.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rsp = modelClass::putNewTipo($_POST['cod_tipo_id'], $_POST['des_tipo_id']);

            if ($rsp === true) {
                $args['success'] = 'El registro fue realizado exitosamente';
                $this->index($args);
            } else {
                $args['error'] = $rsp->getMessage();
                $args['formAction'] = 'index.php?action=create';
                $args = array_merge($args, $_POST);
                viewClass::renderHTML($template, $args);
            }
        } else {
            $args['formAction'] = 'index.php?action=create';
            viewClass::renderHTML($template, $args);
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_tipo_id']) and is_numeric($_GET['cod_tipo_id'])) {
            $certificate = modelClass::certifyTipo($_GET['cod_tipo_id']);
            if (is_array($certificate)) {
                if (count($certificate) > 0) {
                    $data = modelClass::getRow($_GET['cod_tipo_id']);
                    if (is_array($data)) {
                        if (count($data) > 0) {
                            $args['cod_tipo_id'] = $data[0]['cod_tipo_id'];
                            $args['des_tipo_id'] = $data[0]['des_tipo_id'];
                            }
                    } else {
                        $args['error'] = $data;
                        viewClass::renderHTML('error.php', $args);
                    }
                }
            } else {
                $args['error'] = $certificate;
                viewClass::renderHTML('error.php', $args);
            }
            $args['formAction'] = 'index.php?action=update&amp;cod_tipo_id=' . $_GET['cod_tipo_id'];
            viewClass::renderHTML('update.php', $args);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data['cod_tipo_id'] = $_POST['cod_tipo_id'];
            $data['des_tipo_id'] = ($_POST['des_tipo_id']);
            $rsp = modelClass::updateTipo($_GET['cod_tipo_id'], $data);
            if ($rsp === true) {
                $args['success'] = 'Cambio exitoso ';
            } else {
                $args['error'] = $rsp->getMessage();
            }
            $args['formAction'] = 'index.php?action=update&amp;cod_tipo_id=' . $_GET['cod_tipo_id'];
            $args = array_merge($args, $_POST);
            viewClass::renderHTML('update.php', $args);
        } else {
            $this->index();
        }
    }

    public function delete() {
        $args['formAction'] = 'index.php?action=delete&amp;cod_tipo_id=' . $_GET['cod_tipo_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_tipo_id']) and is_numeric($_GET['cod_tipo_id'])) {
            viewClass::renderHTML('delete.php', $args);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['cod_tipo_id']) and $_POST['cod_tipo_id'] === 'true') {
            $rsp = modelClass::deleteTipo($_GET['cod_tipo_id']);
            if ($rsp === true) {
                $args['success'] = 'Dato ' . $_GET['cod_tipo_id'] . ' Eliminacion exitosa';
            } else {
                $args['error'] = $rsp;
                viewClass::renderHTML('error.php', $args);
            }   
            $this->index($args);
        }
    }

    public function notFound() {
        
    }

}
