<?php

    class FabricantesModel extends Mysql
    {
        private $fabricante;
        private $nombre;
        public function __construct()
        {
            parent::__construct();
        }

    

    public function setFabricante(string $fabricante, string $nombre)
    {

        $request = [];        
        $this->fabricante = $fabricante;
        $this->nombre = $nombre;
        

        $sql = "SELECT fabricante from fabricantes where fabricante = :fabricante";
        $arrParams = array(":fabricante" => $this->fabricante
                            );
                           
        $request = $this->select($sql,$arrParams);
      
        if(!is_countable($request) )
        {

            $query_insert  = "INSERT INTO fabricantes(fabricante,nombre) VALUES(:fabricante,:nombre)";
            $arrData = array(":fabricante" => $this->fabricante,
                             ":nombre" => $this->nombre);
            $request_insert = $this->insert($query_insert,$arrData);
            $sql = "SELECT fabricante  from fabricantes where fabricante = :fabricante";
            $arrParams = array(":fabricante" => $this->fabricante);
                           
            $request_insert = $this->select($sql,$arrParams);
       
            $returnData = $request_insert;
        }
        else
        {
            $returnData = "exist";
        }
        return $returnData;
    }

    public function getFabricantes()
    {
        $sql = "SELECT fabricante, nombre FROM fabricantes ORDER BY nombre";
        $request = $this->select_all($sql);
        return $request;
    }

    public function getFabricante(string $fabricante)
    {
        $this->fabricante = $fabricante;
        $sql = "SELECT fabricante, nombre FROM fabricantes WHERE fabricante = :fabricante";
        $arrParams = array(":fabricante" => $this->fabricante);
        $request = $this->select($sql, $arrParams);
        return $request;
    }

    public function putFabricante(string $fabricante, string $nombre)
    {
        $this->fabricante = $fabricante;
        $this->nombre = $nombre;
        $sql = "SELECT * FROM fabricantes WHERE fabricante = :fabricante";
        $arrParams = array(":fabricante" => $this->fabricante);
        $request = $this->select($sql, $arrParams);
        if(!empty($request))
        {
            $sql = "UPDATE fabricantes SET nombre = :nombre WHERE fabricante = :fabricante";
            $arrParams = array(":fabricante" => $this->fabricante,
                                ":nombre" => $this->nombre);
            $request = $this->update($sql, $arrParams);
            return $request;
        }
        else
        {
            return false;
        }
        
    }

    public function delFabricante(string $fabricante)
    {
        $this->fabricante = $fabricante;
        $sql = "SELECT * FROM fabricantes WHERE fabricante = :fabricante";
        $arrParams = array(":fabricante" => $this->fabricante);
        $request = $this->select($sql, $arrParams);
        if(!empty($request))
        {
            $sql = "DELETE FROM fabricantes WHERE fabricante = :fabricante";
            $arrParams = array(":fabricante" => $this->fabricante);
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