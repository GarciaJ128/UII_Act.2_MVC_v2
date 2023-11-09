<?php
require_once 'Model/libro.php';

class LibroController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Libro();
    }

    public function Index()
    {
        require_once 'View/header.php';
        require_once 'View/libro.php';
        require_once 'View/footer.php';
    }

    public function Crud()
    {
        $alm = new Libro();

        if (isset($_REQUEST['id_libro'])) {
            $alm = $this->model->getting($_REQUEST['id_libro']);
        }

        require_once 'View/header.php';
        require_once 'View/libro-editar.php';
        require_once 'View/footer.php';
    }

    public function Guardar()
    {
        $alm = new Libro();

        $alm->id_libro = isset($_POST['id_libro']) ? $_POST['id_libro'] : 0;
        $alm->titulo = $_REQUEST['titulo'];
        $alm->id_autor = $_REQUEST['id_autor'];
        $alm->editorial = $_REQUEST['editorial'];
        $alm->anio = $_REQUEST['anio'];
        $alm->genero = $_REQUEST['genero'];
        $alm->precio = $_REQUEST['precio'];
        $alm->stock = $_REQUEST['stock'];

        try {
            if ($_FILES['portada']['error'] === UPLOAD_ERR_OK) {
                // El usuario ha cargado un nuevo archivo para la imagen
                $imagenNueva = file_get_contents($_FILES['portada']['tmp_name']);
                $alm->portada = $imagenNueva;
            } else {
                // No se ha cargado un nuevo archivo, mantén la imagen existente
                $imagenExistente = $this->model->getting($alm->id_libro);

                if ($imagenExistente) {
                    $alm->portada = $imagenExistente->portada;
                } else {
                    // Manejo de caso donde no se puede obtener la imagen existente
                    echo 'No se pudo obtener la imagen existente.';
                    // Puedes agregar más lógica aquí según tus necesidades
                    exit();
                }
            }

            $alm->id_libro > 0
                ? $this->model->Actualizar($alm)
                : $this->model->Registrar($alm);

            header('Location: index.php');
        } catch (Exception $e) {
            echo 'Error al guardar: ' . $e->getMessage();
        }
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id_libro']);
        header('Location: index.php');
    }
}
?>