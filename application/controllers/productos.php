<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Productos extends CI_Controller {

	function __construct() 
	{
		
		parent::__construct();

		/* Cargamos la base de datos */
		$this->load->database();

		/* Cargamos la libreria*/
		$this->load->library('grocery_crud');

		/* Añadimos el helper al controlador */
		$this->load->helper('url');
		
	
	}

	function index() 
	{
		/*
		 * Mandamos todo lo que llegue a la funcion
		 * administracion().
		 **/
		$data = array (
		  'headerContent' => $this->load->view('header',array(), TRUE),
		  'mainContent' => $this->load->view('main', array(), TRUE),
		  'footerContent' => $this->load->view('footer', array(), TRUE),
		);
		$this->load->view('templates/default', $data); 
		redirect('productos/administracion');
	}

	/*
	 * 
 	 **/
	function administracion()
	
	{

		try{
			
			/* Creamos el objeto */
			$crud = new grocery_CRUD();

			/* Seleccionamos el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionmos el nombre de la tabla de nuestra base de datos*/
			$crud->set_table('productos');

			/* Le asignamos un nombre */
			$crud->set_subject('Productos');

			/* Asignamos el idioma español */
			$crud->set_language('spanish');

			/* Aqui le decimos a grocery que estos campos son obligatorios */
			$crud->required_fields(
				'id',
				'consola', 
				'nom', 
				'preu_stock', 
				'quantitat'
			);

			/* Aqui le indicamos que campos deseamos mostrar */
			$crud->columns(
				'id',
				'consola',
				'nom',
				'descripcio', 
				'preu_stock', 
				'preu_venta_public', 
				'quantitat'
			);
			
			/* Generamos la tabla */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/administracion.php */
			$this->load->view('productos/administracion', $output);
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
