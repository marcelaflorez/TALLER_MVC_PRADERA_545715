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
            $rsp = modelClass::putNewAprendiz($_POST['id_apre'], $_POST['nom_apre'], $_POST['apel_apre'], $_POST['tel_apre'], $_POST['cod_ciudad'], $_POST['cod_tipo_id'], $_POST['cod_rh'], $_POST['genero'], $_POST['edad']);

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
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id_apre']) and is_numeric($_GET['id_apre'])) {
            $certificate = modelClass::certifyAprendiz($_GET['id_apre']);
            if (is_array($certificate)) {
                if (count($certificate) > 0) {
                    $data = modelClass::getRow($_GET['id_apre']);
                    if (is_array($data)) {
                        if (count($data) > 0) {
                            $args['id_apre'] = $data[0]['id_apre'];
                            $args['nom_apre'] = $data[0]['nom_apre'];
                            $args['apel_apre'] = $data[0]['apel_apre'];
                            $args['tel_apre'] = $data[0]['tel_apre'];
                            $args['cod_ciudad'] = $data[0]['cod_ciudad'];
                            $args['cod_tipo_id'] = $data[0]['cod_tipo_id'];
                            $args['cod_rh'] = $data[0]['cod_rh'];
                            $args['genero'] = $data[0]['genero'];
                            $args['edad'] = $data[0]['edad'];
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
            $args['formAction'] = 'index.php?action=update&amp;id_apre=' . $_GET['id_apre'];
            viewClass::renderHTML('update.php', $args);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data['id_apre'] = $_POST['id_apre'];
            $data['nom_apre'] = ($_POST['nom_apre']);
            $data['apel_apre'] = ($_POST['apel_apre']);
            $data['tel_apre'] = ($_POST['tel_apre']);
            $data['cod_ciudad'] = ($_POST['cod_ciudad']);
            $data['cod_tipo_id'] = ($_POST['cod_tipo_id']);
            $data['cod_rh'] = ($_POST['cod_rh']);
            $data['genero'] = ($_POST['genero']);
            $data['edad'] = ($_POST['edad']);
            $rsp = modelClass::updateAprendiz($_GET['id_apre'], $data);
            if ($rsp === true) {
                $args['success'] = 'Cambio exitoso ';
            } else {
                $args['error'] = $rsp->getMessage();
            }
            $args['formAction'] = 'index.php?action=update&amp;id_apre=' . $_GET['id_apre'];
            $args = array_merge($args, $_POST);
            viewClass::renderHTML('update.php', $args);
        } else {
            $this->index();
        }
    }

    public function delete() {
        $args['formAction'] = 'index.php?action=delete&amp;id_apre=' . $_GET['id_apre'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id_apre']) and is_numeric($_GET['id_apre'])) {
            viewClass::renderHTML('delete.php', $args);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['id_apre']) and $_POST['id_apre'] === 'true') {
            $rsp = modelClass::deleteAprendiz($_GET['id_apre']);
            if ($rsp === true) {
                $args['success'] = 'Dato ' . $_GET['id_apre'] . ' Eliminacion exitosa';
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
