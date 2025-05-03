<?php
    class Home extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        public function home($params)
        {
            $data['page_tag'] = "Home";
            $data['page_title'] = "Página principal - Marcas Exclusivas";
            $data['page_name'] = "Home";
            $this->views->getView($this,"Home",$data);
        }


    }


?>