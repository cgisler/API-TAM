<?php
#[AllowDynamicProperties]
class Fabricantes extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        public function fabricante($fabricante)
        {
            try{
                $method = $_SERVER["REQUEST_METHOD"];
                $response= [];
                $code = 0;
                $data = [];
                if($method == "GET")
                {
                    $fabricante = str_replace("_"," ",$fabricante);
                    if(empty($fabricante))
                    {
                        $response = array('status'=>false, 'msg'=>'La clave del fabricante es obligatoria');
                        $code = 400;
                        jsonResponse($response,$code);
                        die();
                    }
                    $arrfabricante = $this->model->getFabricante($fabricante);
                    if(!empty($arrfabricante))
                    {
                        $response = array('status'=>true, 'msg'=>'fabricante obtenido correctamente', 'data'=>$arrfabricante);
                        
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe el fabricante');
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

        public function fabricantes()
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
                    $request = $this->model->getFabricantes();
                    if(!empty($request))
                    {
                        $response = array('status'=>true, 'msg'=>'fabricantes obtenidos correctamente', 'data'=>$request);
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existen fabricantes');
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
                    $fabricante = !empty($data['fabricante']) ? strClean($data['fabricante']) : '';
                    $nombre = !empty($data['nombre']) ? strClean($data['nombre']) : '';
                    $request = $this->model->setFabricante($fabricante,$nombre);
                    if($request != "exist")
                    {
                        $arrfabricante = array('fabricante'=>$fabricante,
                                        'nombre'=>$nombre);
                        $response = array('status'=>true, 'msg'=>'fabricante creado correctamente', 'data'=>$arrfabricante);
                        $code = 200;
                    }
                    else
                    {
                        $request = $this->model->putFabricante($fabricante,$nombre);
                        if($request)    
                        {
                            $arrfabricante = array('fabricante'=>$fabricante,
                                            'descrip'=>$nombre);
                            $response = array('status'=>true, 'msg'=>'fabricante actualizado correctamente', 'data'=>$arrfabricante);
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
                   
                    $fabricante = !empty($data['fabricante']) ? strClean($data['fabricante']) : '';
                    $nombre = !empty($data['nombre']) ? strClean($data['nombre']) : '';
                 
                    $request = $this->model->setFabricante($fabricante,$nombre);
                   
                    if($request != "exist")
                    {
                        $arrfabricante = array('fabricante'=>$fabricante,
                                        'nombre'=>$nombre);

                        $response = array('status'=>true, 'msg'=>'Fabricante creado correctamente', 'data'=>$arrfabricante);
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'El fabricante ya existe');
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

                $fabricante = !empty($data['fabricante']) ? strClean($data['fabricante']) : '';
                $nombre = !empty($data['nombre']) ? strClean($data['nombre']) : '';
                
                $request = $this->model->putfabricante($fabricante,$nombre);
                if($request)    
                {
                    $arrfabricante = array('fabricante'=>$fabricante,
                                    'descrip'=>$nombre);
                    $data = $arrfabricante;

                    $response = array('status'=>true, 'msg'=>'Fabricante actualizado correctamente', 'data'=>$data);
                    $code = 200;
                }
                else
                {
                    $response = array('status'=>false, 'msg'=>'No existe el fabricante a actualizar');
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

        public function eliminar($fabricante)
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
                    if(empty($fabricante))
                    {
                        $response = array('status'=>false, 'msg'=>'La clave del fabricante es obligatoria');
                        $code = 200;
                        jsonResponse($response,$code);
                        die();
                    }
                    $fabricante = !empty($fabricante) ? strClean($fabricante) : '';
                    $request = $this->model->delfabricante($fabricante);
                    if($request)    
                    {
                        $response = array('status'=>true, 'msg'=>'Fabricante eliminado correctamente');
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status'=>false, 'msg'=>'No existe el fabricante a eliminar');
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
           
            if(empty($data['fabricante']))
            {
                $response = array('status'=>false, 'msg'=>'la clave del fabricante es obligatoria');
                $code = 400;
                return false;
            }

            if(empty($data['nombre']))
            {
                $response = array('status'=>false, 'msg'=>'El nombre del fabricante es obligatoria');
                $code = 400;
                return false;
            }
            
            return true;

        }

    }

?>