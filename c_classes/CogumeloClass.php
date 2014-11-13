<?php

require_once(COGUMELO_LOCATION.'/c_classes/c_controller/Singleton.php');
require_once(COGUMELO_LOCATION.'/c_classes/c_controller/ModuleController.php');
require_once(COGUMELO_LOCATION.'/c_classes/c_controller/DependencesController.php');



class CogumeloClass extends Singleton
{
  public $request;
  public $modules;

  private $urlPatterns;

  protected $userinfoString = '';



  public $dependences = array();
  public $includesCommon = array();

  // main dependences for cogumelo framework
  static $mainDependences = array(

     array(
       "id" => "phpmailer",
       "params" => array("phpmailer/phpmailer", "5.2.9"),
       "installer" => "composer",
       "includes" => array("class.phpmailer.php")
     ),
     array(
       "id" => "smarty",
       "params" => array('smarty/smarty', '3.1.18'),
       "installer" => 'composer',
       "includes" => array('libs/Smarty.class.php')
     ),
     array(
       "id" => "gettext",
       "params" => array('gettext/gettext', '1.1.2'),
       "installer" => 'composer',
       "includes" => array('Gettext/autoloader.php')
     )
  );

  // Set autoincludes
  static function autoIncludes() {
    $dependencesControl = new DependencesController();
    $dependencesControl->loadAppIncludes();
  }


  static function get(){
    return parent::getInstance('Cogumelo');
  }

  public function __construct() {
    session_start();
  }


  function exec() {
    Cogumelo::debug('Request URI: '.$_SERVER['REQUEST_URI']);

    // cut out the SITE_FOLDER and final slash from path
    $url_path = preg_replace('#\/$#', '', preg_replace('#^'.SITE_FOLDER.'#', '', $_SERVER['REQUEST_URI'], 1) , 1);

    // modules
    $this->modules = new ModuleController( $url_path );
    $url_path_after_modules = $this->modules->getLeftUrl();

    // main request controller
    self::load('c_controller/RequestController.php');
    $this->request = new RequestController($this->urlPatterns, $url_path_after_modules );
  }


  //
  //  include
  //
  static function load($classname) {

    if( preg_match('#^c_#', $classname) ){
      $filename =  $classname;
      $file_path = COGUMELO_LOCATION.'/c_classes/'.$filename;
    }

    else {
      $filename =  $classname;
      $file_path = SITE_PATH. 'classes/'. $filename;
    }

    // check if file exist
    if(!file_exists($file_path)) {
      Cogumelo::error('PHP File not found : '.$file_path);
    }
    else {
      require_once $file_path;
    }
  }


  //
  //  include Vendor libs
  //
  static function vendorLoad($loadFile) {
    require_once SITE_PATH.'../httpdocs/vendorServer/'.$loadFile;
  }


  //
  //  Redirect (alias for RequestController::redirect )
  //
  static function redirect( $redirect_url ) {
    RequestController::redirect( $redirect_url );
  }


  //
  //  Error Handler
  //
  static function warningHandler( $errno, $errstr, $errfile, $errline) {

    $error_msg = 'Warning: '.$errstr.' on file "'.$errfile.'" line:'.$errline;

    if(DEBUG){
      self::objDebug(debug_backtrace(), $error_msg );
    }

    self::error($error_msg);
  }

  static function errorHandler() {

    $last_error = error_get_last();

    if($last_error!=null) {
      $error_msg = 'Fatal error: '.$last_error['message'].' on file "'.$last_error['file'].'" line: '.$last_error['line'];
      if(DEBUG) {
        self::objDebug($last_error, $error_msg);
      }
      self::error($error_msg);
    }
  }

  //
  //  LOGS
  //
  static function error($description) {
    if(ERRORS == true) {
      echo '<br>Cogumelo error: '.$description."\n";
    }

    self::log($description, 'cogumelo_error');
  }

  static function debug($description) {
    if(DEBUG == true) {
      self::log($description, 'cogumelo_debug');
    }
  }

