<?php
Cogumelo::load('coreView/View.php');
Cogumelo::load('controller/LostController.php');
Cogumelo::load('model/LostVO.php');

common::autoIncludes();
form::autoIncludes();


class CreateForm extends View
{

  function __construct($base_dir){
    parent::__construct($base_dir);
  }

  /**
  * Evaluate the access conditions and report if can continue
  * @return bool : true -> Access allowed
  */
  function accessCheck() {
    return true;
  }



  function updateLostForm( $request ){
    $lostControl = new LostController();
    $dataVO = $lostControl->find( $request[1] );

    if(!$dataVO){
      Cogumelo::redirect(SITE_URL.'lostForm');
    }else{
      $this->lostForm( $dataVO );
    }
  }

  function lostForm( $dataVO = '' ) {

    $form = new FormController( 'lostForm', '/sendlostform' ); //actionform

    $form->setField( 'id', array( 'type' => 'reserved', 'value' => false ));

    $form->setField( 'lostName', array( 'placeholder' => 'Nombre', 'value' => '' ));
    $form->setField( 'lostSurname', array( 'placeholder' => 'Apellidos') );
    $form->setField( 'lostMail', array( 'placeholder' => 'Email') );


/*
    $form->setField( 'lostFicheiro', array( 'type' => 'file', 'id' => 'lostFicheiro',
      'placeholder' => 'Escolle un ficheiro', 'label' => 'Colle un ficheiro',
      'destDir' => $_SERVER['DOCUMENT_ROOT'].'test_upload/0---OK/' ) );
    $form->setValidationRule( 'lostFicheiro', 'required' );
    $form->setValidationRule( 'lostFicheiro', 'minfilesize', 1024 );
*/


    $form->setField( 'lostFrutas', array( 'placeholder' => 'lostFrutas-notInArray', 'label' => 'lostFrutas-notInArray', 'value' => 'manzana') );

    //$form->setField( 'lostBornDate', array( 'label' => 'Fecha dmy Min', 'placeholder' => 'Fecha', 'value' => '15/11/1987', 'format' => 'datedmy'));
    //$form->setField( 'lostBornDate2', array( 'label' => 'Fecha dmy Max', 'placeholder' => 'Fecha', 'value' => '15/11/2000', 'format' => 'datedmy'));

    //$form->setField( 'lostDate', array( 'label' => 'Prueba extend app', 'placeholder' => 'Fecha', 'value' => '2014-1-9', 'format' => 'dateYmd'));

    $form->setField( 'lostDate', array( 'label' => 'Fecha Ymd Min', 'placeholder' => 'Fecha', 'value' => '2014-1-9', 'format' => 'dateYmd'));
    $form->setField( 'lostDate2', array( 'label' => 'Fecha Ymd Max', 'placeholder' => 'Fecha', 'value' => '2012-11-8', 'format' => 'dateYmd'));

    $form->setField( 'lostTime', array( 'label' => 'Time Hms Min', 'placeholder' => 'Hora', 'value' => '10:11:12', 'format' => 'timeHms'));
    $form->setField( 'lostTime2', array( 'label' => 'Time Hms Max', 'placeholder' => 'Hora', 'value' => '10:11:12', 'format' => 'timeHms'));

    $form->setField( 'lostDateTime', array( 'label' => 'Time YmdHms Min', 'placeholder' => 'Hora', 'value' => '2011-10-11 10:11:12', 'format' => 'dateTimeYmdHms'));
    $form->setField( 'lostDateTime2', array( 'label' => 'Time YmdHms Max', 'placeholder' => 'Hora', 'value' => '2011-10-11 10:11:12', 'format' => 'dateTimeYmdHms'));

    $form->setField( 'lostPhone', array( 'placeholder' => 'Phone', 'value' => '666666666') );
    $form->setField( 'lostProvince', array( 'type' => 'select', 'label' => 'Province',
      'options'=> array( '' => 'Selecciona', '1' => 'A coruña', '2' => 'Lugo', '3' => 'Ourense', '4' => 'Pontevedra' )
    ) );

    $form->setField( 'lostPassword', array( 'type' => 'password', 'placeholder' => 'Password' ) );
    $form->setField( 'lostPassword2', array( 'type' => 'password', 'placeholder' => 'Repeat password' ) );


    $form->setField( 'lostAppearance', array( 'type' => 'checkbox', 'label' => 'Aspecto de mascota',
      'value' => array( ),
      'options'=> array( 'Claro' => 'Claro', 'Oscuro' => 'Oscuro', 'Peludo' => 'Peludo', 'Gordo' => 'Gordo' )
    ) );

    $form->setField( 'lostPetType', array( 'type' => 'radio', 'label' => 'Tipo de Mascota', 'value' => '2',
      'options'=> array( '1' => 'Perro', '2' => 'Gato', '0' => 'Otros' )
    ) );

    $form->setField( 'lostDesc', array( 'label' => 'Description', 'value' => '', 'type' => 'textarea'));

    $form->setField( 'lostConditions', array( 'type' => 'checkbox',
      'value' => array( ),
      'options'=> array( '1' => 'He leído y acepto los Términos y Condiciones de uso' )
    ) );

    $form->setField( 'lostSubmit', array( 'type' => 'submit', 'value' => 'Guardar' ) );

    /******************************************************************************************** VALIDATIONS */
    $form->setValidationRule( 'lostName', 'required' );
    //$form->setValidationRule( 'lostConditions', 'required' );
    $form->setValidationRule( 'lostMail', 'required' );
    $form->setValidationRule( 'lostPhone', 'required' );
    $form->setValidationRule( 'lostProvince', 'required' );

    $form->setValidationRule( 'lostDesc', 'required' );
    $form->setValidationRule( 'lostConditions', 'required' );
    $form->setValidationRule( 'lostAppearance', 'required' );
    $form->setValidationRule( 'lostPetType', 'required' );

    $form->setValidationRule( 'lostFrutas', 'notInArray', array("Peras", "Naranjas", "Melocotones"));

    //$form->setValidationRule( 'lostPassword', 'equalTo', '#lostPassword2' );

    //$form->setValidationRule( 'lostBornDate', 'dateMin', '2014-9-9' );
    //$form->setValidationRule( 'lostBornDate2', 'dateMax', '2014-9-9' );
    //$form->setValidationRule( 'lostDate', 'uppercase', 0);
    $form->setValidationRule( 'lostMail', 'email' );

    $form->setValidationRule( 'lostDate', 'dateMin', '2014-01-4' );
    $form->setValidationRule( 'lostDate2', 'dateMax', '2014-09-09' );

    $form->setValidationRule( 'lostTime', 'timeMin', '9:10:09' );
    $form->setValidationRule( 'lostTime2', 'timeMax', '22:59:59' );

    $form->setValidationRule( 'lostDateTime', 'dateTimeMin', '2010-11-11 12:10:09' );
    $form->setValidationRule( 'lostDateTime2', 'dateTimeMax', '2014-07-1 22:59:59' );


    $form->loadVOValues( $dataVO );

    $form->saveToSession();

    $this->template->assign("lostFormOpen", $form->getHtmpOpen());
    $this->template->assign("lostFormFields", $form->getHtmlFieldsArray());
    $this->template->assign("lostFormClose", $form->getHtmlClose());
    $this->template->assign("lostFormValidations", $form->getJqueryValidationJS());


    $lostControl = new LostController();
    $res = $lostControl->listItems();
    $this->template->assign("lostList", $res->fetchAll());

    $this->template->setTpl('lostForm.tpl');
    $this->template->exec();

  } // function loadForm()


