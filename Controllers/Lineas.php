<?php
#[AllowDynamicProperties]
class Lineas extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        public function linea($strLinea)
        {
            try{
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "GET")
                {
                    $linea = str_replace("_"," ",$strLinea);
                     if(empty($linea))
                     {
                        $response = array('status'=>false, 'msg'=>'la clave de la línea es obligatoria');
                        $code = 400;
                        jsonResponse($response,$code);
                        die();
                    }
      
                    $arrLinea = $this->model->getLinea($linea);
                   
                    if(!empty($arrLinea))
                    {
 
                        $response = array('status'=>true, 'msg'=>'Línea obtenida correctamente', 'data'=>$arrLinea);
                        
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe la línea');
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

        public function lineas()
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
                    $request = $this->model->getLineas();
                  
                    if(!empty($request))
                    {
                        $response = array('status'=>true, 'msg'=>'Líneas obtenidas correctamente', 'data'=>$request);
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existen líneas');
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
                    $linea = !empty($data['linea']) ? strClean($data['linea']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $numero = !empty($data['numero']) ? strClean($data['numero']) : '';
                    $request = $this->model->setLinea($linea,$descrip,$numero,$usuario);
                    if($request != "exist")
                    {
                        $arrLinea = array('linea'=>$linea,
                                        'descrip'=>$descrip,
                                        'numero'=>$numero,
                                        'usuario'=>$usuario);
                        $response = array('status'=>true, 'msg'=>'Línea creada correctamente', 'data'=>$arrLinea);
                    }
                    else
                    {
                        $request = $this->model->putLinea($linea,$descrip,$numero,$usuario);
                        if($request)    
                        {
                            $arrLinea = array('linea'=>$linea,
                                            'descrip'=>$descrip,
                                            'numero'=>$numero,
                                            'usuario'=>$usuario);
                            $response = array('status'=>true, 'msg'=>'Línea actualizada correctamente', 'data'=>$arrLinea);
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
                   
                    $linea = !empty($data['linea']) ? strClean($data['linea']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $numero = !empty($data['numero']) ? strClean($data['numero']) : '';
                    $request = $this->model->setLinea($linea,$descrip,$numero,$usuario);
                   
                    if($request != "exist")
                    {
                        $arrLinea = array('linea'=>$linea,
                                        'descrip'=>$descrip,
                                        'numero'=>$numero,
                                        'usuario'=>$usuario);

                        $response = array('status'=>true, 'msg'=>'Línea creada correctamente', 'data'=>$arrLinea);
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'La linea ya existe');
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

                $linea = !empty($data['linea']) ? strClean($data['linea']) : '';
                $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                $numero = !empty($data['numero']) ? strClean($data['numero']) : '';

                $request = $this->model->putLinea($linea,$descrip,$numero,$usuario);
                if($request)    
                {
                    $arrLinea = array('linea'=>$linea,
                                    'descrip'=>$descrip,
                                    'numero'=>$numero,
                                    'usuario'=>$usuario);
                    $data = $arrLinea;

                    $response = array('status'=>true, 'msg'=>'Línea actualizada correctamente', 'data'=>$data);
                    $code = 200;
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'No existe la línea a actualizar');
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

        public function eliminar($linea)
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "DELETE")
                {
                    if(empty($linea))
                    {
                        $response = array('status'=>false, 'msg'=>'la clave de la línea es obligatoria');
                        $code = 200;
                        jsonResponse($response,$code);
                        die();
                    }
                    $linea = !empty($linea) ? strClean($linea) : '';
                    $request = $this->model->delLinea($linea);
                    if($request)    
                    {
                        $response = array('status'=>true, 'msg'=>'Línea eliminada correctamente');
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
           
            if(empty($data['linea']))
            {
                $response = array('status'=>false, 'msg'=>'la clave de la línea es obligatoria');
                $code = 200;
                return false;
            }

            if(empty($data['descrip']))
            {
                $response = array('status'=>false, 'msg'=>'la descripción de la línea es obligatoria');
                $code = 200;
                return false;
            }

            if(!testString($data['linea']))
            {
                $response = array('status'=>false, 'msg'=>'Error en el nombre de la línea');
                $code = 200;
                return false;
            }
            if(!testEntero($data['numero']))
            {
                $response = array('status'=>false, 'msg'=>'Error en el número de la línea. Especifique un valor entero.');
                $code = 200;
                return false;
            }

            return true;

        }

    }


?>