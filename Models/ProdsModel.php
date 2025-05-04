<?php

    class ProdsModel extends Mysql
    {
       private $articulo;
       private $descrip;

       private $linea;

       private $marca;

       private $fabricante;
       private $ubicacion;
       private $impuesto;

       private $costo;
       private $precio1;
         private $precio2;
            private $precio3;
            private $precio4;
            private $precio5;
            private $precio6;
            private $precio7;
            private $precio8;
            private $precio9;
            private $precio10;

            private $existencia;

            private $unidad;
            private $minimo;
            private $maximo;
            private $observ;
            private $kit;
            private $serie;
            private $lote;
            private $invent;
            private $imagen;
            private $paraventa;
            private $curso;
            private $usufecha;
            private $usuhora;
            private $exportado;
            private $en_venta;
            private $granel;
            private $peso;
            private $bajocosto;
            private $bloqueado;
            private $u1;
            private $u2;
            private $u3;
            private $u4;
            private $u5;
            private $u6;
            private $u7;
            private $u8;
            private $u9;
            private $u10;

            private $acaja;
            private $modificaprecio;
            private $fraccionario;
            private $iespecial;
            private $c2;
            private $c3;
            private $c4;
            private $c5;
            private $c6;
            private $c7;
            private $c8;
            private $c9;
            private $c10;
            private $modelo;
            private $color;
            private $talla;
            private $speso;
            private $etiqueta;
            private $numero;
            private $carton;
            private $unidadrecibe;
            private $unidadempaque;
            private $sinvolumen;
            private $presentacion;
            private $servicio;
            private $numeroservicios;
            private $claveproveedor;
            private $dp;
            private $familia;
            private $subfamilia;
            private $subfam1;
            private $subfam2;
            private $preciousd;
            private $costousd;
            private $puntos;
            private $autocodigo;
            private $tiempoaire;
            private $ensambladoenlinea;
            private $claveprodserv;
            private $claveunidad;
            private $version;
            private $GUID;



       
        public function __construct()
        {
            parent::__construct();
        }

        public function setProds(string $articulo, string $descrip, string $linea, string $marca, string $fabricante, string $ubicacion, string $impuesto, float $costo, float $precio1, float $precio2, float $precio3, float $precio4, float $precio5, float $precio6, float $precio7, float $precio8, float $precio9, float $precio10, float $existencia, string $unidad, float $minimo, float $maximo, string $observ, string $kit, string $serie, string $lote, string $invent, string $imagen, string $paraventa, string $curso, string $usufecha, string $usuhora, string $exportado, string $en_venta, string $granel, float $peso, string $bajocosto, string $bloqueado, float $u1, float $u2, float $u3, float $u4, float $u5, float $u6, float $u7, float $u8, float $u9, float $u10, string $acaja, string $modificaprecio, string $fraccionario, string $iespecial, string $c2, string $c3, string $c4, string $c5, string $c6, string $c7, string $c8, string $c9, string $c10, string $modelo, string $color, string $talla, float $speso, string $etiqueta, float $numero, float $carton, string $unidadrecibe, string $unidadempaque, string $sinvolumen, string $presentacion, string $servicio, float $numeroservicios, string $claveproveedor, string $dp, string $familia, string $subfamilia, string $subfam1, string $subfam2, float $preciousd, float $costousd, float $puntos, string $autocodigo, string $tiempoaire, string $ensambladoenlinea, string $claveprodserv, string $claveunidad, string $version, string $GUID)
         {
             $request = [];
             $this->articulo = $articulo;
             $this->descrip = $descrip;
               $this->linea = $linea;
               $this->marca = $marca;
               $this->fabricante = $fabricante;
               $this->ubicacion = $ubicacion;
               $this->impuesto = $impuesto;
               $this->costo = $costo;
               $this->precio1 = $precio1;
               $this->precio2 = $precio2;
               $this->precio3 = $precio3;
               $this->precio4 = $precio4;
               $this->precio5 = $precio5; 
               $this->precio6 = $precio6;
               $this->precio7 = $precio7;
               $this->precio8 = $precio8;
               $this->precio9 = $precio9;
               $this->precio10 = $precio10;
               $this->existencia = $existencia;
               $this->unidad = $unidad;
               $this->minimo = $minimo;
               $this->maximo = $maximo;
               $this->observ = $observ;
               $this->kit = $kit;
               $this->serie = $serie;
               $this->lote = $lote;
               $this->invent = $invent;
               $this->imagen = $imagen;
               $this->paraventa = $paraventa;
               $this->curso = $curso;
               $this->usufecha = $usufecha;
               $this->usuhora = $usuhora;
               $this->exportado = $exportado;
               $this->en_venta = $en_venta;
               $this->granel = $granel;
               $this->peso = $peso;
               $this->bajocosto = $bajocosto;
               $this->bloqueado = $bloqueado;
               $this->u1 = $u1;
               $this->u2 = $u2;
               $this->u3 = $u3;
               $this->u4 = $u4;
               $this->u5 = $u5;
               $this->u6 = $u6;
               $this->u7 = $u7;
               $this->u8 = $u8;
               $this->u9 = $u9;
               $this->u10 = $u10;
               $this->acaja = $acaja;
               $this->modificaprecio = $modificaprecio;
               $this->fraccionario = $fraccionario;
               $this->iespecial = $iespecial;
               $this->c2 = $c2;
               $this->c3 = $c3;
               $this->c4 = $c4;
               $this->c5 = $c5;
               $this->c6 = $c6;
               $this->c7 = $c7;
               $this->c8 = $c8;
               $this->c9 = $c9;
               $this->c10 = $c10;
               $this->modelo = $modelo;
               $this->color = $color;
               $this->talla = $talla;
               $this->speso = $speso;
               $this->etiqueta = $etiqueta;
               $this->numero = $numero;
               $this->carton = $carton;
               $this->unidadrecibe = $unidadrecibe;
               $this->unidadempaque = $unidadempaque;
               $this->sinvolumen = $sinvolumen;
               $this->presentacion = $presentacion;
               $this->servicio = $servicio;
               $this->numeroservicios = $numeroservicios;
               $this->claveproveedor = $claveproveedor;
               $this->dp = $dp;
               $this->familia = $familia;
               $this->subfamilia = $subfamilia;
               $this->subfam1 = $subfam1;
               $this->subfam2 = $subfam2;

               $this->preciousd = $preciousd;
               $this->costousd = $costousd;
               $this->puntos = $puntos;
               $this->autocodigo = $autocodigo;
               $this->tiempoaire = $tiempoaire;
               $this->ensambladoenlinea = $ensambladoenlinea;
               $this->claveprodserv = $claveprodserv;
               $this->claveunidad = $claveunidad;
               $this->version = $version;
               $this->GUID = $GUID;

               $sql = "SELECT * FROM prods WHERE articulo = :articulo";
               $arrParams = array(":articulo" => $this->articulo);
               $request = $this->select($sql, $arrParams);
               if(!is_countable($request))
               {
                   $query_insert = "INSERT INTO prods(articulo, descrip, linea, marca, fabricante, ubicacion, impuesto, costo, precio1, precio2, precio3, precio4, precio5, precio6, precio7, precio8, precio9, precio10, existencia, unidad, minimo, maximo, observ, kit, serie, lote, invent, imagen, paraventa, curso, usufecha, usuhora, exportado, en_venta, granel, peso, bajocosto, bloqueado, u1, u2, u3, u4, u5, u6, u7, u8, u9, u10, acaja, modificaprecio, fraccionario, iespecial, c2, c3, c4, c5, c6, c7, c8, c9, c10, modelo, color, talla, speso, etiqueta, numero, carton, unidadrecibe, unidadempaque, sinvolumen, presentacion, servicio, numeroservicios, claveproveedor, dp, familia, subfamilia, subfam1, subfam2, preciousd, costousd, puntos, autocodigo, tiempoaire, ensambladoenlinea, claveprodserv, claveunidad, version, GUID) VALUES(:articulo, :descrip, :linea, :marca, :fabricante, :ubicacion, :impuesto, :costo, :precio1, :precio2, :precio3, :precio4, :precio5, :precio6, :precio7, :precio8, :precio9, :precio10, :existencia, :unidad, :minimo, :maximo, :observ, :kit, :serie, :lote, :invent, :imagen, :paraventa, :curso, :usufecha, :usuhora, :exportado, :en_venta, :granel, :peso, :bajocosto, :bloqueado, :u1, :u2, :u3, :u4, :u5, :u6, :u7, :u8, :u9, :u10, :acaja, :modificaprecio, :fraccionario, :iespecial, :c2, :c3, :c4, :c5, :c6, :c7, :c8, :c9, :c10, :modelo, :color, :talla, :speso, :etiqueta, :numero, :carton, :unidadrecibe, :unidadempaque, :sinvolumen, :presentacion, :servicio, :numeroservicios, :claveproveedor, :dp, :familia, :subfamilia, :subfam1, :subfam2, :preciousd, :costousd, :puntos, :autocodigo, :tiempoaire, :ensambladoenlinea, :claveprodserv, :claveunidad, :version, :GUID)";

                     $arrData = array(":articulo" => $this->articulo,
                                       ":descrip" => $this->descrip,
                                       ":linea" => $this->linea,
                                       ":marca" => $this->marca,
                                       ":fabricante" => $this->fabricante,
                                       ":ubicacion" => $this->ubicacion,
                                       ":impuesto" => $this->impuesto,
                                       ":costo" => $this->costo,
                                       ":precio1" => $this->precio1,
                                       ":precio2" => $this->precio2,
                                       ":precio3" => $this->precio3,
                                       ":precio4" => $this->precio4,
                                       ":precio5" => $this->precio5,
                                       ":precio6" => $this->precio6,
                                       ":precio7" => $this->precio7,
                                       ":precio8" => $this->precio8,
                                       ":precio9" => $this->precio9,
                                       ":precio10" => $this->precio10,
                                       ":existencia" => $this->existencia,
                                       ":unidad" => $this->unidad,
                                       ":minimo" => $this->minimo,
                                       ":maximo" => $this->maximo,
                                       ":observ" => $this->observ,
                                       ":kit" => $this->kit,
                                       ":serie" => $this->serie,
                                       ":lote" => $this->lote,
                                       ":invent" => $this->invent,
                                       ":imagen" => $this->imagen,
                                       ":paraventa" => $this->paraventa,
                                       ":curso" => $this->curso,
                                       ":usufecha" => $this->usufecha,
                                       ":usuhora" => $this->usuhora,
                                       ":exportado" => $this->exportado,
                                       ":en_venta" => $this->en_venta,
                                       ":granel" => $this->granel,
                                       ":peso" => $this->peso,
                                       ":bajocosto" => $this->bajocosto,
                                       ":bloqueado" => $this->bloqueado,
                                       ":u1" => $this->u1,
                                       ":u2" => $this->u2,
                                       ":u3" => $this->u3,
                                       ":u4" => $this->u4,
                                       ":u5" => $this->u5,
                                       ":u6" => $this->u6,
                                       ":u7" => $this->u7,
                                       ":u8" => $this->u8,
                                       ":u9" => $this->u9,
                                       ":u10" => $this->u10,
                                       ":acaja" => $this->acaja,
                                       ":modificaprecio" => $this->modificaprecio,
                                       ":fraccionario" => $this->fraccionario,
                                       ":iespecial" => $this->iespecial,
                                       ":c2" => $this->c2,
                                       ":c3" => $this->c3,
                                       ":c4" => $this->c4,
                                       ":c5" => $this->c5,
                                       ":c6" => $this->c6,
                                       ":c7" => $this->c7,
                                       ":c8" => $this->c8,
                                       ":c9" => $this->c9,
                                       ":c10" => $this->c10,
                                       ":modelo" => $this->modelo,
                                       ":color" => $this->color,
                                       ":talla" => $this->talla,
                                       ":speso" => $this->speso,
                                       ":etiqueta" => $this->etiqueta,
                                       ":numero" => $this->numero,
                                       ":carton" => $this->carton,
                                       ":unidadrecibe" => $this->unidadrecibe,
                                       ":unidadempaque" => $this->unidadempaque,
                                       ":sinvolumen" => $this->sinvolumen,
                                       ":presentacion" => $this->presentacion,
                                       ":servicio" => $this->servicio,
                                       ":numeroservicios" => $this->numeroservicios,
                                       ":claveproveedor" => $this->claveproveedor,
                                       ":dp" => $this->dp,
                                       ":familia" => $this->familia,
                                       ":subfamilia" => $this->subfamilia,
                                       ":subfam1" => $this->subfam1,
                                       ":subfam2" => $this->subfam2,
                                       ":preciousd" => $this->preciousd,
                                       ":costousd" => $this->costousd,
                                       ":puntos" => $this->puntos,
                                       ":autocodigo" => $this->autocodigo,
                                       ":tiempoaire" => $this->tiempoaire,
                                       ":ensambladoenlinea" => $this->ensambladoenlinea,
                                       ":claveprodserv" => $this->claveprodserv,
                                       ":claveunidad" => $this->claveunidad,
                                       ":version" => $this->version,
                                       ":GUID" => $this->GUID);

                     $request_insert = $this->insert($query_insert, $arrData);
                     $sql = "SELECT * FROM prods WHERE articulo = :articulo";
                     $arrParams = array(":articulo" => $this->articulo);
                     $request_insert = $this->select($sql, $arrParams);
                     $returnData = $request_insert;
                    
               }
               else
               {
                   $returnData = "exist";
               }

               return $returnData;
        }
        public function getProds()
            {
                //Para cargarlo en los grid, tiene que coincidir mayusculas y minusculas con el nombre de la columna
                $sql = "SELECT ARTICULO, prods.DESCRIP, LINEA, MARCA, prods.fabricante, UBICACION, prods.IMPUESTO, COSTO, 
                                Round(precio1 * (1 + (impuestos.valor/100)),2) as PRECIO1,
                                Round(precio2 * (1 + (impuestos.valor/100)),2) as PRECIO2,
                                Round(precio3 * (1 + (impuestos.valor/100)),2) as PRECIO3,
                                Round(precio4 * (1 + (impuestos.valor/100)),2) as PRECIO4,
                                Round(precio5 * (1 + (impuestos.valor/100)),2) as PRECIO5,
                                Round(precio6 * (1 + (impuestos.valor/100)),2) as PRECIO6,
                                Round(precio7 * (1 + (impuestos.valor/100)),2) as PRECIO7,
                                Round(precio8 * (1 + (impuestos.valor/100)),2) as PRECIO8,
                                Round(precio9 * (1 + (impuestos.valor/100)),2) as PRECIO9,
                                Round(precio10 * (1 + (impuestos.valor/100)),2) as PRECIO10,
                                prods.existencia, unidad, minimo, maximo, observ, kit, serie, lote, invent, imagen, paraventa, curso, prods.usufecha, prods.usuhora, exportado, en_venta, granel, peso, bajocosto, bloqueado, u1, u2, u3, u4, u5, u6, u7, u8, u9, u10, acaja, modificaprecio, fraccionario, iespecial, c2, c3, c4, c5, c6, c7, c8, c9, c10, modelo, color, talla, speso, etiqueta, numero, carton, unidadrecibe, unidadempaque, sinvolumen, presentacion, servicio, numeroservicios, claveproveedor, dp, familia, subfamilia, subfam1, subfam2, preciousd, costousd, puntos, autocodigo, tiempoaire, ensambladoenlinea, claveprodserv, claveunidad, version, GUID 
                                FROM prods INNER JOIN impuestos ON prods.impuesto = impuestos.impuesto";
                               
                $request = $this->select_all($sql);
                return $request;
        }
        public function getProd(string $articulo)
            { 
                //Para cargarlo en los grid, tiene que coincidir mayusculas y minusculas con el nombre de la columna
                $sql = "SELECT ARTICULO, prods.DESCRIP, LINEA, MARCA, prods.fabricante, UBICACION, prods.IMPUESTO, COSTO, 
                                Round(precio1 * (1 + (impuestos.valor/100)),2) as PRECIO1,
                                Round(precio2 * (1 + (impuestos.valor/100)),2) as PRECIO2,
                                Round(precio3 * (1 + (impuestos.valor/100)),2) as PRECIO3,
                                Round(precio4 * (1 + (impuestos.valor/100)),2) as PRECIO4,
                                Round(precio5 * (1 + (impuestos.valor/100)),2) as PRECIO5,
                                Round(precio6 * (1 + (impuestos.valor/100)),2) as PRECIO6,
                                Round(precio7 * (1 + (impuestos.valor/100)),2) as PRECIO7,
                                Round(precio8 * (1 + (impuestos.valor/100)),2) as PRECIO8,
                                Round(precio9 * (1 + (impuestos.valor/100)),2) as PRECIO9,
                                Round(precio10 * (1 + (impuestos.valor/100)),2) as PRECIO10, 
                                prods.existencia, unidad, minimo, maximo, observ, kit, serie, lote, invent, imagen, paraventa, curso, prods.usufecha, prods.usuhora, exportado, en_venta, granel, peso, bajocosto, bloqueado, u1, u2, u3, u4, u5, u6, u7, u8, u9, u10, acaja, modificaprecio, fraccionario, iespecial, c2, c3, c4, c5, c6, c7, c8, c9, c10, modelo, color, talla, speso, etiqueta, numero, carton, unidadrecibe, unidadempaque, sinvolumen, presentacion, servicio, numeroservicios, claveproveedor, dp, familia, subfamilia, subfam1, subfam2, preciousd, costousd, puntos, autocodigo, tiempoaire, ensambladoenlinea, claveprodserv, claveunidad, version, GUID 
                                FROM prods INNER JOIN impuestos ON prods.impuesto = impuestos.impuesto WHERE prods.articulo = :articulo";
                $arrParams = array(":articulo" => $articulo);
                $request = $this->select($sql, $arrParams);
                return $request;
        }


        public function searchProd(string $descrip)
        { 
           $descrip = strClean($descrip);
            //Reemplazamos caracteres en blanco por % para la consulta
            $descrip = str_replace(' ', '%', $descrip);
            //Para cargarlo en los grid, tiene que coincidir mayusculas y minusculas con el nombre de la columna
            $sql = "SELECT ARTICULO, prods.DESCRIP, LINEA, MARCA, prods.fabricante, UBICACION, prods.IMPUESTO, COSTO, 
                            Round(precio1 * (1 + (impuestos.valor/100)),2) as PRECIO1,
                            Round(precio2 * (1 + (impuestos.valor/100)),2) as PRECIO2,
                            Round(precio3 * (1 + (impuestos.valor/100)),2) as PRECIO3,
                            Round(precio4 * (1 + (impuestos.valor/100)),2) as PRECIO4,
                            Round(precio5 * (1 + (impuestos.valor/100)),2) as PRECIO5,
                            Round(precio6 * (1 + (impuestos.valor/100)),2) as PRECIO6,
                            Round(precio7 * (1 + (impuestos.valor/100)),2) as PRECIO7,
                            Round(precio8 * (1 + (impuestos.valor/100)),2) as PRECIO8,
                            Round(precio9 * (1 + (impuestos.valor/100)),2) as PRECIO9,
                            Round(precio10 * (1 + (impuestos.valor/100)),2) as PRECIO10, 
                            prods.existencia, unidad, minimo, maximo, observ, kit, serie, lote, invent, imagen, paraventa, curso, prods.usufecha, prods.usuhora, exportado, en_venta, granel, peso, bajocosto, bloqueado, u1, u2, u3, u4, u5, u6, u7, u8, u9, u10, acaja, modificaprecio, fraccionario, iespecial, c2, c3, c4, c5, c6, c7, c8, c9, c10, modelo, color, talla, speso, etiqueta, numero, carton, unidadrecibe, unidadempaque, sinvolumen, presentacion, servicio, numeroservicios, claveproveedor, dp, familia, subfamilia, subfam1, subfam2, preciousd, costousd, puntos, autocodigo, tiempoaire, ensambladoenlinea, claveprodserv, claveunidad, version, GUID 
                            FROM prods LEFT JOIN impuestos ON prods.impuesto = impuestos.impuesto WHERE prods.descrip LIKE :descrip or prods.articulo like :descrip";
            $arrParams = array(":descrip" => '%' . $descrip . '%');
            $request = $this->select_param($sql, $arrParams);
            return $request;
    }

        public function putProds(string $articulo, string $descrip, string $linea, string $marca, string $fabricante, string $ubicacion, string $impuesto, float $costo, float $precio1, float $precio2, float $precio3, float $precio4, float $precio5, float $precio6, float $precio7, float $precio8, float $precio9, float $precio10, float $existencia, string $unidad, float $minimo, float $maximo, string $observ, string $kit, string $serie, string $lote, string $invent, string $imagen, string $paraventa, string $curso, string $usufecha, string $usuhora, string $exportado, string $en_venta, string $granel, float $peso, string $bajocosto, string $bloqueado, float $u1, float $u2, float $u3, float $u4, float $u5, float $u6, float $u7, float $u8, float $u9, float $u10, string $acaja, string $modificaprecio, string $fraccionario, string $iespecial, string $c2, string $c3, string $c4, string $c5, string $c6, string $c7, string $c8, string $c9, string $c10, string $modelo, string $color, string $talla, float $speso, string $etiqueta, float $numero, float $carton, string $unidadrecibe, string $unidadempaque, string $sinvolumen, string $presentacion, string $servicio, float $numeroservicios, string $claveproveedor, string $dp, string $familia, string $subfamilia, string $subfam1, string $subfam2, float $preciousd, float $costousd, float $puntos, string $autocodigo, string $tiempoaire, string $ensambladoenlinea, string $claveprodserv, string $claveunidad, string $version, string $GUID)
            {
                $request = [];
                $this->articulo = $articulo;
                $this->descrip = $descrip;
                  $this->linea = $linea;
                  $this->marca = $marca;
                  $this->fabricante = $fabricante;
                  $this->ubicacion = $ubicacion;
                  $this->impuesto = $impuesto;
                  $this->costo = $costo;
                  $this->precio1 = $precio1;
                  $this->precio2 = $precio2;
                  $this->precio3 = $precio3;
                  $this->precio4 = $precio4;
                  $this->precio5 = $precio5;
                  $this->precio6 = $precio6;
                  $this->precio7 = $precio7;
                  $this->precio8 = $precio8;
                  $this->precio9 = $precio9;
                  $this->precio10 = $precio10;
                  $this->existencia = $existencia;
                  $this->unidad = $unidad;
                  $this->minimo = $minimo;
                  $this->maximo = $maximo;
                  $this->observ = $observ;
                  $this->kit = $kit;
                  $this->serie = $serie;
                  $this->lote = $lote;
                  $this->invent = $invent;
                  $this->imagen = $imagen;
                  $this->paraventa = $paraventa;
                  $this->curso = $curso;
                  $this->usufecha = $usufecha;
                  $this->usuhora = $usuhora;
                  $this->exportado = $exportado;
                  $this->en_venta = $en_venta;  
                  $this->granel = $granel;
                  $this->peso = $peso;
                  $this->bajocosto = $bajocosto;
                  $this->bloqueado = $bloqueado;
                  $this->u1 = $u1;
                  $this->u2 = $u2;
                  $this->u3 = $u3;
                  $this->u4 = $u4;
                  $this->u5 = $u5;
                  $this->u6 = $u6;
                  $this->u7 = $u7;
                  $this->u8 = $u8;
                  $this->u9 = $u9;
                  $this->u10 = $u10;
                  $this->acaja = $acaja;
                  $this->modificaprecio = $modificaprecio;
                  $this->fraccionario = $fraccionario;
                  $this->iespecial = $iespecial;
                  $this->c2 = $c2;
                  $this->c3 = $c3;
                  $this->c4 = $c4;
                  $this->c5 = $c5;
                  $this->c6 = $c6;
                  $this->c7 = $c7;
                  $this->c8 = $c8;
                  $this->c9 = $c9;
                  $this->c10 = $c10;
                  $this->modelo = $modelo;
                  $this->color = $color;
                  $this->talla = $talla;
                  $this->speso = $speso;
                  $this->etiqueta = $etiqueta;
                  $this->numero = $numero;
                  $this->carton = $carton;
                  $this->unidadrecibe = $unidadrecibe;
                  $this->unidadempaque = $unidadempaque;
                  $this->sinvolumen = $sinvolumen;
                  $this->presentacion = $presentacion;
                  $this->servicio = $servicio;
                  $this->numeroservicios = $numeroservicios;
                  $this->claveproveedor = $claveproveedor;
                  $this->dp = $dp;
                  $this->familia = $familia;
                  $this->subfamilia = $subfamilia;
                  $this->subfam1 = $subfam1;
                  $this->subfam2 = $subfam2;
                  $this->preciousd = $preciousd;
                  $this->costousd = $costousd;
                  $this->puntos = $puntos;
                  $this->autocodigo = $autocodigo;
                  $this->tiempoaire = $tiempoaire;
                  $this->ensambladoenlinea = $ensambladoenlinea;
                  $this->claveprodserv = $claveprodserv;
                  $this->claveunidad = $claveunidad;
                  $this->version = $version;
                  $this->GUID = $GUID;

                  $sql = "SELECT * FROM prods WHERE articulo = :articulo";
                  $arrParams = array(":articulo" => $this->articulo);
                  $request = $this->select($sql, $arrParams);

                  if(is_countable($request))
                  {
                      $query_update = "UPDATE prods SET descrip = :descrip, linea = :linea, marca = :marca, fabricante = :fabricante, ubicacion = :ubicacion, impuesto = :impuesto, costo = :costo, precio1 = :precio1, precio2 = :precio2, precio3 = :precio3, precio4 = :precio4, precio5 = :precio5, precio6 = :precio6, precio7 = :precio7, precio8 = :precio8, precio9 = :precio9, precio10 = :precio10, existencia = :existencia, unidad = :unidad, minimo = :minimo, maximo = :maximo, observ = :observ, kit = :kit, serie = :serie, lote = :lote, invent = :invent, imagen = :imagen, paraventa = :paraventa, curso = :curso, usufecha = :usufecha, usuhora = :usuhora, exportado = :exportado, en_venta = :en_venta, granel = :granel, peso = :peso, bajocosto = :bajocosto, bloqueado = :bloqueado, u1 = :u1, u2 = :u2, u3 = :u3, u4 = :u4, u5 = :u5, u6 = :u6, u7 = :u7, u8 = :u8, u9 = :u9, u10 = :u10, acaja = :acaja, modificaprecio = :modificaprecio, fraccionario = :fraccionario, iespecial = :iespecial, c2 = :c2, c3 = :c3, c4 = :c4, c5 = :c5, c6 = :c6, c7 = :c7, c8 = :c8, c9 = :c9, c10 = :c10, modelo = :modelo, color = :color, talla = :talla, speso = :speso, etiqueta = :etiqueta, numero = :numero, carton = :carton, unidadrecibe = :unidadrecibe, unidadempaque = :unidadempaque, sinvolumen = :sinvolumen, presentacion = :presentacion, servicio = :servicio, numeroservicios = :numeroservicios, claveproveedor = :claveproveedor, dp = :dp, familia = :familia, subfamilia = :subfamilia, subfam1 = :subfam1, subfam2 = :subfam2, preciousd = :preciousd, costousd = :costousd, puntos = :puntos, autocodigo = :autocodigo, tiempoaire = :tiempoaire, ensambladoenlinea = :ensambladoenlinea, claveprodserv = :claveprodserv, claveunidad = :claveunidad, version = :version, GUID = :GUID WHERE articulo = :articulo";

                      $arrParams = array(":articulo" => $this->articulo,
                                        ":descrip" => $this->descrip,
                                        ":linea" => $this->linea,
                                        ":marca" => $this->marca,
                                        ":fabricante" => $this->fabricante,
                                        ":ubicacion" => $this->ubicacion,
                                        ":impuesto" => $this->impuesto,
                                        ":costo" => $this->costo,
                                        ":precio1" => $this->precio1,
                                        ":precio2" => $this->precio2,
                                        ":precio3" => $this->precio3,
                                        ":precio4" => $this->precio4,
                                        ":precio5" => $this->precio5,
                                        ":precio6" => $this->precio6,
                                        ":precio7" => $this->precio7,
                                        ":precio8" => $this->precio8,
                                        ":precio9" => $this->precio9,
                                        ":precio10" => $this->precio10,
                                        ":existencia" => $this->existencia,
                                        ":unidad" => $this->unidad,
                                        ":minimo" => $this->minimo,
                                        ":maximo" => $this->maximo,
                                        ":observ" => $this->observ,
                                        ":kit" => $this->kit,
                                        ":serie" => $this->serie,
                                        ":lote" => $this->lote,
                                        ":invent" => $this->invent,
                                        ":imagen" => $this->imagen,
                                        ":paraventa" => $this->paraventa,
                                        ":curso" => $this->curso,
                                        ":usufecha" => $this->usufecha,
                                        ":usuhora" => $this->usuhora,
                                        ":exportado" => $this->exportado,
                                        ":en_venta" => $this->en_venta,
                                        ":granel" => $this->granel,
                                        ":peso" => $this->peso,
                                        ":bajocosto" => $this->bajocosto,
                                        ":bloqueado" => $this->bloqueado,
                                        ":u1" => $this->u1,
                                        ":u2" => $this->u2,
                                        ":u3" => $this->u3,
                                        ":u4" => $this->u4,
                                          ":u5" => $this->u5,
                                          ":u6" => $this->u6,
                                          ":u7" => $this->u7,
                                          ":u8" => $this->u8,
                                          ":u9" => $this->u9,
                                          ":u10" => $this->u10,
                                          ":acaja" => $this->acaja,
                                          ":modificaprecio" => $this->modificaprecio,
                                          ":fraccionario" => $this->fraccionario,
                                          ":iespecial" => $this->iespecial,
                                          ":c2" => $this->c2,
                                          ":c3" => $this->c3,
                                          ":c4" => $this->c4,
                                          ":c5" => $this->c5,
                                          ":c6" => $this->c6,
                                          ":c7" => $this->c7,
                                          ":c8" => $this->c8,
                                          ":c9" => $this->c9,
                                          ":c10" => $this->c10,
                                          ":modelo" => $this->modelo,
                                          ":color" => $this->color,
                                          ":talla" => $this->talla,
                                          ":speso" => $this->speso,
                                          ":etiqueta" => $this->etiqueta,
                                          ":numero" => $this->numero,
                                          ":carton" => $this->carton,
                                          ":unidadrecibe" => $this->unidadrecibe,
                                          ":unidadempaque" => $this->unidadempaque,
                                          ":sinvolumen" => $this->sinvolumen,
                                          ":presentacion" => $this->presentacion,
                                          ":servicio" => $this->servicio,
                                          ":numeroservicios" => $this->numeroservicios,
                                          ":claveproveedor" => $this->claveproveedor,
                                          ":dp" => $this->dp,
                                          ":familia" => $this->familia, 
                                          ":subfamilia" => $this->subfamilia,
                                          ":subfam1" => $this->subfam1,
                                          ":subfam2" => $this->subfam2,
                                          ":preciousd" => $this->preciousd,
                                          ":costousd" => $this->costousd,
                                          ":puntos" => $this->puntos,
                                          ":autocodigo" => $this->autocodigo,
                                          ":tiempoaire" => $this->tiempoaire,
                                          ":ensambladoenlinea" => $this->ensambladoenlinea,
                                          ":claveprodserv" => $this->claveprodserv,
                                          ":claveunidad" => $this->claveunidad,
                                          ":version" => $this->version,
                                          ":GUID" => $this->GUID);

                        $request_update = $this->update($query_update, $arrParams);
                       return $request_update;
                  }
                  else
                  {
                      return false;
                  }
        }
        public function delProds(string $articulo)
               {
                   $this->articulo = $articulo;
                   $sql = "SELECT * FROM prods WHERE articulo = :articulo";
                   $arrParams = array(":articulo" => $this->articulo);
                   $request = $this->select($sql, $arrParams);
                   if(is_countable($request))
                   {
                       $query = "DELETE FROM prods WHERE articulo = :articulo";
                       $request = $this->delete($query, $arrParams);
                       return $request;
                   }
                   else
                   {
                       return false;
                   }
        }
        public function saveProds(array $data)
        {
            // Verificar si el artículo ya existe
            if (isset($data['articulo'])) {
                $sql = "SELECT * FROM prods WHERE articulo = :articulo";
                $arrParams = array(':articulo' => $data['articulo']);
                $request = $this->select($sql, $arrParams);
             
                if (is_countable($request) && count($request) > 0) {
                    // Si el artículo existe, actualizar
                    $query = "UPDATE prods SET ";
                    $updateFields = []; 
                    foreach ($data as $key => $value) {
                        if ($key != 'articulo') {
                            $updateFields[] = "$key = :$key";
                        }
                    }
                    $query .= implode(", ", $updateFields);
                    $query .= " WHERE articulo = :articulo";
                } else {
                    // Si el artículo no existe, insertar
                    $fields = implode(", ", array_keys($data));
                    $placeholders = ":" . implode(", :", array_keys($data));
                    $query = "INSERT INTO prods ($fields) VALUES ($placeholders)";
                }
                
                return $this->call_dynamic_execute($query, $data);
            } else {
                throw new Exception("El campo 'articulo' es obligatorio.");
            }
        }
    }
?>