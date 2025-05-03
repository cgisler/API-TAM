<?php
    
        class ImpuestosModel extends Mysql
        {
            private $impuesto;
            private $descrip;
            private $valor;
            private $usuario;
            private $usufecha;
            private $usuhora;
            public function __construct()
            {
                parent::__construct();
            }
    
        
    
        public function setImpuesto(string $impuesto, string $descrip, float $valor, string $usuario)
        {
    
            $request = [];        
            $this->impuesto = $impuesto;
            $this->descrip = $descrip;
            $this->valor = $valor;
            $this->usuario = $usuario;
            
            $sql = "SELECT impuesto from impuestos where impuesto = :impuesto";
            $arrParams = array(":impuesto" => $this->impuesto
                                );
                            
            $request = $this->select($sql,$arrParams);
        
            if(!is_countable($request) )
            {
    
                $query_insert  = "INSERT INTO impuestos(impuesto,descrip,valor,usuario,usufecha,usuhora) VALUES(:impuesto,:descrip,:valor,:usuario,:usufecha,:usuhora)";
                $arrData = array(":impuesto" => $this->impuesto,
                                ":descrip" => $this->descrip,
                                ":valor" => $this->valor,
                                ":usuario" => $this->usuario,
                                ":usufecha" => date('Y-m-d'),
                                ":usuhora" =>date('H:i:s'));
                $request_insert = $this->insert($query_insert,$arrData);
                $sql = "SELECT impuesto  from impuestos where impuesto = :impuesto";
                $arrParams = array(":impuesto" => $this->impuesto);
                            
                $request_insert = $this->select($sql,$arrParams);
        
                $returnData = $request_insert;
            }
            else
            {
                $returnData = "exist";
            }
            return $returnData;
        }
    
        public function getImpuestos()
        {
            $sql = "SELECT impuesto, descrip, valor, usuario, usufecha, usuhora FROM impuestos ORDER BY descrip";
            $request = $this->select_all($sql);
            return $request;
        }

        public function getImpuesto(string $impuesto)
        {
            $sql = "SELECT impuesto, descrip, valor, usuario, usufecha, usuhora FROM impuestos WHERE impuesto = :impuesto";
            $arrParams = array(":impuesto" => $impuesto);
            $request = $this->select($sql,$arrParams);
            return $request;
        }

        public function putImpuesto(string $impuesto, string $descrip, float $valor, string $usuario)
        {
            $this->impuesto = $impuesto;
            $this->descrip = $descrip;
            $this->valor = $valor;
            $this->usuario = $usuario;
            $sql = "SELECT * FROM impuestos WHERE impuesto = :impuesto";
            $arrParams = array(":impuesto" => $this->impuesto);
            $request = $this->select($sql,$arrParams);
            if(is_countable($request))
            {
                $query_update = "UPDATE impuestos SET descrip = :descrip, valor = :valor, usuario = :usuario, usufecha = :usufecha, usuhora = :usuhora WHERE impuesto = :impuesto";
                $arrData = array(":impuesto" => $this->impuesto,
                                ":descrip" => $this->descrip,
                                ":valor" => $this->valor,
                                ":usuario" => $this->usuario,
                                ":usufecha" => date('Y-m-d'),
                                ":usuhora" => date('H:i:s'));
                $request = $this->update($query_update,$arrData);
            }
            return $request;
        }   

        public function delImpuesto(string $impuesto)
        {
            $this->impuesto = $impuesto;
            $sql = "SELECT * FROM impuestos WHERE impuesto = :impuesto";
            $arrParams = array(":impuesto" => $this->impuesto);
            $request = $this->select($sql,$arrParams);
            if(is_countable($request))
            {
                $query_delete = "DELETE FROM impuestos WHERE impuesto = :impuesto";
                $arrData = array(":impuesto" => $this->impuesto);
                $request = $this->delete($query_delete,$arrData);
            }
            return $request;
        }   
    }
?>