<?php

Cogumelo::load("coreController/Module.php");


class testmodule extends Module
{
  public $name = "test";
  public $version = 1.0;
  public $dependences = array();
  public $includesCommon = array();

  function __construct() {
    $this->addUrlPatterns( '#^cousa/vo/?$#', 'view:Cousadmin::vo' );
    $this->addUrlPatterns( '#^cousa/mostrar/?$#', 'view:Cousadmin::mostra_cousa' );
    $this->addUrlPatterns( '#^cousa/mostrar/(.*)$#', 'view:Cousadmin::mostra_cousa' );
    $this->addUrlPatterns( '#^cousa/crear$#', 'view:Cousadmin::crea' );
    $this->addUrlPatterns( '#^cousa/lista_plana$#', 'view:Cousadmin::lista_plana' );
    $this->addUrlPatterns( '#^cousa_tabla$#', 'view:Cousadmin::cousa_tabla' );
    $this->addUrlPatterns( '#^testmodule#', 'view:TestmoduleView::inicio' );
/*
$this->setUrlPatternsFromArray(
  array(
    '#^cousa/mostrar\/?(.*)$#' => 'view:Cousadmin::mostra_cousa',
    '#^cousa/crear$#' => 'view:Cousadmin::crea',
    '#^lista_plana$#' => 'view:Cousadmin::lista_plana',
    '#^cousa_tabla$#' => 'view:Cousadmin::cousa_tabla',
    '#^testmodule#' => 'view:TestmoduleView::inicio'
  )
);
*/
__('traduceme esto se tes valor');
  }


}
