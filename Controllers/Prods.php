<?php
#[AllowDynamicProperties]
class Prods extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        public function articulo($articulo)
        {
            try{
                $method = $_SERVER["REQUEST_METHOD"];
                $response =[];
                $code= 0;
                $data= [];
                if ($method == "GET"){

                    $articulo = str_replace("_"," ",$articulo);
                    if(empty($articulo)){
                        $response = array('status' =>false, 'msg' => 'La clave del artículo es obligatoria');
                        $code = 400;
                        jsonResponse($response, $code);
                        die();
                    }else{
                        $articulo = str_replace("_"," ",$articulo);
                        $data = $this->model->getProd($articulo);
                        if (empty($data)){
                            $response = array('status' =>false, 'msg' => 'No se encontraron datos');
                            $code = 200;
                        }else{
                            $response = array('status' =>true, 'msg' => 'Datos encontrados', 'data' => $data);
                            $code = 200;
                        }
                    }
                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response,$code);
                die();
            }
            catch (Exception $e){
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }

        }


        public function buscarArticulo($descrip)
        {
            try{
                $method = $_SERVER["REQUEST_METHOD"];
                $response =[];
                $code= 0;
                $data= [];
                if ($method == "GET"){

                    $descrip = str_replace("_"," ",$descrip);
                    if(empty($descrip)){
                        $response = array('status' =>false, 'msg' => 'La descripción del artículo es obligatoria');
                        $code = 400;
                        jsonResponse($response, $code);
                        die();
                    }else{
                        $descrip = str_replace("_"," ",$descrip);
                        $data = $this->model->searchProd($descrip);
                        if (empty($data)){
                            $response = array('status' =>false, 'msg' => 'No se encontraron datos');
                            $code = 200;
                        }else{
                            $response = array('status' =>true, 'msg' => 'Datos encontrados', 'data' => $data);
                            $code = 200;
                        }
                    }
                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response,$code);
                die();
            }
            catch (Exception $e){
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }

        }

        public function articulos()
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response = [];
                $code= 0;
                $data= [];
                if ($method == "GET")
                {
                    $data = json_decode(file_get_contents("php://input"),true);
                    $data = $this->model->getProds();
                    if (empty($data))
                    {
                        $response = array('status' =>false, 'msg' => 'No se encontraron datos');
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status' =>true, 'msg' => 'Datos encontrados', 'data' => $data);
                        $code = 200;
                    }
                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response,$code);
                die();
            }
            catch(Exception $e)
            {
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }
        }

        public function guardar()
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response = [];
                $code= 0;
                $data= [];
                if ($method == "POST")
                {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$this->validaDatos($data, $response, $code))
                    {
                        jsonResponse($response, $code);
                        die();

                    }
                    $articulo = !empty($data['articulo']) ? strClean($data['articulo']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $linea = !empty($data['linea']) ? strClean($data['linea']) : '';
                    $marca = !empty($data['marca']) ? strClean($data['marca']) : '';
                    $fabricante = !empty($data['fabricante']) ? strClean($data['fabricante']) : '';
                    $ubicacion = !empty($data['ubicacion']) ? strClean($data['ubicacion']) : '';
                    $impuesto = !empty($data['impuesto']) ? strClean($data['impuesto']) : '';
                    $costo = !empty($data['costo']) ? strClean($data['costo']) : '';
                    $precio1 = !empty($data['precio1']) ? strClean($data['precio1']) : '';
                    $precio2 = !empty($data['precio2']) ? strClean($data['precio2']) : '';
                    $precio3 = !empty($data['precio3']) ? strClean($data['precio3']) : '';
                    $precio4 = !empty($data['precio4']) ? strClean($data['precio4']) : '';
                    $precio5 = !empty($data['precio5']) ? strClean($data['precio5']) : '';
                    $precio6 = !empty($data['precio6']) ? strClean($data['precio6']) : '';
                    $precio7 = !empty($data['precio7']) ? strClean($data['precio7']) : '';
                    $precio8 = !empty($data['precio8']) ? strClean($data['precio8']) : '';
                    $precio9 = !empty($data['precio9']) ? strClean($data['precio9']) : '';
                    $precio10 = !empty($data['precio10']) ? strClean($data['precio10']) : '';  
                    // $existencia = !empty($data['existencia']) ? strClean($data['existencia']) : '';                 
                    $unidad = !empty($data['unidad']) ? strClean($data['unidad']) : '';
                    $minimo = !empty($data['minimo']) ? strClean($data['minimo']) : '';
                    $maximo = !empty($data['maximo']) ? strClean($data['maximo']) : '';
                    $observ = !empty($data['observ']) ? strClean($data['observ']) : '';
                    $kit = !empty($data['kit']) ? strClean($data['kit']) : '';
                    $serie = !empty($data['serie']) ? strClean($data['serie']) : '';
                    $lote = !empty($data['lote']) ? strClean($data['lote']) : '';
                    $invent = !empty($data['invent']) ? strClean($data['invent']) : '';
                    // $imagen = !empty($data['imagen']) ? strClean($data['imagen']) : '';
                    $paraventa = !empty($data['paraventa']) ? strClean($data['paraventa']) : '';
                    $curso = !empty($data['curso']) ? strClean($data['curso']) : '';
                    // $usufecha = !empty($data['usufecha']) ? strClean($data['usufecha']) : '';
                    // $usuhora = !empty($data['usuhora']) ? strClean($data['usuhora']) : '';
                    $exportado = !empty($data['exportado']) ? strClean($data['exportado']) : '';
                    $en_venta = !empty($data['en_venta']) ? strClean($data['en_venta']) : '';
                    $granel = !empty($data['granel']) ? strClean($data['granel']) : '';
                    $peso = !empty($data['peso']) ? strClean($data['peso']) : '';
                    $bajocosto = !empty($data['bajocosto']) ? strClean($data['bajocosto']) : '';
                    $bloqueado = !empty($data['bloqueado']) ? strClean($data['bloqueado']) : '';
                    $u1 = !empty($data['u1']) ? strClean($data['u1']) : '';
                    $u2 = !empty($data['u2']) ? strClean($data['u2']) : '';
                    $u3 = !empty($data['u3']) ? strClean($data['u3']) : '';
                    $u4 = !empty($data['u4']) ? strClean($data['u4']) : '';
                    $u5 = !empty($data['u5']) ? strClean($data['u5']) : '';
                    $u6 = !empty($data['u6']) ? strClean($data['u6']) : '';
                    $u7 = !empty($data['u7']) ? strClean($data['u7']) : '';
                    $u8 = !empty($data['u8']) ? strClean($data['u8']) : '';
                    $u9 = !empty($data['u9']) ? strClean($data['u9']) : '';
                    $u10 = !empty($data['u10']) ? strClean($data['u10']) : '';
                    $acaja = !empty($data['acaja']) ? strClean($data['acaja']) : '';
                    $modificaprecio = !empty($data['modificaprecio']) ? strClean($data['modificaprecio']) : '';
                    $fraccionario = !empty($data['fraccionario']) ? strClean($data['fraccionario']) : '';
                    $iespecial = !empty($data['iespecial']) ? strClean($data['iespecial']) : '';
                    $c2 = !empty($data['c2']) ? strClean($data['c2']) : '';
                    $c3 = !empty($data['c3']) ? strClean($data['c3']) : '';
                    $c4 = !empty($data['c4']) ? strClean($data['c4']) : '';
                    $c5 = !empty($data['c5']) ? strClean($data['c5']) : '';
                    $c6 = !empty($data['c6']) ? strClean($data['c6']) : '';
                    $c7 = !empty($data['c7']) ? strClean($data['c7']) : '';
                    $c8 = !empty($data['c8']) ? strClean($data['c8']) : '';
                    $c9 = !empty($data['c9']) ? strClean($data['c9']) : '';
                    $c10 = !empty($data['c10']) ? strClean($data['c10']) : '';
                    $modelo = !empty($data['modelo']) ? strClean($data['modelo']) : '';
                    $color = !empty($data['color']) ? strClean($data['color']) : '';
                    $talla = !empty($data['talla']) ? strClean($data['talla']) : '';
                    $speso = !empty($data['speso']) ? strClean($data['speso']) : '';
                    $etiqueta = !empty($data['etiqueta']) ? strClean($data['etiqueta']) : '';
                    $numero = !empty($data['numero']) ? strClean($data['numero']) : '';
                    $carton = !empty($data['carton']) ? strClean($data['carton']) : '';
                    $unidadrecibe = !empty($data['unidadrecibe']) ? strClean($data['unidadrecibe']) : '';
                    $unidadempaque = !empty($data['unidadempaque']) ? strClean($data['unidadempaque']) : '';
                    $sinvolumen = !empty($data['sinvolumen']) ? strClean($data['sinvolumen']) : '';
                    $presentacion = !empty($data['presentacion']) ? strClean($data['presentacion']) : '';
                    $servicio = !empty($data['servicio']) ? strClean($data['servicio']) : '';
                    $numeroservicios = !empty($data['numeroservicios']) ? strClean($data['numeroservicios']) : '';
                    $claveproveedor = !empty($data['claveproveedor']) ? strClean($data['claveproveedor']) : '';
                    $dp = !empty($data['dp']) ? strClean($data['dp']) : '';
                    $familia = !empty($data['familia']) ? strClean($data['familia']) : '';
                    $subfamilia = !empty($data['subfamilia']) ? strClean($data['subfamilia']) : '';
                    $subfam1 = !empty($data['subfam1']) ? strClean($data['subfam1']) : '';
                    $subfam2 = !empty($data['subfam2']) ? strClean($data['subfam2']) : '';
                    $preciousd = !empty($data['preciousd']) ? strClean($data['preciousd']) : '';
                    $costousd = !empty($data['costousd']) ? strClean($data['costousd']) : '';
                    $puntos = !empty($data['puntos']) ? strClean($data['puntos']) : '';
                    $autocodigo = !empty($data['autocodigo']) ? strClean($data['autocodigo']) : '';
                    $tiempoaire = !empty($data['tiempoaire']) ? strClean($data['tiempoaire']) : '';
                    $ensambladoenlinea = !empty($data['ensambladoenlinea']) ? strClean($data['ensambladoenlinea']) : '';
                    $claveprodserv = !empty($data['claveprodserv']) ? strClean($data['claveprodserv']) : '';
                    $claveunidad = !empty($data['claveunidad']) ? strClean($data['claveunidad']) : '';
                    $version = !empty($data['version']) ? strClean($data['version']) : '';
                    $GUID = !empty($data['GUID']) ? strClean($data['GUID']) : '';

                    $request = $this->model->setArticulo($articulo,
                                                         $descrip, 
                                                         $linea, 
                                                         $marca, 
                                                         $fabricante, 
                                                         $ubicacion, 
                                                         $impuesto, 
                                                         $costo, 
                                                         $precio1, 
                                                         $precio2, 
                                                         $precio3, 
                                                         $precio4, 
                                                         $precio5, 
                                                         $precio6, 
                                                         $precio7, 
                                                         $precio8, 
                                                         $precio9, 
                                                         $precio10, 
                                                         $unidad, 
                                                         $minimo, 
                                                         $maximo, 
                                                         $observ, 
                                                         $kit, 
                                                         $serie, 
                                                         $lote, 
                                                         $invent, 
                                                         $paraventa, 
                                                         $curso, 
                                                         $exportado, 
                                                         $en_venta, 
                                                         $granel, 
                                                         $peso, 
                                                         $bajocosto, 
                                                         $bloqueado, 
                                                         $u1, 
                                                         $u2, 
                                                         $u3, 
                                                         $u4, 
                                                         $u5, 
                                                         $u6, 
                                                         $u7, 
                                                         $u8, 
                                                         $u9, 
                                                         $u10, 
                                                         $acaja, 
                                                         $modificaprecio, 
                                                         $fraccionario, 
                                                         $iespecial, 
                                                         $c2, 
                                                         $c3, 
                                                         $c4, 
                                                         $c5, 
                                                         $c6, 
                                                         $c7, 
                                                         $c8, 
                                                         $c9, 
                                                         $c10, 
                                                         $modelo, 
                                                         $color, 
                                                         $talla, 
                                                         $speso,
                                                         $etiqueta, 
                                                         $numero, 
                                                         $carton, 
                                                         $unidadrecibe, 
                                                         $unidadempaque, 
                                                         $sinvolumen, 
                                                         $presentacion, 
                                                         $servicio, 
                                                         $numeroservicios, 
                                                         $claveproveedor, 
                                                         $dp, 
                                                         $familia, 
                                                         $subfamilia, 
                                                         $subfam1, 
                                                         $subfam2, 
                                                         $preciousd, 
                                                         $costousd, 
                                                         $puntos, 
                                                         $autocodigo, 
                                                         $tiempoaire, 
                                                         $ensambladoenlinea, 
                                                         $claveprodserv, 
                                                         $claveunidad, 
                                                         $version, 
                                                         $GUID);
                    if($request != "exist")
                    {
                        $arrProds = array('articulo'=>$articulo,
                                          'descrip'=>$descrip,
                                            'linea'=>$linea,
                                            'marca'=>$marca,
                                            'fabricante'=>$fabricante,
                                            'ubicacion'=>$ubicacion,
                                            'impuesto'=>$impuesto,
                                            'costo'=>$costo,
                                            'precio1'=>$precio1,
                                            'precio2'=>$precio2,
                                            'precio3'=>$precio3,
                                            'precio4'=>$precio4,
                                            'precio5'=>$precio5,
                                            'precio6'=>$precio6,
                                            'precio7'=>$precio7,
                                            'precio8'=>$precio8,
                                            'precio9'=>$precio9,
                                            'precio10'=>$precio10,
                                            'unidad'=>$unidad,
                                            'minimo'=>$minimo,
                                            'maximo'=>$maximo,
                                            'observ'=>$observ,
                                            'kit'=>$kit,
                                            'serie'=>$serie,
                                            'lote'=>$lote,
                                            'invent'=>$invent,
                                            'paraventa'=>$paraventa,
                                            'curso'=>$curso,
                                            'exportado'=>$exportado,
                                            'en_venta'=>$en_venta,
                                            'granel'=>$granel,
                                            'peso'=>$peso,
                                            'bajocosto'=>$bajocosto,
                                            'bloqueado'=>$bloqueado,
                                            'u1'=>$u1,
                                            'u2'=>$u2,
                                            'u3'=>$u3,
                                            'u4'=>$u4,
                                            'u5'=>$u5,
                                            'u6'=>$u6,
                                            'u7'=>$u7,
                                            'u8'=>$u8,
                                            'u9'=>$u9,
                                            'u10'=>$u10,
                                            'acaja'=>$acaja,
                                            'modificaprecio'=>$modificaprecio,
                                            'fraccionario'=>$fraccionario,
                                            'iespecial'=>$iespecial,
                                            'c2'=>$c2,
                                            'c3'=>$c3,
                                            'c4'=>$c4,
                                            'c5'=>$c5,
                                            'c6'=>$c6,
                                            'c7'=>$c7,
                                            'c8'=>$c8,
                                            'c9'=>$c9,
                                            'c10'=>$c10,
                                            'modelo'=>$modelo,
                                            'color'=>$color,
                                            'talla'=>$talla,
                                            'speso'=>$speso,
                                            'etiqueta'=>$etiqueta,
                                            'numero'=>$numero,
                                            'carton'=>$carton,
                                            'unidadrecibe'=>$unidadrecibe,
                                            'unidadempaque'=>$unidadempaque,
                                            'sinvolumen'=>$sinvolumen,
                                            'presentacion'=>$presentacion,
                                            'servicio'=>$servicio,
                                            'numeroservicios'=>$numeroservicios,
                                            'claveproveedor'=>$claveproveedor,
                                            'dp'=>$dp,
                                            'familia'=>$familia,
                                            'subfamilia'=>$subfamilia,
                                            'subfam1'=>$subfam1,
                                            'subfam2'=>$subfam2,
                                            'preciousd'=>$preciousd,
                                            'costousd'=>$costousd,
                                            'puntos'=>$puntos,
                                            'autocodigo'=>$autocodigo,
                                            'tiempoaire'=>$tiempoaire,
                                            'ensambladoenlinea'=>$ensambladoenlinea,
                                            'claveprodserv'=>$claveprodserv,
                                            'claveunidad'=>$claveunidad,
                                            'version'=>$version,
                                            'GUID'=>$GUID);
                        $response = array('status' =>false, 'msg' => 'Artículo guardado correctamente', 'data' => $arrProds);
                        $code = 200;                    
                    }
                    else
                    {
                        $request = $this->model->putProds($articulo, 
                                                           $descrip, 
                                                           $linea, 
                                                           $marca, 
                                                           $fabricante, 
                                                           $ubicacion, 
                                                           $impuesto, 
                                                           $costo, 
                                                           $precio1, 
                                                           $precio2, 
                                                           $precio3,
                                                           $precio4, 
                                                           $precio5, 
                                                           $precio6, 
                                                           $precio7,
                                                           $precio8, 
                                                           $precio9, 
                                                           $precio10, 
                                                           $unidad, 
                                                           $minimo, 
                                                           $maximo, 
                                                           $observ, 
                                                           $kit, 
                                                           $serie, 
                                                           $lote, 
                                                           $invent, 
                                                           $paraventa, 
                                                           $curso, 
                                                           $exportado, 
                                                           $en_venta, 
                                                           $granel, 
                                                           $peso, 
                                                           $bajocosto, 
                                                           $bloqueado, 
                                                           $u1, 
                                                           $u2, 
                                                           $u3, 
                                                           $u4, 
                                                           $u5, 
                                                           $u6, 
                                                           $u7, 
                                                           $u8, 
                                                           $u9, 
                                                           $u10, 
                                                           $acaja, 
                                                           $modificaprecio, 
                                                           $fraccionario, 
                                                           $iespecial, 
                                                           $c2, 
                                                           $c3, 
                                                           $c4, 
                                                           $c5, 
                                                           $c6, 
                                                           $c7, 
                                                           $c8, 
                                                           $c9, 
                                                           $c10, 
                                                           $modelo, 
                                                           $color, 
                                                           $talla, 
                                                           $speso, 
                                                           $etiqueta, 
                                                           $numero, 
                                                           $carton, 
                                                           $unidadrecibe, 
                                                           $unidadempaque, 
                                                           $sinvolumen, 
                                                           $presentacion, 
                                                           $servicio, 
                                                           $numeroservicios, 
                                                           $claveproveedor, 
                                                           $dp, 
                                                           $familia, 
                                                           $subfamilia, 
                                                           $subfam1, 
                                                           $subfam2, 
                                                           $preciousd, 
                                                           $costousd, 
                                                           $puntos, 
                                                           $autocodigo, 
                                                           $tiempoaire, 
                                                           $ensambladoenlinea, 
                                                           $claveprodserv, 
                                                           $claveunidad, 
                                                           $version, 
                                                           $GUID);

                        if($request)
                        {
                            $arrProds = array('articulo'=>$articulo,
                                              'descrip'=>$descrip,
                                                'linea'=>$linea,
                                                'marca'=>$marca,
                                                'fabricante'=>$fabricante,
                                                'ubicacion'=>$ubicacion,
                                                'impuesto'=>$impuesto,
                                                'costo'=>$costo,
                                                'precio1'=>$precio1,
                                                'precio2'=>$precio2,
                                                'precio3'=>$precio3,
                                                'precio4'=>$precio4,
                                                'precio5'=>$precio5,
                                                'precio6'=>$precio6,
                                                'precio7'=>$precio7,
                                                'precio8'=>$precio8,
                                                'precio9'=>$precio9,
                                                'precio10'=>$precio10,
                                                'unidad'=>$unidad,
                                                'minimo'=>$minimo,
                                                'maximo'=>$maximo,
                                                'observ'=>$observ,
                                                'kit'=>$kit,
                                                'serie'=>$serie,
                                                'lote'=>$lote,
                                                'invent'=>$invent,
                                                'paraventa'=>$paraventa,
                                                'curso'=>$curso,
                                                'exportado'=>$exportado,
                                                'en_venta'=>$en_venta,
                                                'granel'=>$granel,
                                                'peso'=>$peso,
                                                'bajocosto'=>$bajocosto,
                                                'bloqueado'=>$bloqueado,
                                                'u1'=>$u1,
                                                'u2'=>$u2,
                                                'u3'=>$u3,
                                                'u4'=>$u4,
                                                'u5'=>$u5,
                                                'u6'=>$u6,
                                                'u7'=>$u7,
                                                'u8'=>$u8,
                                                'u9'=>$u9,
                                                'u10'=>$u10,
                                                'acaja'=>$acaja,
                                                'modificaprecio'=>$modificaprecio,
                                                'fraccionario'=>$fraccionario,
                                                'iespecial'=>$iespecial,
                                                'c2'=>$c2,
                                                'c3'=>$c3,
                                                'c4'=>$c4,
                                                'c5'=>$c5,
                                                'c6'=>$c6,
                                                'c7'=>$c7,
                                                'c8'=>$c8,
                                                'c9'=>$c9,
                                                'c10'=>$c10,
                                                'modelo'=>$modelo,
                                                'color'=>$color,
                                                'talla'=>$talla,
                                                'speso'=>$speso,
                                                'etiqueta'=>$etiqueta,
                                                'numero'=>$numero,
                                                'carton'=>$carton,
                                                'unidadrecibe'=>$unidadrecibe,
                                                'unidadempaque'=>$unidadempaque,
                                                'sinvolumen'=>$sinvolumen,
                                                'presentacion'=>$presentacion,
                                                'servicio'=>$servicio,
                                                'numeroservicios'=>$numeroservicios,
                                                'claveproveedor'=>$claveproveedor,
                                                'dp'=>$dp,
                                                'familia'=>$familia,
                                                'subfamilia'=>$subfamilia,
                                                'subfam1'=>$subfam1,
                                                'subfam2'=>$subfam2,
                                                'preciousd'=>$preciousd,
                                                'costousd'=>$costousd,
                                                'puntos'=>$puntos,
                                                'autocodigo'=>$autocodigo,
                                                'tiempoaire'=>$tiempoaire,
                                                'ensambladoenlinea'=>$ensambladoenlinea,
                                                'claveprodserv'=>$claveprodserv,
                                                'claveunidad'=>$claveunidad,
                                                'version'=>$version,
                                                'GUID'=>$GUID);
                            $response = array('status' =>false, 'msg' => 'Artículo actualizado correctamente', 'data' => $arrProds);
                        }
                        $code = 200;
                    }
                   
                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response, $code);
                die();   
            }
            catch(Exception $e)
            {
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }
        }

        public function registrar()
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response = [];
                $code= 0;
                $data= [];
                if ($method == "POST")
                {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$this->validaDatos($data, $response, $code))
                    {
                        jsonResponse($response, $code);
                        die();

                    }
                    $articulo = !empty($data['articulo']) ? strClean($data['articulo']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $linea = !empty($data['linea']) ? strClean($data['linea']) : '';
                    $marca = !empty($data['marca']) ? strClean($data['marca']) : '';
                    $fabricante = !empty($data['fabricante']) ? strClean($data['fabricante']) : '';
                    $ubicacion = !empty($data['ubicacion']) ? strClean($data['ubicacion']) : '';
                    $impuesto = !empty($data['impuesto']) ? strClean($data['impuesto']) : '';
                    $costo = !empty($data['costo']) ? strClean($data['costo']) : '';
                    $precio1 = !empty($data['precio1']) ? strClean($data['precio1']) : '';
                    $precio2 = !empty($data['precio2']) ? strClean($data['precio2']) : '';
                    $precio3 = !empty($data['precio3']) ? strClean($data['precio3']) : '';
                    $precio4 = !empty($data['precio4']) ? strClean($data['precio4']) : '';
                    $precio5 = !empty($data['precio5']) ? strClean($data['precio5']) : '';
                    $precio6 = !empty($data['precio6']) ? strClean($data['precio6']) : '';
                    $precio7 = !empty($data['precio7']) ? strClean($data['precio7']) : '';
                    $precio8 = !empty($data['precio8']) ? strClean($data['precio8']) : '';
                    $precio9 = !empty($data['precio9']) ? strClean($data['precio9']) : '';
                    $precio10 = !empty($data['precio10']) ? strClean($data['precio10']) : '';
                    $unidad = !empty($data['unidad']) ? strClean($data['unidad']) : '';
                    $minimo = !empty($data['minimo']) ? strClean($data['minimo']) : '';
                    $maximo = !empty($data['maximo']) ? strClean($data['maximo']) : '';
                    $observ = !empty($data['observ']) ? strClean($data['observ']) : '';
                    $kit = !empty($data['kit']) ? strClean($data['kit']) : '';
                    $serie = !empty($data['serie']) ? strClean($data['serie']) : '';
                    $lote = !empty($data['lote']) ? strClean($data['lote']) : '';
                    $invent = !empty($data['invent']) ? strClean($data['invent']) : '';
                    $paraventa = !empty($data['paraventa']) ? strClean($data['paraventa']) : '';
                    $curso = !empty($data['curso']) ? strClean($data['curso']) : '';
                    $exportado = !empty($data['exportado']) ? strClean($data['exportado']) : '';
                    $en_venta = !empty($data['en_venta']) ? strClean($data['en_venta']) : '';
                    $granel = !empty($data['granel']) ? strClean($data['granel']) : '';
                    $peso = !empty($data['peso']) ? strClean($data['peso']) : '';
                    $bajocosto = !empty($data['bajocosto']) ? strClean($data['bajocosto']) : '';
                    $bloqueado = !empty($data['bloqueado']) ? strClean($data['bloqueado']) : '';
                    $u1 = !empty($data['u1']) ? strClean($data['u1']) : '';
                    $u2 = !empty($data['u2']) ? strClean($data['u2']) : '';
                    $u3 = !empty($data['u3']) ? strClean($data['u3']) : '';
                    $u4 = !empty($data['u4']) ? strClean($data['u4']) : '';
                    $u5 = !empty($data['u5']) ? strClean($data['u5']) : '';
                    $u6 = !empty($data['u6']) ? strClean($data['u6']) : '';
                    $u7 = !empty($data['u7']) ? strClean($data['u7']) : '';
                    $u8 = !empty($data['u8']) ? strClean($data['u8']) : '';
                    $u9 = !empty($data['u9']) ? strClean($data['u9']) : '';
                    $u10 = !empty($data['u10']) ? strClean($data['u10']) : '';
                    $acaja = !empty($data['acaja']) ? strClean($data['acaja']) : '';
                    $modificaprecio = !empty($data['modificaprecio']) ? strClean($data['modificaprecio']) : '';
                    $fraccionario = !empty($data['fraccionario']) ? strClean($data['fraccionario']) : '';
                    $iespecial = !empty($data['iespecial']) ? strClean($data['iespecial']) : '';
                    $c2 = !empty($data['c2']) ? strClean($data['c2']) : '';
                    $c3 = !empty($data['c3']) ? strClean($data['c3']) : '';
                    $c4 = !empty($data['c4']) ? strClean($data['c4']) : '';
                    $c5 = !empty($data['c5']) ? strClean($data['c5']) : '';
                    $c6 = !empty($data['c6']) ? strClean($data['c6']) : '';
                    $c7 = !empty($data['c7']) ? strClean($data['c7']) : '';
                    $c8 = !empty($data['c8']) ? strClean($data['c8']) : '';
                    $c9 = !empty($data['c9']) ? strClean($data['c9']) : '';
                    $c10 = !empty($data['c10']) ? strClean($data['c10']) : '';
                    $modelo = !empty($data['modelo']) ? strClean($data['modelo']) : '';
                    $color = !empty($data['color']) ? strClean($data['color']) : '';
                    $talla = !empty($data['talla']) ? strClean($data['talla']) : '';
                    $speso = !empty($data['speso']) ? strClean($data['speso']) : '';
                    $etiqueta = !empty($data['etiqueta']) ? strClean($data['etiqueta']) : '';
                    $numero = !empty($data['numero']) ? strClean($data['numero']) : '';
                    $carton = !empty($data['carton']) ? strClean($data['carton']) : '';
                    $unidadrecibe = !empty($data['unidadrecibe']) ? strClean($data['unidadrecibe']) : '';
                    $unidadempaque = !empty($data['unidadempaque']) ? strClean($data['unidadempaque']) : '';
                    $sinvolumen = !empty($data['sinvolumen']) ? strClean($data['sinvolumen']) : '';
                    $presentacion = !empty($data['presentacion']) ? strClean($data['presentacion']) : '';
                    $servicio = !empty($data['servicio']) ? strClean($data['servicio']) : '';
                    $numeroservicios = !empty($data['numeroservicios']) ? strClean($data['numeroservicios']) : '';
                    $claveproveedor = !empty($data['claveproveedor']) ? strClean($data['claveproveedor']) : '';
                    $dp = !empty($data['dp']) ? strClean($data['dp']) : '';
                    $familia = !empty($data['familia']) ? strClean($data['familia']) : '';
                    $subfamilia = !empty($data['subfamilia']) ? strClean($data['subfamilia']) : '';
                    $subfam1 = !empty($data['subfam1']) ? strClean($data['subfam1']) : '';
                    $subfam2 = !empty($data['subfam2']) ? strClean($data['subfam2']) : '';
                    $preciousd = !empty($data['preciousd']) ? strClean($data['preciousd']) : '';
                    $costousd = !empty($data['costousd']) ? strClean($data['costousd']) : '';
                    $puntos = !empty($data['puntos']) ? strClean($data['puntos']) : '';
                    $autocodigo = !empty($data['autocodigo']) ? strClean($data['autocodigo']) : '';
                    $tiempoaire = !empty($data['tiempoaire']) ? strClean($data['tiempoaire']) : '';
                    $ensambladoenlinea = !empty($data['ensambladoenlinea']) ? strClean($data['ensambladoenlinea']) : '';
                    $claveprodserv = !empty($data['claveprodserv']) ? strClean($data['claveprodserv']) : '';
                    $claveunidad = !empty($data['claveunidad']) ? strClean($data['claveunidad']) : '';
                    $version = !empty($data['version']) ? strClean($data['version']) : '';
                    $GUID = !empty($data['GUID']) ? strClean($data['GUID']) : '';

                    $request = $this->model->setProds($articulo, $descrip, $linea, $marca, $fabricante, $ubicacion, $impuesto, $costo, $precio1, $precio2, $precio3, $precio4, $precio5, $precio6, $precio7, $precio8, $precio9, $precio10, $unidad, $minimo, $maximo, $observ, $kit, $serie, $lote, $invent, $paraventa, $curso, $exportado, $en_venta, $granel, $peso, $bajocosto, $bloqueado, $u1, $u2, $u3, $u4, $u5, $u6, $u7, $u8, $u9, $u10, $acaja, $modificaprecio, $fraccionario, $iespecial, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $modelo, $color, $talla, $speso, $etiqueta, $numero, $carton, $unidadrecibe, $unidadempaque, $sinvolumen, $presentacion, $servicio, $numeroservicios, $claveproveedor, $dp, $familia, $subfamilia, $subfam1, $subfam2, $preciousd, $costousd, $puntos, $autocodigo, $tiempoaire, $ensambladoenlinea, $claveprodserv, $claveunidad, $version, $GUID);
                    
                    if($request!="exist")
                    {
                        $arrProds = array('articulo'=>$articulo, 'descrip'=>$descrip, 'linea'=>$linea, 'marca'=>$marca, 'fabricante'=>$fabricante, 'ubicacion'=>$ubicacion, 'impuesto'=>$impuesto, 'costo'=>$costo, 'precio1'=>$precio1, 'precio2'=>$precio2, 'precio3'=>$precio3, 'precio4'=>$precio4, 'precio5'=>$precio5, 'precio6'=>$precio6, 'precio7'=>$precio7, 'precio8'=>$precio8, 'precio9'=>$precio9, 'precio10'=>$precio10, 'unidad'=>$unidad, 'minimo'=>$minimo, 'maximo'=>$maximo, 'observ'=>$observ, 'kit'=>$kit, 'serie'=>$serie, 'lote'=>$lote, 'invent'=>$invent, 'paraventa'=>$paraventa, 'curso'=>$curso, 'exportado'=>$exportado, 'en_venta'=>$en_venta, 'granel'=>$granel, 'peso'=>$peso, 'bajocosto'=>$bajocosto, 'bloqueado'=>$bloqueado, 'u1'=>$u1, 'u2'=>$u2, 'u3'=>$u3, 'u4'=>$u4, 'u5'=>$u5, 'u6'=>$u6, 'u7'=>$u7, 'u8'=>$u8, 'u9'=>$u9, 'u10'=>$u10, 'acaja'=>$acaja, 'modificaprecio'=>$modificaprecio, 'fraccionario'=>$fraccionario, 'iespecial'=>$iespecial, 'c2'=>$c2, 'c3'=>$c3, 'c4'=>$c4, 'c5'=>$c5, 'c6'=>$c6, 'c7'=>$c7, 'c8'=>$c8, 'c9'=>$c9, 'c10'=>$c10, 'modelo'=>$modelo, 'color'=>$color, 'talla'=>$talla, 'speso'=>$speso, 'etiqueta'=>$etiqueta, 'numero'=>$numero, 'carton'=>$carton, 'unidadrecibe'=>$unidadrecibe, 'unidadempaque'=>$unidadempaque, 'sinvolumen'=>$sinvolumen, 'presentacion'=>$presentacion, 'servicio'=>$servicio, 'numeroservicios'=>$numeroservicios, 'claveproveedor'=>$claveproveedor, 'dp'=>$dp, 'familia'=>$familia, 'subfamilia'=>$subfamilia, 'subfam1'=>$subfam1, 'subfam2'=>$subfam2, 'preciousd'=>$preciousd, 'costousd'=>$costousd, 'puntos'=>$puntos, 'autocodigo'=>$autocodigo, 'tiempoaire'=>$tiempoaire, 'ensambladoenlinea'=>$ensambladoenlinea, 'claveprodserv'=>$claveprodserv, 'claveunidad'=>$claveunidad, 'version'=>$version, 'GUID'=>$GUID);
                        $response = array('status' =>false, 'msg' => 'Artículo guardado correctamente', 'data' => $arrProds);
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status' =>false, 'msg' => 'Artículo ya existe');
                        $code = 200;
                    }

                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response, $code);
                die();

            }
            catch(Exception $e)
            {
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }
        }

        public function actualizar()
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response = [];
                $code= 0;
                $data= [];
                if ($method == "PUT")
                {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$this->validaDatos($data, $response, $code))
                    {
                        jsonResponse($response, $code);
                        die();

                    }
                    $articulo = !empty($data['articulo']) ? strClean($data['articulo']) : '';
                    $descrip = !empty($data['descrip']) ? strClean($data['descrip']) : '';
                    $linea = !empty($data['linea']) ? strClean($data['linea']) : '';
                    $marca = !empty($data['marca']) ? strClean($data['marca']) : '';
                    $fabricante = !empty($data['fabricante']) ? strClean($data['fabricante']) : '';
                    $ubicacion = !empty($data['ubicacion']) ? strClean($data['ubicacion']) : '';
                    $impuesto = !empty($data['impuesto']) ? strClean($data['impuesto']) : '';
                    $costo = !empty($data['costo']) ? strClean($data['costo']) : '';
                    $precio1 = !empty($data['precio1']) ? strClean($data['precio1']) : '';
                    $precio2 = !empty($data['precio2']) ? strClean($data['precio2']) : '';
                    $precio3 = !empty($data['precio3']) ? strClean($data['precio3']) : '';
                    $precio4 = !empty($data['precio4']) ? strClean($data['precio4']) : '';
                    $precio5 = !empty($data['precio5']) ? strClean($data['precio5']) : '';
                    $precio6 = !empty($data['precio6']) ? strClean($data['precio6']) : '';
                    $precio7 = !empty($data['precio7']) ? strClean($data['precio7']) : '';
                    $precio8 = !empty($data['precio8']) ? strClean($data['precio8']) : '';
                    $precio9 = !empty($data['precio9']) ? strClean($data['precio9']) : '';
                    $precio10 = !empty($data['precio10']) ? strClean($data['precio10']) : '';
                    $unidad = !empty($data['unidad']) ? strClean($data['unidad']) : '';
                    $minimo = !empty($data['minimo']) ? strClean($data['minimo']) : '';
                    $maximo = !empty($data['maximo']) ? strClean($data['maximo']) : '';
                    $observ = !empty($data['observ']) ? strClean($data['observ']) : '';
                    $kit = !empty($data['kit']) ? strClean($data['kit']) : '';
                    $serie = !empty($data['serie']) ? strClean($data['serie']) : '';
                    $lote = !empty($data['lote']) ? strClean($data['lote']) : '';
                    $invent = !empty($data['invent']) ? strClean($data['invent']) : '';
                    $paraventa = !empty($data['paraventa']) ? strClean($data['paraventa']) : '';
                    $curso = !empty($data['curso']) ? strClean($data['curso']) : '';

                    $exportado = !empty($data['exportado']) ? strClean($data['exportado']) : '';
                    $en_venta = !empty($data['en_venta']) ? strClean($data['en_venta']) : '';
                    $granel = !empty($data['granel']) ? strClean($data['granel']) : '';
                    $peso = !empty($data['peso']) ? strClean($data['peso']) : '';
                    $bajocosto = !empty($data['bajocosto']) ? strClean($data['bajocosto']) : '';
                    $bloqueado = !empty($data['bloqueado']) ? strClean($data['bloqueado']) : '';
                    $u1 = !empty($data['u1']) ? strClean($data['u1']) : '';
                    $u2 = !empty($data['u2']) ? strClean($data['u2']) : '';
                    $u3 = !empty($data['u3']) ? strClean($data['u3']) : '';
                    $u4 = !empty($data['u4']) ? strClean($data['u4']) : '';
                    $u5 = !empty($data['u5']) ? strClean($data['u5']) : '';
                    $u6 = !empty($data['u6']) ? strClean($data['u6']) : '';
                    $u7 = !empty($data['u7']) ? strClean($data['u7']) : '';
                    $u8 = !empty($data['u8']) ? strClean($data['u8']) : '';
                    $u9 = !empty($data['u9']) ? strClean($data['u9']) : '';
                    $u10 = !empty($data['u10']) ? strClean($data['u10']) : '';
                    $acaja = !empty($data['acaja']) ? strClean($data['acaja']) : '';
                    $modificaprecio = !empty($data['modificaprecio']) ? strClean($data['modificaprecio']) : '';
                    $fraccionario = !empty($data['fraccionario']) ? strClean($data['fraccionario']) : '';
                    $iespecial = !empty($data['iespecial']) ? strClean($data['iespecial']) : '';
                    $c2 = !empty($data['c2']) ? strClean($data['c2']) : '';
                    $c3 = !empty($data['c3']) ? strClean($data['c3']) : '';
                    $c4 = !empty($data['c4']) ? strClean($data['c4']) : '';
                    $c5 = !empty($data['c5']) ? strClean($data['c5']) : '';
                    $c6 = !empty($data['c6']) ? strClean($data['c6']) : '';
                    $c7 = !empty($data['c7']) ? strClean($data['c7']) : '';
                    $c8 = !empty($data['c8']) ? strClean($data['c8']) : '';
                    $c9 = !empty($data['c9']) ? strClean($data['c9']) : '';
                    $c10 = !empty($data['c10']) ? strClean($data['c10']) : '';
                    $modelo = !empty($data['modelo']) ? strClean($data['modelo']) : '';
                    $color = !empty($data['color']) ? strClean($data['color']) : '';
                    $talla = !empty($data['talla']) ? strClean($data['talla']) : '';
                    $speso = !empty($data['speso']) ? strClean($data['speso']) : '';
                    $etiqueta = !empty($data['etiqueta']) ? strClean($data['etiqueta']) : '';
                    $numero = !empty($data['numero']) ? strClean($data['numero']) : '';
                    $carton = !empty($data['carton']) ? strClean($data['carton']) : '';
                    $unidadrecibe = !empty($data['unidadrecibe']) ? strClean($data['unidadrecibe']) : '';
                    $unidadempaque = !empty($data['unidadempaque']) ? strClean($data['unidadempaque']) : '';
                    $sinvolumen = !empty($data['sinvolumen']) ? strClean($data['sinvolumen']) : '';
                    $presentacion = !empty($data['presentacion']) ? strClean($data['presentacion']) : '';
                    $servicio = !empty($data['servicio']) ? strClean($data['servicio']) : '';
                    $numeroservicios = !empty($data['numeroservicios']) ? strClean($data['numeroservicios']) : '';
                    $claveproveedor = !empty($data['claveproveedor']) ? strClean($data['claveproveedor']) : '';
                    $dp = !empty($data['dp']) ? strClean($data['dp']) : '';
                    $familia = !empty($data['familia']) ? strClean($data['familia']) : '';
                    $subfamilia = !empty($data['subfamilia']) ? strClean($data['subfamilia']) : '';
                    $subfam1 = !empty($data['subfam1']) ? strClean($data['subfam1']) : '';
                    $subfam2 = !empty($data['subfam2']) ? strClean($data['subfam2']) : '';
                    $preciousd = !empty($data['preciousd']) ? strClean($data['preciousd']) : '';
                    $costousd = !empty($data['costousd']) ? strClean($data['costousd']) : '';
                    $puntos = !empty($data['puntos']) ? strClean($data['puntos']) : '';
                    $autocodigo = !empty($data['autocodigo']) ? strClean($data['autocodigo']) : '';
                    $tiempoaire = !empty($data['tiempoaire']) ? strClean($data['tiempoaire']) : '';
                    $ensambladoenlinea = !empty($data['ensambladoenlinea']) ? strClean($data['ensambladoenlinea']) : '';
                    $claveprodserv = !empty($data['claveprodserv']) ? strClean($data['claveprodserv']) : '';
                    $claveunidad = !empty($data['claveunidad']) ? strClean($data['claveunidad']) : '';
                    $version = !empty($data['version']) ? strClean($data['version']) : '';
                    $GUID = !empty($data['GUID']) ? strClean($data['GUID']) : '';

                    $request = $this->model->putProds($articulo, $descrip, $linea, $marca, $fabricante, $ubicacion, $impuesto, $costo, $precio1, $precio2, $precio3, $precio4, $precio5, $precio6, $precio7, $precio8, $precio9, $precio10, $unidad, $minimo, $maximo, $observ, $kit, $serie, $lote, $invent, $paraventa, $curso, $exportado, $en_venta, $granel, $peso, $bajocosto, $bloqueado, $u1, $u2, $u3, $u4, $u5, $u6, $u7, $u8, $u9, $u10, $acaja, $modificaprecio, $fraccionario, $iespecial, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $modelo, $color, $talla, $speso, $etiqueta, $numero, $carton, $unidadrecibe, $unidadempaque, $sinvolumen, $presentacion, $servicio, $numeroservicios, $claveproveedor, $dp, $familia, $subfamilia, $subfam1, $subfam2, $preciousd, $costousd, $puntos, $autocodigo, $tiempoaire, $ensambladoenlinea, $claveprodserv, $claveunidad, $version, $GUID);  
                    if($request)
                    {
                        $arrProds = array('articulo'=>$articulo, 'descrip'=>$descrip, 'linea'=>$linea, 'marca'=>$marca, 'fabricante'=>$fabricante, 'ubicacion'=>$ubicacion, 'impuesto'=>$impuesto, 'costo'=>$costo, 'precio1'=>$precio1, 'precio2'=>$precio2, 'precio3'=>$precio3, 'precio4'=>$precio4, 'precio5'=>$precio5, 'precio6'=>$precio6, 'precio7'=>$precio7, 'precio8'=>$precio8, 'precio9'=>$precio9, 'precio10'=>$precio10, 'unidad'=>$unidad, 'minimo'=>$minimo, 'maximo'=>$maximo, 'observ'=>$observ, 'kit'=>$kit, 'serie'=>$serie, 'lote'=>$lote, 'invent'=>$invent, 'paraventa'=>$paraventa, 'curso'=>$curso, 'exportado'=>$exportado, 'en_venta'=>$en_venta, 'granel'=>$granel, 'peso'=>$peso, 'bajocosto'=>$bajocosto, 'bloqueado'=>$bloqueado, 'u1'=>$u1, 'u2'=>$u2, 'u3'=>$u3, 'u4'=>$u4, 'u5'=>$u5, 'u6'=>$u6, 'u7'=>$u7, 'u8'=>$u8, 'u9'=>$u9, 'u10'=>$u10, 'acaja'=>$acaja, 'modificaprecio'=>$modificaprecio, 'fraccionario'=>$fraccionario, 'iespecial'=>$iespecial, 'c2'=>$c2, 'c3'=>$c3, 'c4'=>$c4, 'c5'=>$c5, 'c6'=>$c6, 'c7'=>$c7, 'c8'=>$c8, 'c9'=>$c9, 'c10'=>$c10, 'modelo'=>$modelo, 'color'=>$color, 'talla'=>$talla, 'speso'=>$speso, 'etiqueta'=>$etiqueta, 'numero'=>$numero, 'carton'=>$carton, 'unidadrecibe'=>$unidadrecibe, 'unidadempaque'=>$unidadempaque, 'sinvolumen'=>$sinvolumen, 'presentacion'=>$presentacion, 'servicio'=>$servicio, 'numeroservicios'=>$numeroservicios, 'claveproveedor'=>$claveproveedor, 'dp'=>$dp, 'familia'=>$familia, 'subfamilia'=>$subfamilia, 'subfam1'=>$subfam1, 'subfam2'=>$subfam2, 'preciousd'=>$preciousd, 'costousd'=>$costousd, 'puntos'=>$puntos, 'autocodigo'=>$autocodigo, 'tiempoaire'=>$tiempoaire, 'ensambladoenlinea'=>$ensambladoenlinea, 'claveprodserv'=>$claveprodserv, 'claveunidad'=>$claveunidad, 'version'=>$version, 'GUID'=>$GUID);    
                        $response = array('status' =>false, 'msg' => 'Artículo actualizado correctamente', 'data' => $arrProds);
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status' =>false, 'msg' => 'Artículo no existe');
                        $code = 200;
                    }

                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response, $code);
                die();
            }
            catch(Exception $e)
            {
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }
        }

        public function eliminar($articulo)
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response = [];
                $code= 0;
                $data= [];
                if ($method == "DELETE")
                {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$this->validaDatos($data, $response, $code))
                    {
                        jsonResponse($response, $code);
                        die();

                    }
                    
                    $articulo = str_replace("_"," ",$articulo);
                    $request = $this->model->delProds($articulo);
                    if($request)
                    {
                        $response = array('status' =>false, 'msg' => 'Artículo eliminado correctamente');
                        $code = 200;
                    }
                    else
                    {
                        $response = array('status' =>false, 'msg' => 'Artículo no existe');
                        $code = 200;
                    }

                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response, $code);
                die();
            }
            catch(Exception $e)
            {
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }
        }

        private function validaDatos($data, &$response, &$code) 
        {
            return true;
        }

        public function guardaProd($data)
        {
            try
            {
                $method = $_SERVER["REQUEST_METHOD"];
                $response = [];
                $code= 0;
                $data= [];
                if ($method == "POST")
                {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$this->validaDatos($data, $response, $code))
                    {
                        jsonResponse($response, $code);
                        die();

                    }
                    
                    $articulo = !empty($data['articulo']) ? strClean($data['articulo']) : '';
                    if(empty($articulo)){
                        $response = array('status' =>false, 'msg' => 'La clave del artículo es obligatoria ' . $articulo);
                        $code = 400;
                        jsonResponse($response, $code);
                        die();
                    }
                    $request = $this->model->saveProds($data);

                    if (is_countable($request) && count($request) > 0)
                    {
                        $respuesta=$request['mensaje'];
                        $arrProds = $this->model->getProd($articulo);
                        if (empty($arrProds)){
                            $response = array('status' =>false, 'msg' => $respuesta . $request);
                            $code = 200;

                        }
                        else{
                            $response = array('status' =>true, 'msg' => $respuesta, 'data' => $arrProds);
                            $code = 200;
                        }
                    }
                    else
                    {
                        $response = array('status' =>false, 'msg' => 'Artículo no existe ' . $request);
                        $code = 200;
                    }

                }
                else
                {
                    $response = array('status' =>false, 'msg' => 'Método no permitido');
                    $code = 405;
                }
                jsonResponse($response, $code);
                die();
            }
            catch(Exception $e)
            {
                $response = array('status' =>false, 'msg' => $e->getMessage());
                $code = 500;
            }
        }

}




?>