<?php

// Dependencias en classes/view/templates/js/devel.js

Cogumelo::load("c_controller/Module");

class devel extends Module
{
  public $name = "devel";
  public $version = "2.0";
  public $dependences = array(
   // BOWER   
   array(
     "id" => "jquery",
     "params" => array("jquery#1.*"),
     "installer" => "bower",
     "load" => array("jquery.js")
   ),
  array(
     "id" => "jquery2",
     "params" => array("jquery#2.*"),
     "installer" => "bower",
     "load" => array("jquery.js")
   ),  
   array(
     "id" => "bootstrap",
     "params" => array("bootstrap"),
     "installer" => "bower",
     "load" => array("bootstrap.css")
   ),  
   // COMPOSER 
   array(
     "id" => "kint",
     "params" => array("raveren/kint","1.0.*@dev"),
     "installer" => "composer",
     "load" => array("Kint.class.php")
   ),
   array(
     "id" => "sqlFormatter",
     "params" => array("jdorn/sql-formatter", "1.3.*@dev"),
     "installer" => "composer",
     "load" => array("SqlFormatter.php")
   )
  );

  public $clientCommon = array(  
    '',
    ''
  );

  public $serverCommon = array(
    '',
    ''
  );

  

  function __construct() {
    $this->addUrlPatterns( '#^'.MOD_DEVEL_URL_DIR.'$#', 'view:DevelView::main' );
    $this->addUrlPatterns( '#^'.MOD_DEVEL_URL_DIR.'/read_logs$#', 'view:DevelView::read_logs' );
    $this->addUrlPatterns( '#^'.MOD_DEVEL_URL_DIR.'/get_debugger#', 'view:DevelView::get_debugger' );
    $this->addUrlPatterns( '#^'.MOD_DEVEL_URL_DIR.'/get_sql_tables$#', 'view:DevelView::get_sql_tables' );

    //Cogumelo::error( print_r( $this->getUrlPatternsToArray(), true ) );
  }

}