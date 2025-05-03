<?php
#[AllowDynamicProperties]
class Marcas extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        public function marca($marca)
        {
            try{
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "GET")
                {
                    $marca = str_replace("_"," ",$marca);
                    if(empty($marca))
                    {
                        $response = array('status'=>false, 'msg'=>'la clave de la marca es obligatoria');
                        $code = 400;
                        jsonResponse($response,$code);
                        die();
                    }
                    $arrMarca = $this->model->getMarca($marca);
                    if(!empty($arrMarca))
                    {
                        $response = array('status'=>true, 'msg'=>'Marca obtenida correctamente', 'data'=>$arrMarca);
                        
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe la marca');
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

        public function marcas()
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
                    $request = $this->model->getMarcas();
                    if(!empty($request))
                    {
                        $response = array('status'=>true, 'msg'=>'Marcas obtenidas correctamente', 'data'=>$request);
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existen marcas');
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
                    $marca = !empty($data['marca']) ? strClean($data['marca']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $request = $this->model->setMarca($marca,$descrip,$usuario);
                    if($request != "exist")
                    {
                        $arrMarca = array('marca'=>$marca,
                                        'descrip'=>$descrip,
                                        'usuario'=>$usuario);
                        $response = array('status'=>true, 'msg'=>'Marca creada correctamente', 'data'=>$arrMarca);
                        $code = 200;
                    }
                    else
                    {
                        $request = $this->model->putMarca($marca,$descrip,$usuario);
                        if($request)    
                        {
                            $arrMarca = array('marca'=>$marca,
                                            'descrip'=>$descrip,
                                            'usuario'=>$usuario);
                            $response = array('status'=>true, 'msg'=>'Marca actualizada correctamente', 'data'=>$arrMarca);
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
                   
                    $marca = !empty($data['marca']) ? strClean($data['marca']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                    $request = $this->model->setMarca($marca,$descrip,$usuario);
                   
                    if($request != "exist")
                    {
                        $arrMarca = array('marca'=>$marca,
                                        'descrip'=>$descrip,
                                        'usuario'=>$usuario);

                        $response = array('status'=>true, 'msg'=>'Marca creada correctamente', 'data'=>$arrMarca);
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'La marca ya existe');
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

                $marca = !empty($data['marca']) ? strClean($data['marca']) : '';
                $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                $usuario = !empty($data['usuario']) ? strClean($data['usuario']) : '';
                
                $request = $this->model->putMarca($marca,$descrip,$usuario);
                if($request)    
                {
                    $arrMarca = array('marca'=>$marca,
                                    'descrip'=>$descrip,
                                    'usuario'=>$usuario);
                    $data = $arrMarca;

                    $response = array('status'=>true, 'msg'=>'Marca actualizada correctamente', 'data'=>$data);
                    $code = 200;
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'No existe la marca a actualizar');
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

        public function eliminar($marca)
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
                    if(empty($marca))
                    {
                        $response = array('status'=>false, 'msg'=>'la clave de la marca es obligatoria');
                        $code = 200;
                        jsonResponse($response,$code);
                        die();
                    }
                    $marca = !empty($marca) ? strClean($marca) : '';
                    $request = $this->model->delMarca($marca);
                    if($request)    
                    {
                        $response = array('status'=>true, 'msg'=>'Marca eliminada correctamente');
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe la marca a eliminar');
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
           
            if(empty($data['marca']))
            {
                $response = array('status'=>false, 'msg'=>'la clave de la marca es obligatoria');
                $code = 400;
                return false;
            }

            if(empty($data['descrip']))
            {
                $response = array('status'=>false, 'msg'=>'la descripción de la marca es obligatoria');
                $code = 400;
                return false;
            }

            if(!testString($data['marca']))
            {
                $response = array('status'=>false, 'msg'=>'Error en el nombre de la marca');
                $code = 400;
                return false;
            }
            
            return true;

        }

    }


?>