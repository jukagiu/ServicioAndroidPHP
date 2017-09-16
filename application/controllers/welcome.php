<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$json=json_decode(file_get_contents('php://input'));
		$nombre =$json->{'nombre'};
		$cedula =$json->{'cedula'};
		$direccion =$json->{'direccion'};
		$ciudad =$json->{'ciudad'};
		$pais =$json->{'pais'};
		$celular =$json->{'celular'};
		$wifi =$json->{'wifi'};
		$bluetooth =$json->{'bluetooth'};
		$longitud =$json->{'longitud'};
		$latitud =$json->{'latitud'};
		$foto =$json->{'foto'};
		$fotodir =date("Y-m-d-h-i-s") .'.jpg';
		if(empty($foto)){
			$fotodir="";
		}
		else{
			file_put_contents('application/image/'.  $fotodir  , base64_decode($foto));
		}

		
		$this->load->model('info');
		$data = $this->info->setInfo($nombre,$cedula,$direccion,$ciudad,$pais,$celular,$wifi,$bluetooth,$longitud,$latitud,$fotodir);
		//echo "<img src='data:image/jpeg;base64, $foto' />";	
		//$this->load->view('welcome_message');

		$respuesta=array('msg'=>$data);
		echo json_encode($respuesta);
		
	}

	public function store_user()
	{
		$myNombre = $this->input->post('nombre');
		$myApellido = $this->input->post('apellido');
		$myWifi = $this->input->post('wifi');
		$myBluetooth = $this->input->post('bluetooth');
		$this->load->model('info');
		$data = $this->info->setInfo($myNombre,$myApellido,$myWifi,$myBluetooth);

	}
}

