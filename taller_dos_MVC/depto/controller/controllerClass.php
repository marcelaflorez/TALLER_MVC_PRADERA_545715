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
            $rsp = modelClass::putNewDepto($_POST['cod_depto'], $_POST['nom_depto']);

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
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_depto']) and is_numeric($_GET['cod_depto'])) {
            $certificate = modelClass::certifyDepto($_GET['cod_depto']);
            if (is_array($certificate)) {
                if (count($certificate) > 0) {
                    $data = modelClass::getRow($_GET['cod_depto']);
                    if (is_array($data)) {
                        if (count($data) > 0) {
                            $args['cod_depto'] = $data[0]['cod_depto'];
                            $args['nom_depto'] = $data[0]['nom_depto'];
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
            $args['formAction'] = 'index.php?action=update&amp;cod_depto=' . $_GET['cod_depto'];
            viewClass::renderHTML('update.php', $args);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data['cod_depto'] = $_POST['cod_depto'];
            $data['nom_depto'] = ($_POST['nom_depto']);
            $rsp = modelClass::updateDepto($_GET['cod_depto'], $data);
            if ($rsp === true) {
                $args['success'] = 'Cambio exitoso ';
            } else {
                $args['error'] = $rsp->getMessage();
            }
            $args['formAction'] = 'index.php?action=update&amp;cod_depto=' . $_GET['cod_depto'];
            $args = array_merge($args, $_POST);
            viewClass::renderHTML('update.php', $args);
        } else {
            $this->index();
        }
    }

    public function delete() {
        $args['formAction'] = 'index.php?action=delete&amp;cod_depto=' . $_GET['cod_depto'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['cod_depto']) and is_numeric($_GET['cod_depto'])) {
            viewClass::renderHTML('delete.php', $args);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['cod_depto']) and $_POST['cod_depto'] === 'true') {
            $rsp = modelClass::deleteDepto($_GET['cod_depto']);
            if ($rsp === true) {
                $args['success'] = 'Dato ' . $_GET['cod_depto'] . ' Eliminacion exitosa';
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
