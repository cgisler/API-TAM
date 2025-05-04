<?php
class PedidosModel extends Mysql
{
	private $objCategoria;
	public function __construct()
	{
		parent::__construct();
	}
	public function selectPedidos($limite)
	{

		$limit = intval($limite);
		$request = array();
		$sql = "SELECT p.idpedido,
							DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
							p.costo_envio,
							p.monto,
							t.tipopago,
							p.direccion_envio,
							p.status,
							p.descargado
					FROM pedido as p
					INNER JOIN tipopago t
					ON p.tipopagoid = t.idtipopago WHERE p.descargado = 0 LIMIT " . $limit;
		$requestPedido = $this->select_all($sql);

		if (!empty($requestPedido)) {
			$auxFinal = array();
			foreach ($requestPedido as $row) {
				$idpedido = $row['idpedido'];

				$sql_detalle = "SELECT p.ARTICULO,
											p.DESCRIP as producto,
											d.precio,
											d.cantidad
									FROM detalle_pedido d
									INNER JOIN prods p
									ON d.productoid = p.ARTICULO
									WHERE d.pedidoid = $idpedido";

				$requestProductos = $this->select_all($sql_detalle);
				$row['productos'] = $requestProductos;
				$auxFinal[] = $row;
			}
			$request = array(
				'orden' => $auxFinal
			);
		}
		return $request;
	}


	public function selectPedido($idpedido)
	{

		$limit = intval($idpedido);
		$request = array();
		$sql = "SELECT p.idpedido,
							DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
							p.costo_envio,
							p.monto,
							t.tipopago,
							p.direccion_envio,
							p.status,
							p.descargado
					FROM pedido as p
					INNER JOIN tipopago t
					ON p.tipopagoid = t.idtipopago WHERE p.idpedido = $idpedido";
		$requestPedido = $this->select_all($sql);

		if (!empty($requestPedido)) {
			$auxFinal = array();
			foreach ($requestPedido as $row) {
				$idpedido = $row['idpedido'];

				$sql_detalle = "SELECT p.ARTICULO,
											p.DESCRIP as producto,
											d.precio,
											d.cantidad
									FROM detalle_pedido d
									INNER JOIN prods p
									ON d.productoid = p.ARTICULO
									WHERE d.pedidoid = $idpedido";

				$requestProductos = $this->select_all($sql_detalle);
				$row['productos'] = $requestProductos;
				$auxFinal[] = $row;
			}
			$request = array(
				'orden' => $auxFinal
			);
		}
		return $request;
	}

	public function updatePedido($idpedido, $idtransaccion = null, $status = null, $descargado = null)
	{
		$aux = array();

		$updates = [];
		if (!empty($idtransaccion)) {
			$updates[] = "idtransaccion = ?";
			array_push($aux, $idtransaccion);
		}
		if (!empty($status)) {
			$updates[] = "status = ?";
			array_push($aux, $status);

		}
		if (!is_null($descargado)) {
			$updates[] = "descargado = ?";
			array_push($aux, $descargado);

		}

		if (empty($updates)) {
			http_response_code(400);
			echo json_encode(["status" => false, "msg" => "No hay datos para actualizar."]);
			return;
		} else {
			$sql = "UPDATE pedido SET " . implode(", ", $updates) . " WHERE idpedido = $idpedido";
			$request = $this->update($sql, $aux);
			return $request;
		}
	}

}
