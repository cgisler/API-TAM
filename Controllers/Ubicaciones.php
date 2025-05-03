<?php
#[AllowDynamicProperties]
class Ubicaciones extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        public function ubicacion($ubicacion)
        {
            try{
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "GET")
                {
                    $ubicacion = str_replace("_"," ",$ubicacion);
                    if(empty($ubicacion))
                    {
                        $response = array('status'=>false, 'msg'=>'la clave de la ubicacion es obligatoria');
                        $code = 400;
                        jsonResponse($response,$code);
                        die();
                    }
                    $arrubicacion = $this->model->getUbicacion($ubicacion);
                    if(!empty($arrubicacion))
                    {
                        $response = array('status'=>true, 'msg'=>'ubicacion obtenida correctamente', 'data'=>$arrubicacion);
                        
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe la ubicacion');
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

        public function ubicaciones()
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
                    $request = $this->model->getUbicaciones();
                    if(!empty($request))
                    {
                        $response = array('status'=>true, 'msg'=>'Ubicaciones obtenidas correctamente', 'data'=>$request);
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existen ubicaciones');
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
                    $ubicacion = !empty($data['ubicacion']) ? strClean($data['ubicacion']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $request = $this->model->setUbicacion($ubicacion,$descrip,$usuario);
                    if($request != "exist")
                    {
                        $arrubicacion = array('ubicacion'=>$ubicacion,
                                        'descrip'=>$descrip,
                                        'usuario'=>$usuario);
                        $response = array('status'=>true, 'msg'=>'ubicacion creada correctamente', 'data'=>$arrubicacion);
                        $code = 200;
                    }
                    else
                    {
                        $request = $this->model->putUbicacion($ubicacion,$descrip,$usuario);
                        if($request)    
                        {
                            $arrubicacion = array('ubicacion'=>$ubicacion,
                                            'descrip'=>$descrip,
                                            'usuario'=>$usuario);
                            $response = array('status'=>true, 'msg'=>'ubicacion actualizada correctamente', 'data'=>$arrubicacion);
                            $code = 200;
                        }
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
                   
                    $ubicacion = !empty($data['ubicacion']) ? strClean($data['ubicacion']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $request = $this->model->setUbicacion($ubicacion,$descrip,$usuario);
                   
                    if($request != "exist")
                    {
                        $arrubicacion = array('ubicacion'=>$ubicacion,
                                        'descrip'=>$descrip,
                                        'usuario'=>$usuario);

                        $response = array('status'=>true, 'msg'=>'Ubicacion creada correctamente', 'data'=>$arrubicacion);
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'La ubicacion ya existe');
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

                $ubicacion = !empty($data['ubicacion']) ? strClean($data['ubicacion']) : '';
                $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                
                $request = $this->model->putUbicacion($ubicacion,$descrip,$usuario);
                if($request)    
                {
                    $arrubicacion = array('ubicacion'=>$ubicacion,
                                    'descrip'=>$descrip,
                                    'usuario'=>$usuario);
                    $data = $arrubicacion;

                    $response = array('status'=>true, 'msg'=>'Ubicacion actualizada correctamente', 'data'=>$data);
                    $code = 200;
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'No existe la ubicación a actualizar');
                    $code = 400;
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

        public function eliminar($ubicacion)
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "DELETE")
                {
                    $data = json_decode(file_get_contents("php://input"),true);
                    if(empty($ubicacion))
                    {
                        $response = array('status'=>false, 'msg'=>'la clave de la ubicacion es obligatoria');
                        $code = 200;
                        jsonResponse($response,$code);
                        die();
                    }
                    $ubicacion = !empty($ubicacion) ? strClean($ubicacion) : '';
                    $request = $this->model->delUbicacion($ubicacion);
                    if($request)    
                    {
                        $response = array('status'=>true, 'msg'=>'Ubicación eliminada correctamente');
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe la ubicación a eliminar');
                        $code = 400;
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
           
            if(empty($data['ubicacion']))
            {
                $response = array('status'=>false, 'msg'=>'La clave de la ubicación es obligatoria');
                $code = 400;
                return false;
            }

            if(empty($data['descrip']))
            {
                $response = array('status'=>false, 'msg'=>'La descripción de la ubicación es obligatoria');
                $code = 400;
                return false;
            }
            
            return true;

        }

    }


?>