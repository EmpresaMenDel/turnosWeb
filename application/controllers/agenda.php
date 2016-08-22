<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->driver('session');
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	public function _example_output($output = null)
	{
		//$this->load->view('login.php',$output);

		$this->load->view('example.php',$output);
	}

	

public function listagenda()
	{
		$crud = new grocery_CRUD();

		//theme
		$crud->set_theme('bootstrap');

		//table
		$crud->set_table('agenda');

		//columns
		$crud->columns('profId','espId','empId');

		//subject
		$crud->set_subject('Agenda');

		//DISPLAY
		$crud->display_as('profId','Profesional');
		/*$crud->display_as('profNombre','Nombres');
		$crud->display_as('profDocumento','Documento');
		$crud->display_as('profFechaNacimiento','Fecha Nac.');
		$crud->display_as('profFechaRecibido','Fecha Recibido');
		$crud->display_as('profCalle','Calle');
		$crud->display_as('profCorreo','Email');		
		$crud->display_as('Celular','Tel. Celular');	
		$crud->display_as('archivoCV_Url','Curriculum');
		$crud->display_as('archivoImg_Url','Foto');
		$crud->display_as('archivoOtro_Url','Otro');
		$crud->display_as('titId','Titulo');*/

		//set relation
	/*	$crud->set_relation('titId','cattitulo','titNombre');
		$crud->set_relation_n_n('Especialidades', 'enlproferente_especialidad', 'catespecialidad', 'profId', 'espId', 'espNombre');
		$crud->display_as('paisId','Pais');
		$crud->set_relation('paisId','catPais','paisNombre');
		$crud->display_as('provId','Provincia');
		$crud->set_relation('provId','catProvincia','provNombre');
		$crud->display_as('depId','Departamento');
		$crud->set_relation('depId','catDepartamento','depNombre');
		$crud->display_as('locId','Localidad');
		$crud->set_relation('locId','catlocalidad','locNombre');	
		$crud->display_as('Codigo','Clave de acceso');	
		$crud->display_as('TeleCasa','Tel. Casa');
		$crud->display_as('TelTrabajo','Tel. Trabajo');

		//upload
		$crud->set_field_upload('archivoCV_Url','assets/uploads/files');
		$crud->set_field_upload('archivoImg_Url','assets/uploads/files');
	//	$crud->set_field_upload('archivoOtro_Url','assets/uploads/files');	
		//callbacck
		//$crud->callback_edit_field('profDocumento',array($this,'edit_Documento'));
	//	$crud->callback_add_field('profDocumento',array($this,'edit_Documento'));		


		//fieldtype
		$crud->field_type('barId','invisible');
		$crud->field_type('profFechaRecibido','invisible');
		//$crud->set_table_title('Curriculum Vitae');

		//requeried
		$crud->required_fields('profApellido','profNombre','profDocumento','profFechaNacimiento','titId','profCorreo','Codigo');

		//unset
    	$crud->unset_back_to_list();*/

    	//render
		$output = $crud->render();
		$this->_example_output($output);
		/*
		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}*/
	}	


	function edit_Documento($value, $primary_key)
{
    return '<input type="text" maxlength="50" value="'.$_SESSION['profDocumento'].'" name="profDocumento"  disabled= "disabled" style="width:462px">';
}
protected  function _date_fill_now()
		{
        return '<input name="date" type="text" value="'.  date (dd/mm/YYYY). '" maxlength="19" class="datetime-input">';
		}

public function get_buscaPorDocumento($value)
	{
	$this->db->select('"SELECT * FROM catproferente WHERE profDocumento = '.$value.' "'); 
    
   if ($query->num_rows() > 0) { 
        return true; 
    } else { 
        return false; 
    } 
    return true;
	}


	public function permisos_usr()
	{	
		return true;
	}
}