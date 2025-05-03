<?php
    
        class UbicacionesModel extends Mysql
        {
            private $ubicacion;
            private $descrip;
            private $usuario;
            private $usufecha;
            private $usuhora;
            public function __construct()
            {
                parent::__construct();
            }
    
        
    
        public function setUbicacion(string $ubicacion, string $descrip, string $usuario)
        {
    
            $request = [];        
            $this->ubicacion = $ubicacion;
            $this->descrip = $descrip;
            $this->usuario = $usuario;
    
            $sql = "SELECT ubicacion from ubicacion where ubicacion = :ubicacion";
            $arrParams = array(":ubicacion" => $this->ubicacion
                                );
                            
            $request = $this->select($sql,$arrParams);
        
            if(!is_countable($request) )
            {
    
                $query_insert  = "INSERT INTO ubicacion(ubicacion,descrip,usuario,usufecha,usuhora) VALUES(:ubicacion,:descrip,:usuario,:usufecha,:usuhora)";
                $arrData = array(":ubicacion" => $this->ubicacion,
                                ":descrip" => $this->descrip,
                                ":usuario" => $this->usuario,
                                ":usufecha" => date('Y-m-d'),
                                ":usuhora" =>date('H:i:s'));
                $request_insert = $this->insert($query_insert,$arrData);
                $sql = "SELECT ubicacion from ubicacion where ubicacion = :ubicacion";
                $arrParams = array(":ubicacion" => $this->ubicacion);
                            
                $request_insert = $this->select($sql,$arrParams);
        
                $returnData = $request_insert;
            }
            else
            {
                $returnData = "exist";
            }
            return $returnData;
        }
    
        
        public function getUbicacion(string $ubicacion)
        {
            $this->ubicacion = $ubicacion;
            $sql = "SELECT ubicacion, descrip, usuario, usufecha, usuhora FROM ubicacion WHERE ubicacion = :ubicacion";
            $arrParams = array(":ubicacion" => $this->ubicacion);
            $request = $this->select($sql, $arrParams);
            return $request;
        }

        public function getUbicaciones()
        {
            $sql = "SELECT ubicacion, descrip, usuario, usufecha, usuhora FROM ubicacion ORDER BY descrip";
            $request = $this->select_all($sql);
            return $request;
        }
        
        public function putUbicacion(string $ubicacion, string $descrip, string $usuario)
        {
            $this->ubicacion = $ubicacion;
            $this->descrip = $descrip;
            $this->usuario = $usuario;

            $sql = "SELECT * FROM ubicacion WHERE ubicacion = :ubicacion";
            $arrParams = array(":ubicacion" => $this->ubicacion);
            $request = $this->select($sql, $arrParams);
            if(is_countable($request))
            {
                $sql = "UPDATE ubicacion SET descrip = :descrip, usuario = :usuario, usufecha = :usufecha, usuhora = :usuhora WHERE ubicacion = :ubicacion";
                $arrParams = array(":ubicacion" => $this->ubicacion,
                                    ":descrip" => $this->descrip,
                                    ":usuario" => $this->usuario,
                                    ":usufecha" => date('Y-m-d'),
                                    ":usuhora" => date('H:i:s'));
                $request = $this->update($sql, $arrParams);
                return $request;
            }
        }

        public function delUbicacion(string $ubicacion)
        {
            $this->ubicacion = $ubicacion;
            $sql = "DELETE FROM ubicacion  WHERE ubicacion = :ubicacion";
            $arrParams = array(":ubicacion" => $this->ubicacion);
            $request = $this->delete($sql, $arrParams);
            return $request;
        }
    }
?>