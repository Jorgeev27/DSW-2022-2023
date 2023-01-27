<?php
    declare(strict_types = 1);
    require_once("Smarty.class.php");

    class miSmarty extends Smarty{
        private string $app, $rutaBase;
        public function __construct($app){
            parent::__construct();
            $this->app = $app;
            $this->rutaBase = $rutaBase = "/var/www/phpdata/smarty/".$app;
            $this->template_dir = "$rutaBase/templates/";
            $this->compile_dir = "$rutaBase/templates_c";
            $this->config_dir = "$rutaBase/configs";
            $this->cache_dir = "$rutaBase/cache/";
            $this->assign('css_dir','../Vista/css');
            $this->assign('imgs_dir','../Vista/img');
            if(!is_dir($this->rutaBase)){
                mkdir($this->rutaBase);
                mkdir($this->template_dir);
                mkdir($this->compile_dir);
                mkdir($this->config_dir);
                mkdir($this->cache_dir);
            }
        }

        public function getRutaBase(){
            return $this->rutaBase;
        }

        public function getApp(){
            return $this->app;
        }
    }
?>