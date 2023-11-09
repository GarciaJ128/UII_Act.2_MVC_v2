<?php
class Libro
{
	private $pdo;

	public $id_libro;
	public $titulo;
	public $id_autor;
	public $editorial;
	public $anio;
	public $genero;
	public $precio;
	public $stock;
	public $portada;

	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Conexion::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try {
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tbl_libro");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getting($id_libro)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM tbl_libro WHERE id_libro = ?");


			$stm->execute(array($id_libro));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id_libro)
	{
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM tbl_libro WHERE id_libro = ?");

			$stm->execute(array($id_libro));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE tbl_libro SET 
    titulo = ?, 
    id_autor = ?,
    editorial = ?,
    anio = ?, 
    genero = ?,
    precio = ?, 
    stock = ?,
	portada = ?
WHERE id_libro = ?";


			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->titulo,
						$data->id_autor,
						$data->editorial,
						$data->anio,
						$data->genero,
						$data->precio,
						$data->stock,
						$data->portada,
						$data->id_libro
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try {
			$sql = "INSERT INTO `tbl_libro` (titulo,id_autor,editorial,anio,genero,precio,stock,portada) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->titulo,
						$data->id_autor,
						$data->editorial,
						$data->anio,
						$data->genero,
						$data->precio,
						$data->stock,
						$data->portada
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>