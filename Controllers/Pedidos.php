<?php class Pedidos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    public function obtenerPedidos(string $pedido)
    {

        try {
            $method = $_SERVER["REQUEST_METHOD"];
            $response = [];
            $code = 0;
            $data = [];
            if ($method == "GET") {


                $articulo = str_replace("_", " ", $pedido);
                $data = $this->model->selectPedidos($pedido);
                if (empty($data)) {
                    $response = array('status' => false, 'msg' => 'No se encontraron datos');
                    $code = 200;
                } else {
                    $response = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $data['orden']);
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
    public function obtenerPedido(int $pedido)
    {

        try {
            $method = $_SERVER["REQUEST_METHOD"];
            $response = [];
            $code = 0;
            $data = [];
            if ($method == "GET") {


                $pedido = intval($pedido);
                $data = $this->model->selectPedido($pedido);
                if (empty($data)) {
                    $response = array('status' => false, 'msg' => 'No se encontraron datos');
                    $code = 200;
                } else {
                    $response = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $data['orden']);
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

    public function actualizarPedido(int $idpedido, string $idtransaccion = null, string $status = null, int $descargado = null)
    {

        try {
            $method = $_SERVER["REQUEST_METHOD"];
            $response = [];
            $code = 0;
            $data = [];
            if ($method == "POST") {
                $idpedido = intval($idpedido);
                // Capturar el cuerpo de la solicitud
                $inputData = json_decode(file_get_contents('php://input'), true);

                // Validar que los datos fueron enviados correctamente
                if (isset($inputData['idtransaccion'])) {
                    $idtransaccion = $inputData['idtransaccion'];
                }
                if (isset($inputData['status'])) {
                    $status = $inputData['status'];
                    if(!($status == 'Pendiente' || $status == 'Completado' || $status == 'Cancelado')){
                        $response = array('status' => false, 'msg' => 'El parametro status debe ser Pendiente, Completado o Cancelado');
                        $code = 400;
                        jsonResponse($response, $code);
                        die();
                    }
                }
                if (isset($inputData['descargado'])) {
                    $descargado = intval($inputData['descargado']);
                    if (!($descargado == 1 || $descargado == 0)) {
                        $response = array('status' => false, 'msg' => 'El parametro descargado debe ser un 0 o 1');
                        $code = 400;
                        jsonResponse($response, $code);
                        die();
                    }
                }

                $data = $this->model->updatePedido($idpedido, $idtransaccion, $status, $descargado);
                if (empty($data)) {
                    $response = array('status' => false, 'msg' => 'No se encontraron datos');
                    $code = 400;
                } else {
                    $response = array('status' => true, 'msg' => 'Datos actualizados');
                    $code = 200;
                }
            } else {
                $response = array('status' => false, 'msg' => 'Método no permitido');
                $code = 405;
            }
            jsonResponse($response, code: $code);
            die();
        } catch (Exception $e) {
            $response = array('status' => false, 'msg' => $e->getMessage());
            $code = 500;
        }


    }

} ?>