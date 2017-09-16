<?php
/**
* 
*/
class Info extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	function setInfo($nombre,$cedula,$direccion,$ciudad,$pais,$celular,$wifi,$bluetooth,$longitud,$latitud,$fotodir){
		$data = array(
        'nombre' => $nombre,
        'cedula' => $cedula,
        'direccion' => $direccion,
        'ciudad' => $ciudad,
        'pais' => $pais,
        'celular' => $celular,
        'wifi' => $wifi,
        'bluetooth' => $bluetooth,
        'longitud' => $longitud,
        'latitud' => $latitud,
        'foto' => $fotodir

        );

        $this->db->insert('info', $data);
        if($this->db->affected_rows() > 0)
        {
        	return true;
        }
        else return false;

	}
}