  function sendLostForm() {

    $formError = false;
    $postData = null;

    $postDataJson = file_get_contents('php://input');
    //error_log( $postDataJson );
    if( $postDataJson !== false && strpos( $postDataJson, '{' )===0 ) {
      $postData = json_decode( $postDataJson, true );
    }
    //error_log( print_r( $postData, true ) );

    // Creamos un objeto recuperandolo de session y añadiendo los datos POST
    $form = new FormController();
    // Leemos el input del navegador y recuperamos FORM de sesion añadiendole los datos enviados
    if( $form->loadPostInput() ) {
      // Creamos un objeto con los validadores y lo asociamos
      $form->setValidationObj( new FormValidators() );

      // $form->setValidationRule( 'input2', 'maxlength', '10' ); // CAMBIANDO AS REGLAS
      $form->validateForm();

      //$form->addFieldRuleError( 'check1', 'cogumelo', 'Un mensaxe de error de campo' );
      //$form->addFormError( 'Ola meu... ERROR porque SI ;-)' );
    }
    else {
      $form->addFormError( 'El servidor no considera válidos los datos recividos.', 'formError' );
    }

    //$form->setValidationRule('lostDate', 'uppercase', '1');

    //$form->setValidationRule( 'lostFrutas', 'notInArray', array("Peras", "Naranjas", "Melocotones"));
    //$form->setValidationRule( 'lostDate', 'dateMin', '2014-09-09' );
    //$form->setValidationRule( 'lostDate2', 'dateMax', '2014-09-09' );

    $form->validateForm();
    $jvErrors = $form->getJVErrors();

    //Si todo esta OK!
    if( sizeof( $jvErrors ) == 0 ){
      $lostControl = new LostController();
      $valuesArray = $form->getValuesArray();

      if($valuesArray['id'] !== false){
        //UPDATE
        $res = $lostControl->update($valuesArray);
      }
      else{
        //CREATE
        $res = $lostControl->create($valuesArray);
      }
    }

    if( sizeof( $jvErrors ) > 0 ) {
      echo json_encode(
        array(
          'success' => 'error',
          'jvErrors' => $jvErrors,
          'formError' => 'El servidor no considera válidos los datos. NO SE HAN GUARDADO.'
        )
      );
    }
    else {
      echo json_encode( array( 'success' => 'success') );
    }

  }

  function deleteLostForm(){
    $lostControl = new LostController();

    //Borrado  por array de ids
    /*
    $valuesArray = array('23','24','33');
    $res = $lostControl->deleteFromIds($valuesArray);
    */

    //Borrado  por id
    /*
    $res = $lostControl->deleteFromId("25");
    */

    //Borrado por list
    /*
    $res = $lostControl->listItems();
    $lostControl->deleteFromList($res->fetchAll());
    */

  }
}
