<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Welcome_model");
		$this->load->model("Web/Usuario_model");
    }

	public function index(){
		if(empty($this->session->userdata('USER_ID')) && empty($this->session->userdata('USER_TYPE'))){
			$this->load->view('login');
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '1'){
			redirect(base_url()."Movil/Home");
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '2'){
			redirect(base_url()."Web/Home");
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3'){
			redirect(base_url()."Web/admin/home");
		}
	}

	public function registro(){
		if(empty($this->session->userdata('USER_ID')) && empty($this->session->userdata('USER_TYPE'))){
			$this->load->view('login/registro');
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '1'){
			redirect(base_url()."Movil/Home");
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '2'){
			redirect(base_url()."Web/Home");
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3'){
			redirect(base_url()."Web/admin/home");
		}
	}

	public function forgot(){
		if(empty($this->session->userdata('USER_ID')) && empty($this->session->userdata('USER_TYPE'))){
			$this->load->view('login/forgot');
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '1'){
			redirect(base_url()."Movil/Home");
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '2'){
			redirect(base_url()."Web/Home");
		} else if($this->session->userdata('USER_ID') != '' && $this->session->userdata('USER_TYPE') == '3'){
			redirect(base_url()."Web/admin/home");
		}
	}

	public function resetPassword($token){
		if(isset($token)){
			if($this->Welcome_model->verifyToken($token)){
				$dataToekn = array('tokenD' => $token, );
				$this->load->view('login/change_password',$dataToekn);
			} else {
				redirect(base_url()."Notfound");
			}
		} else {
			redirect(base_url()."Notfound");
		}
	}

	public function verificar(){
		$errors = []; 
		$errors = []; 
		$nombre = ucwords(trim($this->input->post("reg_name")));
		$paterno = ucwords(trim($this->input->post("reg_paterno")));
		$materno = ucwords(trim($this->input->post("reg_materno")));
		$usuario = trim($this->input->post("reg_user"));
		$email = trim($this->input->post("reg_email"));
		$password = trim($this->input->post("reg_password"));
		$password_confirm = trim($this->input->post("reg_password_confirm"));
		$tipo = 2;

		// VALIDACION NIVEL HTML
		if($this->isNull($nombre,$paterno,$materno,$usuario,$email,$password,$password_confirm)){
			$errors[] = "Por favor, completa todos los campos.";
		}

		if(!$this->isEmail($email)){
			$errors[] = "Por favor, ingresa un email valido.";
		}

		if(!$this->validaPassword($password,$password_confirm)){
			$errors[] = "Las contraseñas no coinciden.";
		}

		//VALIDACION A NIVEL SQL
		if($this->Welcome_model->usuarioExiste($usuario)){
            $errors[] = "El nombre de usuario $usuario ya existe.";
        }

        if($this->Welcome_model->correoExiste($email)){
         	$errors[] = "El correo electronico $email ya esta registrado.";   
        }

        if(count($errors) == 0){
        	$this->registerUser($nombre,$paterno,$materno,$email,$usuario,$password);
        } else {
        	$arrayName = array('errors' => $errors);
        	$this->load->view('login/registro',$arrayName);
        }
	}

	public function registerUser($nombre,$paterno,$materno,$email,$usuario,$password){
		
		$tipo = 2;
		$pass_hash = password_hash(base64_encode(hash('sha256', $password, true)),PASSWORD_DEFAULT);
        	
    	$registro = array(
            'nombre'     => $nombre,
            'a_paterno'  => $paterno,
            'a_materno'  => $materno,
            'correo'     => $email,
            'usuario'    => $usuario,
            'password'   => $pass_hash,
            'tipo'       => $tipo
        );

        if($this->registrarUsuario($registro) > 0){
        	redirect(base_url()."Welcome");
        } else {
        	$errors[] = "No se pudo registrar";
        	$arrayName = array('errors' => $errors);
        	$this->load->view('registro',$arrayName);
        }
	}

	public function iniciarSesion(){

		$errors  = array(); 
		$usuario = $this->input->post("log_username");
		$pass    = $this->input->post("log_passowrd");
		$tipo 	 = $this->input->post("log_tipo_usuario");

		switch ($tipo) {
			case 0: //NO SE SELECCIONO NINGUN TIPO
				$this->session->set_flashdata('error', 'Selecciona un tipo de usuario.');  
		        redirect(base_url().'Welcome'); 
				break;
			case 1: //ALUMNO
				if($this->isNullLogin($usuario,$pass)){
					$this->session->set_flashdata('error', 'Campos requeridos');  
		            redirect(base_url().'Welcome'); 
				} else {
					if($this->Welcome_model->getLoginAlumno($usuario)){
						$fila = $this->Welcome_model->getLoginAlumno($usuario);

						$id_a      = $fila['idAlumno'];
						$nombre_a  = $fila['nombre'];
						$nombre_ca = $fila['nombre']." ".$fila['a_paterno']." ".$fila['a_materno'];
						$usuario_a = $fila['usuario'];
						$pass_a    = $fila['password'];
						$gender_a  = $fila['genero'];
						$gyg       = $fila['grado']." ".$fila['grupo'];
						$teacher_a = $fila['idUsuario'];
						$theme_a   = $fila['theme'];

						if($pass == $pass_a){

							//SESSIONS STRAT
							$session_data = array(
								'USER_ID'      => $id_a,
								'USER_NAME'    => $nombre_a,
								'USER_NAME_C'  => $nombre_ca,
								'USER_USER'    => $usuario_a,
								'USER_PASS'    => $pass_a,
								'USER_GENDER'  => $gender_a,
								'USER_GYG'     => $gyg,
								'USER_TEACHER' => $teacher_a,
								'USER_THEME'   => $theme_a,
								'USER_SESSION' => $fila['last_session'],
								'USER_TYPE'    => "1"
							);
							$this->session->set_userdata($session_data); 
							
							redirect(base_url()."Movil/Home");
						} else {  
		                     $this->session->set_flashdata('error', 'Contraseña incorrecta');  
		                     redirect(base_url().'Welcome');  
		                } 

					} else {
						$this->session->set_flashdata('error', 'El nombre de usuario o correo electr&oacute;nico no existe');  
		                redirect(base_url().'Welcome'); 
					}
				}
				break;
			case 2: //MAESTRO
				if($this->isNullLogin($usuario,$pass)){
					$this->session->set_flashdata('error', 'Campos requeridos');  
		            redirect(base_url().'Welcome'); 
				} else {
					if($this->Welcome_model->getLogin($usuario)){
						$fila = $this->Welcome_model->getLogin($usuario);

						$id_t      = $fila['idUsuario'];
						$nombre_t  = $fila['nombre']." ".$fila['a_paterno']." ".$fila['a_materno'];
						$correo_t  = $fila['correo'];
						$usuario_t = $fila['usuario'];
						$pass_t    = $fila['password'];

						if (password_verify(
						        base64_encode(
						            hash('sha256', $pass, true)
						        ),
						        $fila['password']
						)){
							//ultima sesion
							$data = array('last_session' => date('Y-m-d H:i:s') );
							$this->Welcome_model->lastSession($id_t, $data);

							//SESSIONS STRAT
							$session_data = array(
								'USER_ID'    => $id_t,
								'USER_NAME'  => $nombre_t,
								'USER_USER'  => $usuario_t,
								'USER_EMAIL' => $correo_t,
								'USER_PASS'  => $pass_t,
								'USER_TYPE'  => "2"
							);
							$this->session->set_userdata($session_data); 
							
							redirect(base_url()."Web/Home");
						} else {  
		                     $this->session->set_flashdata('error', 'Contraseña incorrecta');  
		                     redirect(base_url().'Welcome');  
		                } 

					} else {
						$this->session->set_flashdata('error', 'El nombre de usuario o correo electr&oacute;nico no existe');  
		                redirect(base_url().'Welcome'); 
					}
				}
				
				break;
			case 3: //ADMINISTRADOR
				if($this->isNullLogin($usuario,$pass)){
					$this->session->set_flashdata('error', 'Campos requeridos');  
		            redirect(base_url().'Welcome'); 
				} else {
					if($this->Welcome_model->getLoginAdmin($usuario)){
						$fila = $this->Welcome_model->getLoginAdmin($usuario);

						$id_t      = $fila['idUsuario'];
						$nombre_t  = $fila['nombre']." ".$fila['a_paterno']." ".$fila['a_materno'];
						$correo_t  = $fila['correo'];
						$usuario_t = $fila['usuario'];
						$pass_t    = $fila['password'];

						if($pass == $pass_t){

							//ultima sesion
							$data = array('last_session' => date('Y-m-d H:i:s') );
							$this->Welcome_model->lastSession($id_t, $data);

							//SESSIONS STRAT
							$session_data = array(
								'USER_ID'    => $id_t,
								'USER_NAME'  => $nombre_t,
								'USER_USER'  => $usuario_t,
								'USER_EMAIL' => $correo_t,
								'USER_PASS'  => $pass_t,
								'USER_TYPE'  => "3"
							);
							$this->session->set_userdata($session_data); 
							
							redirect(base_url()."Web/admin/home");
						} else {  
		                    $this->session->set_flashdata('error', 'Contraseña incorrecta');  
		                    redirect(base_url().'Welcome');  
		                } 

					} else {
						$this->session->set_flashdata('error', 'El nombre de usuario o correo electr&oacute;nico no existe');  
		                redirect(base_url().'Welcome'); 
					}
				}
				break;
			default: //NO SE SELECCIONO TIPO DE USUARIO
				$this->session->set_flashdata('error', 'Selecciona un tipo de usuario.');  
		        redirect(base_url().'Welcome'); 
				break;
		}

	}

	public function resetLink(){

		$email   = trim($this->input->post("email_reset"));

		if(!$this->Welcome_model->correoExiste($email)){
         	$error = "<h1 class=\"text-base text-warning text-uppercase mb-4\">¡UPS!</h1>
			<h4>El correo ".$email.", no esta registrado en la plataforma.</h4>
			<div class=\"form-group mb-2\">
			<br>
			<a href=\"".site_url('Welcome/forgot')."\" class=\"btn bg-warning shadow px-6\">Aceptar</a>
			</div>";
			echo $error;
        } else if ($this->Welcome_model->correoExiste($email)){
        	$token_pass = md5(uniqid());
			$token_updt = array('token_password' => $token_pass, );

        	if($this->Usuario_model->updateUserTokenPass($email,$token_updt)){
        		if($this->enviarEmail(trim($this->input->post("email_reset")),$token_pass)){
        			$exito = "<h1 class=\"text-base text-green text-uppercase mb-4\">¡ENVIO EXITOSO!</h1>
        			<h4>Hemos enviado un correo a ".$email.", revisa tu bandeja de entrada para seguir con el cambio de contraseña.</h4>
        			<div class=\"form-group mb-2\">
        			<br>
        			<a href=\"".site_url('Welcome')."\" class=\"btn btn-success shadow px-6\">Aceptar</a>
        			</div>";
        			echo $exito;
	        	} else {
	        		$error = "<h1 class=\"text-base text-red text-uppercase mb-4\">¡UPS!</h1>
        			<h4>No hemos podido enviar el correo a ".$email.", intenta m&aacute;s tarde.</h4>
        			<div class=\"form-group mb-2\">
        			<br>
        			<a href=\"".site_url('Welcome')."\" class=\"btn btn-red shadow px-6\">Aceptar</a>
        			</div>";
        			echo $error;
	        	}
        	} else {
        		$error = "<h1 class=\"text-base text-red text-uppercase mb-4\">¡UPS!</h1>
    			<h4>Ocurrio un error, intenta más tarde.</h4>
    			<div class=\"form-group mb-2\">
    			<br>
    			<a href=\"".site_url('Welcome')."\" class=\"btn btn-red shadow px-6\">Aceptar</a>
    			</div>";
    			echo $error;
        	}
        } 
	}

	public function updatePassword($token){
		$token_user     = $token;
		if(strlen(trim($token_user)) > 0){
			$new_password_r = password_hash(base64_encode(hash('sha256', 
						$this->input->post("new_password_repeat"), true)),PASSWORD_DEFAULT);

			$data = array('password' => $new_password_r, );

			if($this->Welcome_model->forgetPassword($token_user,$data)){
				$deleteToeknPass = array('token_password' => "", );
				if($this->Usuario_model->deleteUserTokenPass($token_user,$deleteToeknPass)){
					$exito = "<h1 class=\"text-base text-green text-uppercase mb-4\">¡CONTRASEÑA ACTUALIZADA!</h1>
        			<h4>Inicia sesión para entrar a la plataforma.</h4>
        			<div class=\"form-group mb-2\">
        			<br>
        			<a href=\"".site_url('Welcome')."\" class=\"btn btn-success shadow px-6\"> Ir a inicio</a>
        			</div>";
        			echo $exito;
				} 
			} else {
				$error = "<h1 class=\"text-base text-red text-uppercase mb-4\">¡UPS!</h1>
    			<h4>Ocurrio un error, intenta más tarde.</h4>
    			<div class=\"form-group mb-2\">
    			<br>
    			<a href=\"".site_url('Welcome')."\" class=\"btn btn-red shadow px-6\">Aceptar</a>
    			</div>";
    			echo $error;
			}
		} 
	}

	public function enviarEmail($email, $token_pass){
		
		// Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $nameapp = $this->config->item('app_name');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        try {
   			$mail->isSMTP();
			$mail->CharSet = 'UTF-8';
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls'; //Modificar
			$mail->Host = 'smtp.gmail.com'; //Modificar
			$mail->Port = 587; //Modificar

            $mail->Username = 'appweblecturas@gmail.com'; //Modificar
			$mail->Password = '2tamalitosxd'; //Modificar
			
			$mail->setFrom('correo emisor','nombre'); //Modificar
			$mail->addAddress($email,'App Web Lecturas');

            $mail->isHTML(true);

            $asunto = 'Restablecer contraseña';
			$mail->Subject = utf8_decode($asunto);

			$message = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
						<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns=\"http://www.w3.org/1999/xhtml\">
						  <head>
						    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
						    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
						    <title>Restablecer la contraseña</title>
						    
						    
						  </head>
						  <body style=\"-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;\" bgcolor=\"#F2F4F6\"><style type=\"text/css\">
						body {
						width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none;
						}
						@media only screen and (max-width: 600px) {
						  .email-body_inner {
						    width: 100% !important;
						  }
						  .email-footer {
						    width: 100% !important;
						  }
						}
						@media only screen and (max-width: 500px) {
						  .button {
						    width: 100% !important;
						  }
						}
						</style>
						    <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\" bgcolor=\"#F2F4F6\">
						      <tr>
						        <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						          <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\">
						            <tr>
						              <td class=\"email-masthead\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;\" align=\"center\">
						                <a href=\"\" class=\"email-masthead_name\" style=\"box-sizing: border-box; color: #bbbfc3; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;\">
						        ".$nameapp."
						      </a>
						              </td>
						            </tr>
						            
						            <tr>
						              <td class=\"email-body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;\" bgcolor=\"#FFFFFF\">
						                <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;\" bgcolor=\"#FFFFFF\">
						                  
						                  <tr>
						                    <td class=\"content-cell\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">
						                      <h1 style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;\" align=\"left\">Hola</h1>
						                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Recientemente solicitó restablecer su contraseña para su cuenta. Use el botón de abajo para continuar.</p>
						                      
						                      <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;\">
						                        <tr>
						                          <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                            
						                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;\">
						                              <tr>
						                                <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                                  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;\">
						                                    <tr>
						                                      <td style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                                        <a href='".base_url()."Welcome/resetPassword/".$token_pass."' class=\"button button--green\" target=\"_blank\" style=\"-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; text-decoration: none;\">Restablecer contraseña</a>
						                                      </td>
						                                    </tr>
						                                  </table>
						                                </td>
						                              </tr>
						                            </table>
						                          </td>
						                        </tr>
						                      </table>
						                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Gracias
						                        <br />".$nameapp."</p>
						                    </td>
						                  </tr>
						                </table>
						              </td>
						            </tr>
						            <tr>
						              <td style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; word-break: break-word;\">
						                <table class=\"email-footer\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;\">
						                  <tr>
						                    <td class=\"content-cell\" align=\"center\" style=\"box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">
						                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">© ".$nameapp.". Todos los derechos reservados.</p>
						                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">
						                        <br />ITSOEH - Mixquiahuala de Juarez
						                        <br />
						                      </p>
						                    </td>
						                  </tr>
						                </table>
						              </td>
						            </tr>
						          </table>
						        </td>
						      </tr>
						    </table>
						  </body>
						</html>";

			$mail->Body    = $message;

            if ($mail->send()) {
                return true;
            } else {
                return false;
                
            }
        } catch (Exception $e) {
            return false;
        }
	}

    public function logout(){  
    	//ultima sesion
    	if($this->session->userdata('USER_TYPE') == 1){
    		$id_a =$this->session->userdata('USER_ID');
			$data = array('last_session' => date('Y-m-d H:i:s') );
			$this->Welcome_model->lastSessionStudent($id_a, $data);
		}
		$this->session->sess_destroy();
	    redirect(base_url().'Welcome'); 
	}

	function isNullLogin($usuario, $password){
		if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1){
			return true;
		} else {
			return false;
		}		
	}

	public function registrarUsuario($data){
		if($id = $this->Welcome_model->insertUsuario($data)){
			return $id;
		} else {
			return 0;
		}
	}


	function isNull($nombre,$paterno,$materno, $user,$email, $pass,$pass_c){
		if(strlen(trim($nombre)) < 1 || strlen(trim($paterno)) < 1 || strlen(trim($materno)) < 1 || 
			strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($email)) < 1 || strlen(trim($pass_c)) < 1){
			return true;
		} else {
			return false;
		}		
	}
	
	function isEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		} else {
			return false;
		}
	}
	
	function validaPassword($var1, $var2){
		if (strcmp($var1, $var2) !== 0){
			return false;
		} else {
			return true;
		}
	}

	function generateToken(){
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	
	function hashPassword($password){
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}

}
