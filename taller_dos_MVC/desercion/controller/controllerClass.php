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
            $rsp = modelClass::putNewDesercion($_POST['num_doc'], $_POST['fecha'], $_POST['id_apre'], $_POST['num_ficha'], $_POST['cod_causa'], $_POST['fecha_desercion'], $_POST['fase_desercion']);

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
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_doc']) and is_numeric($_GET['num_doc'])) {
            $certificate = modelClass::certifyDesercion($_GET['num_doc']);
            if (is_array($certificate)) {
                if (count($certificate) > 0) {
                    $data = modelClass::getRow($_GET['num_doc']);
                    if (is_array($data)) {
                        if (count($data) > 0) {
                            $args['num_doc'] = $data[0]['num_doc'];
                            $args['fecha'] = $data[0]['fecha'];
                            $args['id_apre'] = $data[0]['id_apre'];
                            $args['num_ficha'] = $data[0]['num_ficha'];
                            $args['cod_causa'] = $data[0]['cod_causa'];
                            $args['fecha_desercion'] = $data[0]['fecha_desercion'];
                            $args['fase_desercion'] = $data[0]['fase_desercion'];
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
            $args['formAction'] = 'index.php?action=update&amp;num_doc=' . $_GET['num_doc'];
            viewClass::renderHTML('update.php', $args);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data['num_doc'] = $_POST['num_doc'];
            $data['fecha'] = ($_POST['fecha']);
            $data['id_apre'] = ($_POST['id_apre']);
            $data['num_ficha'] = ($_POST['num_ficha']);
            $data['cod_causa'] = ($_POST['cod_causa']);
            $data['fecha_desercion'] = ($_POST['fecha_desercion']);
            $data['fase_desercion'] = ($_POST['fase_desercion']);
            $rsp = modelClass::updateDesercion($_GET['num_doc'], $data);
            if ($rsp === true) {
                $args['success'] = 'Cambio exitoso ';
            } else {
                $args['error'] = $rsp->getMessage();
            }
            $args['formAction'] = 'index.php?action=update&amp;num_doc=' . $_GET['num_doc'];
            $args = array_merge($args, $_POST);
            viewClass::renderHTML('update.php', $args);
        } else {
            $this->index();
        }
    }

    public function delete() {
        $args['formAction'] = 'index.php?action=delete&amp;num_doc=' . $_GET['num_doc'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['num_doc']) and is_numeric($_GET['num_doc'])) {
            viewClass::renderHTML('delete.php', $args);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['num_doc']) and $_POST['num_doc'] === 'true') {
            $rsp = modelClass::deleteDesercion($_GET['num_doc']);
            if ($rsp === true) {
                $args['success'] = 'Dato ' . $_GET['num_doc'] . ' Eliminacion exitosa';
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
