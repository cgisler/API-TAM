<?php class Pedidosapi extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function obtenerPedido(string $pedido)
    {

        try {
            $method = $_SERVER["REQUEST_METHOD"];
            $response = [];
            $code = 0;
            $data = [];
            if ($method == "GET") {

                $pedido = str_replace(" ", "_", $pedido);
                if (empty($pedido)) {
                    $response = array('status' => false, 'msg' => 'La clave del pedido es obligatoria');
                    $code = 400;
                    jsonResponse($response, $code);
                    die();
                } else {
                    $articulo = str_replace("_", " ", $pedido);
                    $data = $this->model->selectPedido($pedido);
                    if (empty($data)) {
                        $response = array('status' => false, 'msg' => 'No se encontraron datos');
                        $code = 200;
                    } else {
                        $response = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $data);
                        $code = 200;
                    }
                }
            } else {
                $response = array('status' => false, 'msg' => 'Método no permitido');
                $code = 405;
            }
            jsonResponse($response, $code);
            die();
        } catch (Exception $e) {
            $response = array('status' => false, 'msg' => $e->getMessage());
            $code = 500;
        }

    }

    public function obtenerPedidos()
    {

        try {
            $method = $_SERVER["REQUEST_METHOD"];
            $response = [];
            $code = 0;
            $data = [];
            if ($method == "GET") {


                $data = $this->model->selectPedidos();
                if (empty($data)) {
                    $response = array('status' => false, 'msg' => 'No se encontraron datos');
                    $code = 200;
                } else {
                    $response = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $data);
                    $code = 200;
                }

            } else {
                $response = array('status' => false, 'msg' => 'Método no permitido');
                $code = 405;
            }
            jsonResponse($response, $code);
            die();
        } catch (Exception $e) {
            $response = array('status' => false, 'msg' => $e->getMessage());
            $code = 500;
        }




    }

} ?>