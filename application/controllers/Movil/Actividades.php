<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("Movil/Perfil_modelo");
		$this->load->model("Movil/Lectura_modelo");
		$this->load->model("Movil/Actividades_modelo");
		if($this->session->userdata('USER_ID') == '' || $this->session->userdata('USER_TYPE') != '1') {  
            redirect(base_url());  
        } 
	}

	public function index(){
	}

	public function opcion_multiple($id_lectura){
		if($this->Lectura_modelo->getInfoLectura($id_lectura)){
			$id_teacher  = $this->session->userdata('USER_TEACHER');
			$id_alumno   = $this->session->userdata('USER_ID');

			$data = array (
				'lectura'   => $this->Lectura_modelo->getInfoLectura($id_lectura),
				'reactivos' => $this->Actividades_modelo->getReactOMByLectura($id_lectura,$id_teacher),
				'lec_alumno'   => $this->Lectura_modelo->getLecturaDetailByStudent($id_lectura,$id_alumno),
			);

			$this->load->view('student/Layout/header');
			$this->load->view('student/lectura/activities/opcion-multiple',$data);
			$this->load->view('student/Layout/footer');
		} else {
			redirect(base_url()."Movil/Lecturas");  
		}
	}

	public function verdadero_falso($id_lectura){
		if($this->Lectura_modelo->getInfoLectura($id_lectura)){
			$id_teacher  = $this->session->userdata('USER_TEACHER');
			$id_alumno   = $this->session->userdata('USER_ID');

			$data = array (
				'lectura'   => $this->Lectura_modelo->getInfoLectura($id_lectura),
				'reactivos' => $this->Actividades_modelo->getReactVFByLectura($id_lectura,$id_teacher),
				'lec_alumno'   => $this->Lectura_modelo->getLecturaDetailByStudent($id_lectura,$id_alumno),
			);

			$this->load->view('student/Layout/header');
			$this->load->view('student/lectura/activities/verdadero-falso',$data);
			$this->load->view('student/Layout/footer');
		} else {
			redirect(base_url()."Movil/Lecturas");  
		}
	}

	public function relacionar_columnas($id_lectura){
		if($this->Lectura_modelo->getInfoLectura($id_lectura)){
			$id_teacher  = $this->session->userdata('USER_TEACHER');
			$id_alumno   = $this->session->userdata('USER_ID');
			
			$data = array (
				'lectura'   => $this->Lectura_modelo->getInfoLectura($id_lectura),
				'reactivos' => $this->Actividades_modelo->getReactRCByLectura($id_lectura,$id_teacher),
				'lec_alumno'   => $this->Lectura_modelo->getLecturaDetailByStudent($id_lectura,$id_alumno),
			);

			$this->load->view('student/Layout/header');
			$this->load->view('student/lectura/activities/relacionar-columnas', $data);
			$this->load->view('student/Layout/footer');
		} else {
			redirect(base_url()."Movil/Lecturas");  
		}
	}

	public function verificar_om($id_lectura){

		$id_alumno      = $this->session->userdata('USER_ID');
		$attemps_lec    = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
		$num_reactivos  = $this->input->post("num_r");
		$correctos      = $attemps_lec['aciertos'];
		$incorrectos    = $attemps_lec['incorrectos'];
		$correctos_aux  = 0;
		$incorrectos_aux= 0;
		$new_attemps    = array('intentos_om' => $attemps_lec['intentos_om']+1);

		if($this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$new_attemps)){

			$test_result= "<div class=\"box box-solid box-shadow-sm\">
			<div class=\"box-header bg-maroon\">
			<h3 class=\"box-title\">Tus resultados son los siguientes.</h3>
			</div>
			<div class=\"box-body\">";

			for ($i=1; $i <= $num_reactivos ; $i++) { 
				$id_om = $this->input->post("idrom".$i);
				$p_om  = $this->input->post("question".$i);
				$r_om  = $this->input->post("resp".$i);

				if($this->Actividades_modelo->checkReactiveOM($id_om,$r_om)){
					$test_result = $test_result. 
					"<form class=\"padding-square-no-top-bottom\">
					<blockquote class=\"no-padding bg-block-gray\">
					<h4 class=\"no-padding-bottom text-green\"><b class=\"respuesta\">".$p_om."</b></h4>
					<div id=\"sdd\" class=\" no-padding-top\">
					<p>
					<input type=\"radio\" name=\"r3\" class=\"flat-red\" disabled>
					<label class='text-verde-dark'>¡Correcto!</label> Tu respuesta fue la opción: ".$r_om."
					</p>
					</div>
					</blockquote>
					</form>";
					$correctos++;
					$correctos_aux++;
				} else {
					$test_result = $test_result.
					"<form class=\"padding-square-no-top-bottom\">
					<blockquote class=\"no-padding bg-block-gray\">
					<h4 class=\"no-padding-bottom text-rojo\"><b class=\"respuesta\">".$p_om."</b></h4>
					<div id=\"sdd\" class=\" no-padding-top\">
					<p>
					<input type=\"radio\" name=\"r3\" class=\"flat-red\" disabled>
					<label class='text-red'>¡Incorrecto!</label> Tu respuesta fue la opción: ".$r_om."
					</p>
					</div>
					</blockquote>
					</form>";
					$incorrectos++;
					$incorrectos_aux++;
				}
			}

			$attemps_lec = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
			$enable_attemps = $this->Lectura_modelo->getLecturaArray($id_lectura);
			$test_result = $test_result.($this->show_result_test($id_lectura,
				$correctos_aux,
				$incorrectos_aux,
				$attemps_lec['intentos_om'],
				$enable_attemps["attemps"],
				1));
			$test_result = $test_result." </div> </div>";

			echo $test_result;

			$aip = array(
				'aciertos'    => $correctos,
				'incorrectos' => $incorrectos,
				'fin_om'      => 1,
			);
			if($attemps_lec['intentos_om'] == $enable_attemps["attemps"] && $attemps_lec['fin_om'] != 1){
				$this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$aip);
				$this->updt_score($id_lectura);
			}
		}
	}

	public function verificar_vf($id_lectura){

		$id_alumno      = $this->session->userdata('USER_ID');
		$attemps_lec    = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
		$num_reactivos  = $this->input->post("num_r");
		$correctos      = $attemps_lec['aciertos'];
		$incorrectos    = $attemps_lec['incorrectos'];
		$correctos_aux  = 0;
		$incorrectos_aux= 0;
		$new_attemps    = array('intentos_vf' => $attemps_lec['intentos_vf']+1);

		if($this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$new_attemps)){

			$test_result= "<div class=\"box box-solid box-shadow-sm\">
			<div class=\"box-header bg-maroon\">
			<h3 class=\"box-title\">Tus resultados son los siguientes.</h3>
			</div>
			<div class=\"box-body\">";

			for ($i=1; $i <= $num_reactivos ; $i++) { 
				$id_om = $this->input->post("idrom".$i);
				$p_om  = $this->input->post("question".$i);
				$r_om  = $this->input->post("resp".$i);

				if($this->Actividades_modelo->checkReactiveVF($id_om,$r_om)){
					$test_result = $test_result. 
					"<form class=\"padding-square-no-top-bottom\">
					<blockquote class=\"no-padding bg-block-gray\">
					<h4 class=\"no-padding-bottom text-green\"><b class=\"respuesta\">".$p_om."</b></h4>
					<div id=\"sdd\" class=\" no-padding-top\">
					<p>
					<input type=\"radio\" name=\"r3\" class=\"flat-red\" disabled>
					<label class='text-verde-dark'>¡Correcto!</label> Tu respuesta fue la opción: ".$r_om."
					</p>
					</div>
					</blockquote>
					</form>";
					$correctos++;
					$correctos_aux++;
				} else {
					$test_result = $test_result.
					"<form class=\"padding-square-no-top-bottom\">
					<blockquote class=\"no-padding bg-block-gray\">
					<h4 class=\"no-padding-bottom text-rojo\"><b class=\"respuesta\">".$p_om."</b></h4>
					<div id=\"sdd\" class=\" no-padding-top\">
					<p>
					<input type=\"radio\" name=\"r3\" class=\"flat-red\" disabled>
					<label class='text-red'>¡Incorrecto!</label> Tu respuesta fue la opción: ".$r_om."
					</p>
					</div>
					</blockquote>
					</form>";
					$incorrectos++;
					$incorrectos_aux++;
				}
			}

			$attemps_lec    = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
			$enable_attemps = $this->Lectura_modelo->getLecturaArray($id_lectura);
			$test_result    = $test_result.($this->show_result_test($id_lectura,
				$correctos_aux,
				$incorrectos_aux,
				$attemps_lec['intentos_vf'],
				$enable_attemps["attemps"],
				2));
			$test_result = $test_result." </div> </div>";

			echo $test_result;

			$aip = array(
				'aciertos'    => $correctos,
				'incorrectos' => $incorrectos,
				'fin_vf'      => 1,
			);
			if($attemps_lec['intentos_vf'] == $enable_attemps["attemps"] && $attemps_lec['fin_vf'] != 1){
				$this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$aip);
				$this->updt_score($id_lectura);
			}
		}
	}

	public function verificar_rc($id_lectura){

		$id_alumno      = $this->session->userdata('USER_ID');
		$attemps_lec    = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
		$num_reactivos  = $this->input->post("num_r");
		$correctos      = $attemps_lec['aciertos'];
		$incorrectos    = $attemps_lec['incorrectos'];
		$correctos_aux  = 0;
		$incorrectos_aux= 0;
		$new_attemps    = array('intentos_rc' => $attemps_lec['intentos_rc']+1);

		if($this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$new_attemps)){

			$test_result= "<div class=\"box box-solid box-shadow-sm\">
			<div class=\"box-header bg-maroon\">
			<h3 class=\"box-title\">Tus resultados son los siguientes.</h3>
			</div>
			<div class=\"box-body\">";

			for ($i=1; $i <= $num_reactivos ; $i++) { 
				$id_rc  = $this->input->post("idrrc".$i);
				$p_rc   = $this->input->post("question".$i);
				$idx_p  = $this->input->post("p_".$i);
				$idx_r  = $this->input->post("r_".$i);
				$res_i  = $this->input->post("rt_".$i);

				if($idx_p == $idx_r){
					$test_result = $test_result. 
					"<form class=\"padding-square-no-top-bottom\">
					<blockquote class=\"no-padding bg-block-gray\">
					<h4 class=\"no-padding-bottom text-green\"><b class=\"respuesta\">".$p_rc."</b></h4>
					<div id=\"sdd\" class=\" no-padding-top\">
					<p>
					<input type=\"radio\" name=\"r3\" class=\"flat-red\" disabled>
					<label class='text-verde-dark'>¡Correcto!</label> Tu respuesta fue: ".$res_i."
					</p>
					</div>
					</blockquote>
					</form>";
					$correctos++;
					$correctos_aux++;
				} else {
					$test_result = $test_result.
					"<form class=\"padding-square-no-top-bottom\">
					<blockquote class=\"no-padding bg-block-gray\">
					<h4 class=\"no-padding-bottom text-rojo\"><b class=\"respuesta\">".$p_rc."</b></h4>
					<div id=\"sdd\" class=\" no-padding-top\">
					<p>
					<input type=\"radio\" name=\"r3\" class=\"flat-red\" disabled>
					<label class='text-red'>¡Incorrecto!</label> Tu respuesta fue: ".$res_i."
					</p>
					</div>
					</blockquote>
					</form>";
					$incorrectos++;
					$incorrectos_aux++;
				}
			}

			$attemps_lec = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
			$enable_attemps = $this->Lectura_modelo->getLecturaArray($id_lectura);
			$test_result = $test_result.($this->show_result_test($id_lectura,
				$correctos_aux,
				$incorrectos_aux,
				$attemps_lec['intentos_rc'],
				$enable_attemps["attemps"],
				3));
			$test_result = $test_result." </div> </div>";

			echo $test_result;

			$aip = array(
				'aciertos'    => $correctos,
				'incorrectos' => $incorrectos,
				'fin_rc'      => 1,
			);
			if($attemps_lec['intentos_rc'] == $enable_attemps["attemps"] && $attemps_lec['fin_rc'] != 1){
				if($this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$aip)){
					$this->updt_score($id_lectura);
				}

			}
		}
	}

	public function show_result_test($id_lectura,$correctos_aux,$incorrectos_aux,$attemps_a,$attemps_l,$actividad){

		$test_result = "";
		$id_alumno   = $this->session->userdata('USER_ID');

		$test_result = $test_result."<form id=\"results-vf\" method=\"post\" action=\"".base_url()."Movil/Actividades/updt_aip/".$id_lectura."\">
		<input class=\"question_hide\" hidden=\"hidden\" name=\"type_reactive\" value=\"".$actividad."\" readonly>
		<div class='row'>
		<div class='col-sm-1'></div>
		<div class='col-sm-5 border-right'>
		<div class='box box-widget widget-user-2 no-shadow'>
		<div class='widget-user-header' style='padding: 10px 10px 5px 10px;''>
		<div class='widget-user-image'>
		<img class='img-circle img-thumbnail circle-green' 
		src='".base_url()."assets/img/star.png' alt='User Avatar'>
		</div>
		<h5 class='widget-user-desc text-gris'>Aciertos</h5>
		<h4 class='widget-user-desc box-title'>
		<input class='label-input' type='text' name='aciertos_result' value='".$correctos_aux."' readonly>
		</h4>
		<h5 class='widget-user-desc text-verde-dark'>
		<i class='fa fa-check-circle'></i> Aciertos por actividad 
		</h5>
		</div>
		</div>
		</div>
		<div class='col-sm-1'></div>

		<div class='col-sm-5 border-right'>
		<div class='box box-widget widget-user-2 no-shadow'>
		<div class='widget-user-header' style='padding: 10px 10px 5px 10px;'>
		<div class='widget-user-image'>
		<img class='img-circle img-thumbnail circle-red' 
		src='".base_url()."assets/img/error.png' alt='User Avatar'>
		</div>
		<h5 class='widget-user-desc text-gris'>Incorrectos</h5>
		<h4 class='widget-user-desc box-title'>
		<input class='label-input' type='text' name='incorrectos_result' value='".$incorrectos_aux."' readonly>
		</h4>
		<h5 class='widget-user-desc text-rojo'>
		<i class='fa fa-times-circle'></i> Incorrectos por actividad 
		</h5>
		</div>
		</div>
		</div>
		</div>
		<div class='box-footer text-center'>";

		$attemps_lec = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
		$enable_attemps = $this->Lectura_modelo->getLecturaArray($id_lectura);

		if($attemps_a < $attemps_l){
			switch ($actividad) {
				case 1:
				$test_result = $test_result."<button type='submit' class='btn btn-flat bg-maroon'><i class='fa fa-check-circle'></i> Guardar</button>
				<a href=\"".base_url()."Movil/Actividades/opcion_multiple/".$id_lectura."\" class=\"btn btn-flat btn-defaul bg-gray\"><i class=\"fa fa-refresh\"></i> Repetir</a>";
				break;
				case 2:
				$test_result = $test_result."<button type='submit' class='btn btn-flat bg-maroon'><i class='fa fa-check-circle'></i> Guardar</button>
				<a href=\"".base_url()."Movil/Actividades/verdadero_falso/".$id_lectura."\" class=\"btn btn-flat btn-defaul bg-gray\"><i class=\"fa fa-refresh\"></i> Repetir</a>";
				break;
				case 3:
				$test_result = $test_result."<button type='submit' class='btn btn-flat bg-maroon'><i class='fa fa-check-circle'></i> Guardar rc</button>
				<a href=\"".base_url()."Movil/Actividades/relacionar_columnas/".$id_lectura."\" class=\"btn btn-flat btn-defaul bg-gray\"><i class=\"fa fa-refresh\"></i> Repetir</a>";
				break;
			}
		} else {
			$test_result = $test_result."<h1 class='text-yellow'>¡Te has quedado sin intentos!</h1>
			<a href='".base_url().'Movil/Lecturas/detail/'.$id_lectura."' class='btn btn-flat bg-yellow'>
			<i class='fa fa-check-circle'></i> Aceptar
			</a>";
		}

		$test_result = 
		$test_result."  </div>
		</form>";

		return $test_result;
	}

	public function updt_aip($id_lectura){
		$id_teacher  = $this->session->userdata('USER_TEACHER');
		$id_alumno   = $this->session->userdata('USER_ID');
		$aciertos    = $this->input->post('aciertos_result');
		$incorrectos = $this->input->post('incorrectos_result');
		$actividad   = $this->input->post('type_reactive');

		$attemps_lec = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
		$new_aip     = array();

		switch ($actividad) {
			case 1:
			$new_aip = array(
				'aciertos'    => ($attemps_lec['aciertos']+$aciertos),
				'incorrectos' => ($attemps_lec['incorrectos']+$incorrectos),
				'fin_om'      => 1,
			);
			break;
			case 2:
			$new_aip = array(
				'aciertos'    => ($attemps_lec['aciertos']+$aciertos),
				'incorrectos' => ($attemps_lec['incorrectos']+$incorrectos),
				'fin_vf'      => 1,
			);
			break;
			case 3:
			$new_aip = array(
				'aciertos'    => ($attemps_lec['aciertos']+$aciertos),
				'incorrectos' => ($attemps_lec['incorrectos']+$incorrectos),
				'fin_rc'      => 1,
			);
			break;

			default:
			break;
		}

		if($this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$new_aip)){
			$this->updt_score($id_lectura);
			redirect(base_url().'Movil/Lecturas/detail/'.$id_lectura);  
		}
	}

	public function updt_score($id_lectura){
		$id_teacher  = $this->session->userdata('USER_TEACHER');
		$id_alumno   = $this->session->userdata('USER_ID');

		$tabla_lectura        = $this->Lectura_modelo->getLecturaArray($id_lectura);
		$tabla_lectura_alumno = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);

		if($tabla_lectura_alumno["num_complete_activities"] < $tabla_lectura["num_active_activities"]){
			$countActivitiesComplete = $tabla_lectura_alumno["num_complete_activities"]+1;
			$actividad_completada = array(
				'num_complete_activities' => $countActivitiesComplete,
			);
			$this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$actividad_completada);
		} 

		$lectura_alumno = $this->Actividades_modelo->getLecturaAlumnoArray($id_lectura,$id_alumno);
		if($lectura_alumno["num_complete_activities"] === $tabla_lectura["num_active_activities"]){
			$aciertos        = $lectura_alumno["aciertos"];
			$total_reactivos = ($lectura_alumno["incorrectos"]+$lectura_alumno["aciertos"]);
			$calificacion    = (100/$total_reactivos)*$aciertos;
			$lectura_completada = array(
				'calificacion' => $calificacion,
				'reactivos'    => "Completo",
				'idEstado'     => "5",
				'fecha'        => date('Y-m-d'),
			);
			$this->Lectura_modelo->updtLecturaAlumno($id_lectura,$id_alumno,$lectura_completada);
		}
	}

}