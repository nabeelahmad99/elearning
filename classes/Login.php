<?php
require_once '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';
class Login extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;

		parent::__construct();
		ini_set('display_error', 1);
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function index(){
		echo "<h1>Access Denied</h1> <a href='".base_url."'>Go Back.</a>";
	}
	public function login(){
		extract($_POST);

		$qry = $this->conn->query("SELECT * from users where username = '$username' and password = md5('$password') ");
		if($qry->num_rows > 0){
			foreach($qry->fetch_array() as $k => $v){
				if(!is_numeric($k) && $k != 'password'){
					$this->settings->set_userdata($k,$v);
				}

			}
			$this->settings->set_userdata('login_type',1);
		$sy = $this->conn->query("SELECT * FROM academic_year where status = 1");
		foreach($sy->fetch_array() as $k =>$v){
			if(!is_numeric($k)){
			$this->settings->set_userdata('academic_'.$k,$v);
			}
		}
		return json_encode(array('status'=>'success'));
		}else{
		return json_encode(array('status'=>'incorrect','last_qry'=>"SELECT * from users where username = '$username' and password = md5('$password') "));
		}
	}

	
	public function signup() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$student_id = ($_POST['student_id']);
			$first_name = ($_POST['firstname']);
			$middle_name =($_POST['middlename']);
			$last_name =  ($_POST['lastname']);
			$email =      ($_POST['email']);
			$contact =    ($_POST['contact']);
			$address =    ($_POST['address']);
			$gender =     ($_POST['gender']);
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$otp = $_POST['otp'];

			if (!$this->verifyOtp($email, $otp)) {
				return json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP.']);
			}
			// Check if the student ID or email already exists
			$stmt = $this->conn->prepare("SELECT * FROM students WHERE student_id = ? OR email = ?");
			$stmt->bind_param("ss", $student_id, $email);
			$stmt->execute();
			$result = $stmt->get_result();
	
			if ($result->num_rows > 0) {
				return json_encode(['status' => 'error', 'message' => 'Student ID or Email already exists.']);
			}
	
			// Insert new user into the database
			$stmt = $this->conn->prepare("INSERT INTO students (student_id, firstname, middlename, lastname, email, contact, address, gender, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssss", $student_id, $first_name, $middle_name, $last_name, $email, $contact, $address, $gender, $password);
	
			if ($stmt->execute()) {
				return json_encode(['status' => 'success']);
			} else {
				return json_encode(['status' => 'error', 'message' => 'Failed to sign up. Please try again.']);
			}
		}
	}


	public function sendOtp($email) {

		if (empty($email)) {
			return json_encode(['status' => 'error', 'message' => 'No email provided.']);
		}
	
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
		}
	
		$otp = rand(100000, 999999); 
		$expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));
	
		$stmt = $this->conn->prepare("INSERT INTO otp_verification (email, otp, expiry) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $email, $otp, $expiry);
		$stmt->execute();
	

		$mail = new PHPMailer(true);

		try {
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth = true;
			$mail->Username = 'nab.ahmad55@gmail.com';  
			$mail->Password = 'pfbe kslv efbg mzap';  
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
	
			$mail->setFrom('nab.ahmad55@gmail.com');
			$mail->addAddress($email);  
	
			$mail->isHTML(true);
			$mail->Subject = 'Your OTP Code';
			$mail->Body    = 'Your OTP code is: ' . $otp . '. It is valid for 5 minutes.';
	
			$mail->send();
	
			return json_encode(["status" => "success", "message" => "OTP sent to your email."]);
		} catch (Exception $e) {
			return json_encode(["status" => "error", "message" => "OTP could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
		}
	}
	
	
	public function verifyOtp($email, $otp) {
		$stmt = $this->conn->prepare("SELECT * FROM otp_verification WHERE email = ? AND otp = ? AND expiry > NOW()");
		$stmt->bind_param("ss", $email, $otp);
		$stmt->execute();
		$result = $stmt->get_result();
	
		if ($result->num_rows > 0) {
			return true; 
		}
		return false; 
	}
	
	
	public function flogin(){
		extract($_POST);

		$qry = $this->conn->query("SELECT * from faculty where  faculty_id = '$faculty_id' and `password` = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach($qry->fetch_array() as $k => $v){
				if(!is_numeric($k)){
					$this->settings->set_userdata($k,$v);
				}

			}
			$this->settings->set_userdata('login_type',2);
			$sy = $this->conn->query("SELECT * FROM academic_year where status = 1");
		foreach($sy->fetch_array() as $k =>$v){
			if(!is_numeric($k)){
			$this->settings->set_userdata('academic_'.$k,$v);
			}
		}
			return json_encode(array('status'=>'success'));
		}else{
		return json_encode(array('status'=>'incorrect'));
		}
	}
	public function slogin() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$student_id = $_POST['student_id'];
			$password = $_POST['password'];
	
			// Fetch the student's record by ID
			$stmt = $this->conn->prepare("SELECT * FROM students WHERE student_id = ?");
			$stmt->bind_param("s", $student_id);
			$stmt->execute();
			$result = $stmt->get_result();
	
			if ($result->num_rows > 0) {
				$user = $result->fetch_assoc(); // Get user data
	
				// Verify password
				if (password_verify($password, $user['password'])) {
					// Set user session or data
					foreach ($user as $key => $value) {
						if (!is_numeric($key)) {
							$this->settings->set_userdata($key, $value);
						}
					}
					$this->settings->set_userdata('login_type', 3);
	
					// Fetch academic year data (if needed)
					$sy = $this->conn->query("SELECT * FROM academic_year WHERE status = 1");
					while ($row = $sy->fetch_assoc()) {
						foreach ($row as $k => $v) {
							if (!is_numeric($k)) {
								$this->settings->set_userdata('academic_' . $k, $v);
							}
						}
					}
	
					return json_encode(['status' => 'success']);
				} else {
					return json_encode(['status' => 'error', 'message' => 'Incorrect password']);
				}
			} else {
				return json_encode(['status' => 'error', 'message' => 'Student ID not found']);
			}
		}
		return json_encode(['status' => 'error', 'message' => 'Invalid request method']);
	}
	
	public function logout(){
		if($this->settings->sess_des()){
			redirect('admin/login.php');
		}
	}
	public function flogout(){
		if($this->settings->sess_des()){
			redirect('faculty/login.php');
		}
	}
	public function slogout(){
		if($this->settings->sess_des()){
			redirect('student/login.php');
		}
	}
}
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action) {
	case 'login':
		echo $auth->login();
		break;
	case 'signup':
		echo $auth->signup();
		break;
	case 'sendotp':
		
		echo $auth->sendOtp($_POST['email']);
		break;	
	case 'verifyOtp':
		echo $auth->verifyOtp();
		break;	
	case 'flogin':
		echo $auth->flogin();
		break;
	case 'slogin':
		echo $auth->slogin();
		break;
	case 'logout':
		echo $auth->logout();
		break;
	case 'flogout':
		echo $auth->flogout();
		break;
	case 'slogout':
		echo $auth->slogout();
		break;
	default:
		echo $auth->index();
		break;
}

