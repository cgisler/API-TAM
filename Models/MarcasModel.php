<?php

    class MarcasModel extends Mysql
    {
        private $marca;
        private $descrip;
        private $usuario;
        private $usufecha;
        private $usuhora;
        public function __construct()
        {
            parent::__construct();
        }

    

    public function setMarca(string $marca, string $descrip, string $usuario)
    {

        $request = [];        
        $this->marca = $marca;
        $this->descrip = $descrip;
        $this->usuario = $usuario;

        $sql = "SELECT marca from marcas where marca = :marca";
        $arrParams = array(":marca" => $this->marca
                            );
                           
        $request = $this->select($sql,$arrParams);
      
        if(!is_countable($request) )
        {

            $query_insert  = "INSERT INTO marcas(marca,descrip,usuario,usufecha,usuhora) VALUES(:marca,:descrip,:usuario,:usufecha,:usuhora)";
            $arrData = array(":marca" => $this->marca,
                            ":descrip" => $this->descrip,
                            ":usuario" => $this->usuario,
                            ":usufecha" => date('Y-m-d'),
                            ":usuhora" =>date('H:i:s'));
            $request_insert = $this->insert($query_insert,$arrData);
            $sql = "SELECT marca from marcas where marca = :marca";
            $arrParams = array(":marca" => $this->marca);
                           
            $request_insert = $this->select($sql,$arrParams);
       
            $returnData = $request_insert;
        }
        else
        {
            $returnData = "exist";
        }
        return $returnData;
    }

    public function getMarcas()
    {
        $sql = "SELECT marca as nombre, descrip as descripcion, usuario, usufecha, usuhora FROM marcas ORDER BY descrip";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getMarca(string $marca)
    {
        $this->marca = $marca;
        $sql = "SELECT marca as nombre, descrip as descripcion, usuario, usufecha, usuhora FROM marcas WHERE marca = :marca";
        $arrParams = array(":marca" => $this->marca);
        $request = $this->select($sql, $arrParams);
        return $request;
    }

    public function putMarca(string $marca, string $descrip, string $usuario)
    {
        $this->marca = $marca;
        $this->descrip = $descrip;
        $this->usuario = $usuario;
        $sql = "SELECT * FROM marcas WHERE marca = :marca";
        $arrParams = array(":marca" => $this->marca);
        $request = $this->select($sql, $arrParams);
        if(!empty($request))
        {
            $sql = "UPDATE marcas SET descrip = :descrip, usuario = :usuario, usufecha = :usufecha, usuhora = :usuhora WHERE marca = :marca";
            $arrParams = array(":marca" => $this->marca,
                                ":descrip" => $this->descrip,
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

    public function delMarca(string $marca)
    {
        $this->marca = $marca;
        $sql = "SELECT * FROM marcas WHERE marca = :marca";
        $arrParams = array(":marca" => $this->marca);
        $request = $this->select($sql, $arrParams);
        if(!empty($request))
        {
            $sql = "DELETE FROM marcas WHERE marca = :marca";
            $arrParams = array(":marca" => $this->marca);
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