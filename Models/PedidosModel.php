<!-- Considerando las tablas pedido y detalle_pedido, crear el modelo para la API. 
 Columnas de la tabla pedido: idpedido, referenciacobro, idtransaccionpaypal, datospaypal, personaid, fecha, costo_envio, monto, tipopagoid, direccion_envio, descargado, estatus
 Columnas de la tabla detalle_pedido: id, pedidoid, productoid, precio, cantidad. -->
//
<?php
    class PedidosModel extends Mysql
    {
        private $idpedido;
        private $referenciacobro;
        private $idtransaccionpaypal;
        private $datospaypal;
        private $personaid;
        private $fecha;
        private $costo_envio;
        private $monto;
        private $tipopagoid;
        private $direccion_envio;
        private $descargado;
        private $estatus;
        private $id;
        private $pedidoid;
        private $productoid;
        private $precio;
        private $cantidad;
        public function __construct()
        {
            parent::__construct();
        }

        public function setPedido(string $referenciacobro, string $idtransaccionpaypal, string $datospaypal, string $personaid, string $fecha, string $costo_envio, string $monto, string $tipopagoid, string $direccion_envio, string $descargado, string $estatus)
        {
            $request = [];
            $this->referenciacobro = $referenciacobro;
            $this->idtransaccionpaypal = $idtransaccionpaypal;
            $this->datospaypal = $datospaypal;
            $this->personaid = $personaid;
            $this->fecha = $fecha;
            $this->costo_envio = $costo_envio;
            $this->monto = $monto;
            $this->tipopagoid = $tipopagoid;
            $this->direccion_envio = $direccion_envio;
            $this->descargado = $descargado;
            $this->estatus = $estatus;

            $sql = "SELECT referenciacobro from pedido where referenciacobro = :referenciacobro";
            $arrParams = array(":referenciacobro" => $this->referenciacobro
            );

            $request = $this->select($sql, $arrParams);

            if (!is_countable($request)) {
                    
                    $query_insert  = "INSERT INTO pedido(referenciacobro,idtransaccionpaypal,datospaypal,personaid,fecha,costo_envio,monto,tipopagoid,direccion_envio,descargado,estatus) VALUES(:referenciacobro,:idtransaccionpaypal,:datospaypal,:personaid,:fecha,:costo_envio,:monto,:tipopagoid,:direccion_envio,:descargado,:estatus)";
                    $arrData = array(":referenciacobro" => $this->referenciacobro,
                        ":idtransaccionpaypal" => $this->idtransaccionpaypal,
                        ":datospaypal" => $this->datospaypal,
                        ":personaid" => $this->personaid,
                        ":fecha" => $this->fecha,
                        ":costo_envio" => $this->costo_envio,
                        ":monto" => $this->monto,
                        ":tipopagoid" => $this->tipopagoid,
                        ":direccion_envio" => $this->direccion_envio,
                        ":descargado" => $this->descargado,
                        ":estatus" => $this->estatus);
                    $request_insert = $this->insert($query_insert, $arrData);
                    $sql = "SELECT referenciacobro from pedido where referenciacobro = :referenciacobro";
                    $arrParams = array(":referenciacobro" => $this->referenciacobro);
    
                    $request_insert = $this->select($sql, $arrParams);
    
                    $returnData = $request_insert;
                } else {
                    $returnData = "exist";
                }
                return $returnData;
            }

            public function getPedido(string $referenciacobro)
            {
                $this->referenciacobro = $referenciacobro;
                $sql = "SELECT idpedido, referenciacobro, idtransaccionpaypal, datospaypal, personaid, fecha, costo_envio, monto, tipopagoid, direccion_envio, descargado, estatus FROM pedido WHERE referenciacobro = :referenciacobro";
                $arrParams = array(":referenciacobro" => $this->referenciacobro);
                $request = $this->select($sql, $arrParams);
                return $request;
            }

            public function setDetallePedido(string $pedidoid, string $productoid, string $precio, string $cantidad)
            {
                $request = [];
                $this->pedidoid = $pedidoid;
                $this->productoid = $productoid;
                $this->precio = $precio;
                $this->cantidad = $cantidad;

                $sql = "SELECT pedidoid from detalle_pedido where pedidoid = :pedidoid";
                $arrParams = array(":pedidoid" => $this->pedidoid
                );

                $request = $this->select($sql, $arrParams);

                if (!is_countable($request)) {
                    
                    $query_insert  = "INSERT INTO detalle_pedido(pedidoid,productoid,precio,cantidad) VALUES(:pedidoid,:productoid,:precio,:cantidad)";
                    $arrData = array(":pedidoid" => $this->pedidoid,
                        ":productoid" => $this->productoid,
                        ":precio" => $this->precio,
                        ":cantidad" => $this->cantidad);
                    $request_insert = $this->insert($query_insert, $arrData);
                    $sql = "SELECT pedidoid from detalle_pedido where pedidoid = :pedidoid";
                    $arrParams = array(":pedidoid" => $this->pedidoid);
    
                    $request_insert = $this->select($sql, $arrParams);
    
                    $returnData = $request_insert;
                } else {
                    $returnData = "exist";
                }
                return $returnData;
            }

            public function getDetallePedido(string $pedidoid)
            {
                $this->pedidoid = $pedidoid;
                $sql = "SELECT id, pedidoid, productoid, precio, cantidad FROM detalle_pedido WHERE pedidoid = :pedidoid";
                $arrParams = array(":pedidoid" => $this->pedidoid);
                $request = $this->select($sql, $arrParams);
                return $request;
            }

        }
?>
