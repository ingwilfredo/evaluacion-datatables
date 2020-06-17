<?php
class menu
{
	private $pdo;

	public $id;
	public $menu_padre;
	public $nombre;
	public $descripcion;
	public $accion;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Menu();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtrnerMenu()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT hijo.id, (SELECT nombre FROM menu as padre WHERE padre.id = hijo.menu_padre) as menu_padre,
			hijo.nombre, hijo.descripcion  FROM menu as hijo");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtrnerPadre()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT id, nombre FROM menu");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtenerMenu($id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM menu WHERE id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtrnerMenuOption()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT padre.*, (SELECT COUNT(id) FROM menu as hijo WHERE hijo.menu_padre = padre.id) as hijos FROM menu as padre");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtrnerMenuHijos($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT id, nombre FROM menu WHERE menu_padre = ?");


			$stm->execute(array($id));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo
			->prepare("DELETE FROM menu WHERE menu_padre = ?");

			$stm->execute(array($id));

			$stm = $this->pdo
			->prepare("DELETE FROM menu WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE menu SET
			menu_padre  = ?,
			nombre      = ?,
			descripcion = ?
			WHERE id = ?";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->menu_padre,
					$data->nombre,
					$data->descripcion,
					$data->id
				)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(menu $data)
	{
		try
		{
			$sql = "INSERT INTO menu (menu_padre,nombre,descripcion)
			VALUES (?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->menu_padre,
					$data->nombre,
					$data->descripcion
				)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
