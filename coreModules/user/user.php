<?php

Cogumelo::load("coreController/Module.php");

define('MOD_USER_URL_DIR', 'user');

class user extends Module
{
  public $name = "user";
  public $version = "";
  public $dependences = array(

  );

  public $includesCommon = array(
    /*'controller/UserController.php',*/
    'controller/UserAccessController.php',
    'view/UserView.php',
    'view/RoleView.php',
    'model/UserModel.php',
    'model/RoleModel.php'

  );

  function __construct() {
    $this->addUrlPatterns( '#^'.MOD_USER_URL_DIR.'/loginform$#', 'view:UserView::loginForm' );
    $this->addUrlPatterns( '#^'.MOD_USER_URL_DIR.'/sendloginform$#', 'view:UserView::sendLoginForm' );
    $this->addUrlPatterns( '#^'.MOD_USER_URL_DIR.'/registerform$#', 'view:UserView::userForm' );
    $this->addUrlPatterns( '#^'.MOD_USER_URL_DIR.'/senduserform$#', 'view:UserView::sendUserForm' );
  }
}