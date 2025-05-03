<?php
class PedidosapiModel extends Mysql
{
	private $objCategoria;
	public function __construct()
	{
		parent::__construct();
	}

	public function selectPedidos($idpersona = null)
	{
		$where = "";
		if ($idpersona != null) {
			$where = " WHERE p.personaid = " . $idpersona;
		}
		$sql = "SELECT p.idpedido,
							p.referenciacobro,
							p.idtransaccionpaypal,
							DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
							p.monto,
							tp.tipopago,
							tp.idtipopago,
							p.status, 
							p.descargado
					FROM pedido p 
					INNER JOIN tipopago tp
					ON p.tipopagoid = tp.idtipopago $where ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectPedido(int $idpedido, $idpersona = NULL)
	{
		$busqueda = "";
		if ($idpersona != NULL) {
			$busqueda = " AND p.personaid =" . $idpersona;
		}
		$request = array();
		$sql = "SELECT p.idpedido,
							p.referenciacobro,
							p.idtransaccionpaypal,
							p.personaid,
							DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
							p.costo_envio,
							p.monto,
							p.tipopagoid,
							t.tipopago,
							p.direccion_envio,
							p.status,
							p.descargado
					FROM pedido as p
					INNER JOIN tipopago t
					ON p.tipopagoid = t.idtipopago
					WHERE p.idpedido =  $idpedido " . $busqueda;
		$requestPedido = $this->select_all($sql);

		if (!empty($requestPedido)) {
			$idpersona = $requestPedido[0]['personaid'];
			$sql_cliente = "SELECT idpersona,
										nombres,
										apellidos,
										telefono,
										email_user,
										rfc,
										nombrefical,
										direccionfiscal
								FROM persona WHERE idpersona = $idpersona ";
			$requestcliente = $this->select_all($sql_cliente);
			$sql_detalle = "SELECT p.ARTICULO,
											p.DESCRIP as producto,
											d.precio,
											d.cantidad
									FROM detalle_pedido d
									INNER JOIN prods p
									ON d.productoid = p.ARTICULO
									WHERE d.pedidoid = $idpedido";
			$requestProductos = $this->select_all($sql_detalle);
			$request = array(
				'cliente' => $requestcliente,
				'orden' => $requestPedido,
				'detalle' => $requestProductos
			);
		}
		return $request;
	}

	

	

}
