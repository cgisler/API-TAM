<?php
#[AllowDynamicProperties]
class Impuestos extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        public function impuesto($impuesto)
        {
            try{
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "GET")
                {
                     if(empty($impuesto))
                     {
                        $response = array('status'=>false, 'msg'=>'la clave del impuesto es obligatoria');
                        $code = 400;
                        jsonResponse($response,$code);
                        die();
                    }
                    $arrimpuesto = $this->model->getImpuesto($impuesto);
                   
                    if(!empty($arrimpuesto))
                    {
 
                        $response = array('status'=>true, 'msg'=>'Impuesto obtenido correctamente', 'data'=>$arrimpuesto);
                        
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe el impuesto');
                    }
                    $code = 200;
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'Error en la solicitud ' .$method);
                    $code = 400;
                }

                jsonResponse($response,$code);
                die();
            }
            catch(Exception $e)
            {
                echo("Error en el proceso: " .$e->getMessage());
            }
        }

        public function impuestos()
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "GET")
                {
                    $data = json_decode(file_get_contents("php://input"),true);
                    $request = $this->model->getImpuestos();
                  
                    if(!empty($request))
                    {
                        $response = array('status'=>true, 'msg'=>'Impuestos obtenidos correctamente', 'data'=>$request);
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existen impuestos');
                        $code = 200;
                    }
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'Error en la solicitud ' .$method);
                    $code = 400;
                }

                jsonResponse($response,$code);
                die();
            }
            catch(Exception $e)
            {
                echo("Error en el proceso: " .$e->getMessage());
            }
        }

        public function guardar()
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response = [];
                $code = 0;
                $data = [];
                if($method == "POST")
                {
                    $data = json_decode(file_get_contents("php://input"),true);
                    if(!$this->validaDatos($data, $response, $code))
                    {
                        jsonResponse($response,$code);
                        die();
                    }
                    $impuesto = !empty($data['impuesto']) ? strClean($data['impuesto']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $valor = !empty($data['valor']) ? strClean($data['valor']) : '';
                    $request = $this->model->setImpuesto($impuesto,$descrip,$valor,$usuario);
                    if($request != "exist")
                    {
                        $arrimpuesto = array('impuesto'=>$impuesto,
                                        'descrip'=>$descrip,
                                        'valor'=>$valor,
                                        'usuario'=>$usuario);
                        $response = array('status'=>true, 'msg'=>'Impuesto creado correctamente', 'data'=>$arrimpuesto);
                    }
                    else
                    {
                        $request = $this->model->putImpuesto($impuesto,$descrip,$valor,$usuario);
                        if($request)    
                        {
                            $arrimpuesto = array('impuesto'=>$impuesto,
                                            'descrip'=>$descrip,
                                            'valor'=>$valor,
                                            'usuario'=>$usuario);
                            $response = array('status'=>true, 'msg'=>'Impuesto actualizado correctamente', 'data'=>$arrimpuesto);
                        }
                    }
                    $code = 200;


                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'Error en la solicitud ' .$method);
                    $code = 400;
                }
                jsonResponse($response,$code);
                die();

            }
            catch(Exception $e)
            {
                echo("Error en el proceso: " .$e->getMessage());
            }
        }

        public function registrar()
        {
            try{
                                
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "POST")
                {
                    $data = json_decode(file_get_contents("php://input"),true);
                    
                    if(!$this->validaDatos($data, $response, $code))
                    {
                        jsonResponse($response,$code);
                        die();
                    }
                   
                    $impuesto = !empty($data['impuesto']) ? strClean($data['impuesto']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $valor = !empty($data['valor']) ? strClean($data['valor']) : '';
                    $request = $this->model->setImpuesto($impuesto,$descrip,$valor,$usuario);
                   
                    if($request != "exist")
                    {
                        $arrimpuesto = array('impuesto'=>$impuesto,
                                        'descrip'=>$descrip,
                                        'valor'=>$valor,
                                        'usuario'=>$usuario);

                        $response = array('status'=>true, 'msg'=>'Impuesto creado correctamente', 'data'=>$arrimpuesto);
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'El impuesto ya existe');
                    }
                    $code = 200;
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'Error en la solicitud ' .$method);
                    $code = 400;
                }

                jsonResponse($response,$code);
                die();

            }
            catch(Exception $e)
            {
                echo("Error en el proceso: " .$e->getMessage());
            }
        }

        public function actualizar()
        {
            try
            {
            $method = $_SERVER["REQUEST_METHOD"];
            $response= [];
            $code = 0;
            $data = [];
            if($method == "PUT")
            {
                $data = json_decode(file_get_contents("php://input"),true);
                if(!$this->validaDatos($data, $response, $code))
                {
                    jsonResponse($response,$code);
                    die();
                }

                $impuesto = !empty($data['impuesto']) ? strClean($data['impuesto']) : '';
                $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                $valor = !empty($data['valor']) ? strClean($data['valor']) : '';

                $request = $this->model->putImpuesto($impuesto,$descrip,$valor,$usuario);
                if($request)    
                {
                    $arrimpuesto = array('impuesto'=>$impuesto,
                                    'descrip'=>$descrip,
                                    'valor'=>$valor,
                                    'usuario'=>$usuario);
                    $data = $arrimpuesto;

                    $response = array('status'=>true, 'msg'=>'Impuesto actualizado correctamente', 'data'=>$data);
                    $code = 200;
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'No existe el impuesto a actualizar');
                    $code = 200;
                }
            }
            else
            {

                $response = array('status'=>false, 'msg'=>'Error en la solicitud ' .$method);
                $code = 400;
            }
            jsonResponse($response,$code);
            die();
        }
        catch(Exception $e)
        {
            echo("Error en el proceso: " .$e->getMessage());
        }
    }

        public function eliminar($impuesto)
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "DELETE")
                {
                    if(empty($impuesto))
                    {
                        $response = array('status'=>false, 'msg'=>'la clave del impuesto es obligatoria');
                        $code = 200;
                        jsonResponse($response,$code);
                        die();
                    }
                    $impuesto = !empty($impuesto) ? strClean($impuesto) : '';
                    $request = $this->model->delImpuesto($impuesto);
                    if($request)    
                    {
                        $response = array('status'=>true, 'msg'=>'Impuesto eliminada correctamente');
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe la línea a eliminar');
                        $code = 200;
                    }
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'Error en la solicitud ' .$method);
                    $code = 400;
                }
                jsonResponse($response,$code);
                die();
            }
            catch(Exception $e)
            {
                echo("Error en el proceso: " .$e->getMessage());
            }
        }

        private function validaDatos($data, &$response, &$code) 
        {
           
            if(empty($data['impuesto']))
            {
                $response = array('status'=>false, 'msg'=>'la clave del impuesto es obligatoria');
                $code = 200;
                return false;
            }

            if(empty($data['descrip']))
            {
                $response = array('status'=>false, 'msg'=>'la descripción del impuesto es obligatoria');
                $code = 200;
                return false;
            }

            if(!testDecimal($data['valor']))
            {
                $response = array('status'=>false, 'msg'=>'Error en el porcentaje del impuesto. Especifique un valor decimal.');
                $code = 200;
                return false;
            }

            return true;

        }

    }


?>