  static function log( $texto, $fich_log='cogumelo' ) {
    $ignore = false;

    // Rodeo para evitar "PHP Notice:  Use of undefined constant MOD_DEVEL_URL_DIR"
    $arrayDefines = get_defined_constants();
    if(
      $_SERVER['REQUEST_URI'] != '/'.$arrayDefines['MOD_DEVEL_URL_DIR'].'/read_logs' &&
      $_SERVER['REQUEST_URI'] != '/'.$arrayDefines['MOD_DEVEL_URL_DIR'].'/get_debugger'
    ) {
      $ignore = true;
    }

    if( $ignore ) {

      error_log(
        '['. date('y-m-d H:i:s',time()) .'] ' .
        '['. $_SERVER['REMOTE_ADDR'] .'] ' .
        '[Session '. self::getUserInfo().'] ' .
        str_replace("\n", '\n', $texto)."\n", 3, LOGDIR.$fich_log.'.log'
      );
    }
  }

  // set an string with user information
  function setUserInfo($userinfoString) {
    $this->userinfoString = $userinfoString;
  }

  static function getUserInfo() {
    if(class_exists('UserSessionController')) {
    require_once(ModuleController::getRealFilePath('classes/controller/UserSessionController.php', 'user'));
    $userSessionControl = new UserSessionController();
    $user = $userSessionControl->getUser();
      $res = $user->getter('login');
    }
    else {
      $res = "";
    }
    return $res;
  }



  //
  //  Advanced Object Debug
  //
  static function objDebugObjectCreate($obj, $comment) {
    return array( 'comment' => $comment, 'creation_date' => getdate(), 'data' => $obj );
  }

  static function objDebugPull() {
    $now = getdate();
    $debug_object_maxlifetime = 60; // in seconds
    $result_array = array();

    if( DEBUG &&
      isset($_SESSION['cogumelo_dev_obj_array'])  &&
      $_SESSION['cogumelo_dev_obj_array'] != '' &&
      $_SESSION['cogumelo_dev_obj_array'] != null &&
      is_array(unserialize($_SESSION['cogumelo_dev_obj_array']))
    ) {

      $session_array = unserialize( $_SESSION['cogumelo_dev_obj_array'] );

      if(is_array($session_array) && sizeof($session_array) > 0 ) {
        foreach ($session_array as $session_obj) {
          if( isset($session_obj['creation_date'])
            && ( $now[0] - $session_obj['creation_date'][0]) <= $debug_object_maxlifetime
          ) {
            array_push($result_array, $session_obj);
          }
        }
      }

      // reset sesesion array
      $_SESSION['cogumelo_dev_obj_array'] = array();
    }

    return $result_array;
  }

  static function objDebug($obj, $comment='') {
    return self::objDebugPush($obj, $comment);
  }

  static function objDebugPush($obj, $comment) {
    if(DEBUG && isset($obj)){

      $session_array = array();

      if( isset($_SESSION['cogumelo_dev_obj_array']) &&
        $_SESSION['cogumelo_dev_obj_array'] != '' &&
        $_SESSION['cogumelo_dev_obj_array'] != null &&
        is_array(unserialize($_SESSION['cogumelo_dev_obj_array']))
      ) {

        $session_array = unserialize($_SESSION['cogumelo_dev_obj_array']);
      }

      //var_dump($session_array);

      array_push($session_array, self::objDebugObjectCreate($obj, $comment) );

      $_SESSION['cogumelo_dev_obj_array'] = serialize($session_array);
    }
  }


//
// Metodos duplicados en Module.php
// (Ini)

  function deleteUrlPatterns() {
    $this->urlPatterns = array();
  }

  function addUrlPatterns( $regex, $destination ) {
    $this->urlPatterns[ $regex ] = $destination;
  }

  function setUrlPatternsFromArray( $arrayUrlPatterns ) {
    $this->deleteUrlPatterns();
    foreach ($arrayUrlPatterns as $key => $value) {
      $this->addUrlPatterns( $key, $value );
    }
  }

  function getUrlPatternsToArray() {
    return $this->urlPatterns;
  }

// (Fin)
// Metodos duplicados en Module.php
//

}

