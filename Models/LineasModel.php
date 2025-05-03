<?php

    class LineasModel extends Mysql
    {
        private $linea;
        private $descrip;
        private $numero;
        private $usuario;
        private $usufecha;
        private $usuhora;
        public function __construct()
        {
            parent::__construct();
        }

    

    public function setLinea(string $linea, string $descrip, int $numero, string $usuario)
    {

        $request = [];        
        $this->linea = $linea;
        $this->descrip = $descrip;
        $this->numero = $numero;
        $this->usuario = $usuario;

        $sql = "SELECT linea from lineas where linea = :linea";
        $arrParams = array(":linea" => $this->linea
                            );
                           
        $request = $this->select($sql,$arrParams);
      
        if(!is_countable($request) )
        {

            $query_insert  = "INSERT INTO lineas(linea,descrip,numero,usuario,usufecha,usuhora) VALUES(:linea,:descrip,:numero,:usuario,:usufecha,:usuhora)";
            $arrData = array(":linea" => $this->linea,
                            ":descrip" => $this->descrip,
                            ":numero" => $this->numero,
                            ":usuario" => $this->usuario,
                            ":usufecha" => date('Y-m-d'),
                            ":usuhora" =>date('H:i:s'));
            $request_insert = $this->insert($query_insert,$arrData);
            $sql = "SELECT linea  from lineas where linea = :linea";
            $arrParams = array(":linea" => $this->linea);
                           
            $request_insert = $this->select($sql,$arrParams);
       
            $returnData = $request_insert;
        }
        else
        {
            $returnData = "exist";
        }
        return $returnData;
    }

  

    public function getLinea(string $linea)
    {
        //$this->linea =  $linea;
        $this->linea = $linea;
        $sql = "SELECT linea, descrip, numero, usuario, usufecha, usuhora FROM lineas WHERE linea = :linea";
        $arrParams = array(":linea" => $this->linea);
        $request = $this->select($sql, $arrParams);
        return $request;
    }
    
    public function getLineas()
    {
        $sql = "SELECT linea, descrip, numero, usuario, usufecha, usuhora FROM lineas ORDER BY descrip";
        $request = $this->select_all($sql);
        return $request;
    }

    public function putLinea(string $linea, string $descrip, int $numero, string $usuario)
    {
        $this->linea = $linea;
        $this->descrip = $descrip;
        $this->numero = $numero;
        $this->usuario = $usuario;
        $sql = "SELECT * FROM lineas WHERE linea = :linea";
        $arrParams = array(":linea" => $this->linea);
        $request = $this->select($sql, $arrParams);
        //Aquí le cambié a is_countable, por si no funciona, regresalo a !empty
        if(is_countable($request))
        {
            $sql = "UPDATE lineas SET descrip = :descrip, numero = :numero, usuario = :usuario, usufecha = :usufecha, usuhora = :usuhora WHERE linea = :linea";
            $arrParams = array(":linea" => $this->linea,
                                ":descrip" => $this->descrip,
                                ":numero" => $this->numero,
                                ":usuario" => $this->usuario,
                                ":usufecha" => date('Y-m-d'),
                                ":usuhora" =>date('H:i:s'));
            $request = $this->update($sql, $arrParams);
            return $request;
        }
        else
        {
            return false;
        }
        
    }

    public function delLinea(string $linea)
    {
        $this->linea = $linea;
        $sql = "SELECT * FROM lineas WHERE linea = :linea";
        $arrParams = array(":linea" => $this->linea);
        $request = $this->select($sql, $arrParams);
        if(!empty($request))
        {
            $sql = "DELETE FROM lineas WHERE linea = :linea";
            $arrParams = array(":linea" => $this->linea);
            $request = $this->delete($sql, $arrParams);
            return $request;
        }
        else
        {
            return false;
        }
    }

}
?>