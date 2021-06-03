<?php
class Logins extends Controller {
    public function __construct() {
        $this->userModel = $this->model('Login');
        $this->userAhmModel = $this->model('userahm');
    }

    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'phone' => '',
            'gender' => '',
            'address' => '',
            'birthday' => '',
            'confirmPassword' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'phone' => trim($_POST['phone']),
                'gender' => 1,
                // 'gender' => trim($_POST['gender']),
                'address' => trim($_POST['address']),
                'birthday' => trim($_POST['birthday']),
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            
            $passwordValidation ="#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";

           
            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userAhmModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }
            

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (!preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $data['role'] = 0;
                $data['state'] = 1;
                //Register user from model function
                if ($this->userAhmModel->store($data) == "Tao tai khoan thanh cong") {
                    //Redirect to the login page
                    
                    $this->view('index', $data);
                    echo '<script>alert("Đăng ký thành công")</script>';
                } else {
                    
                    $this->function_alert("Đăng ký thất bại");
                }
            }
        }
        
        
    }

    public function login() {
        $data = [
            'title' => 'Login page',
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => ''
        ];
        
        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => '',
            ];
            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            }
            else     
                $data['emailError'] = '';

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                
                if ($loggedInUser) {
                    
                    $this->createUserSession($loggedInUser);
                    
                } else {
                    $data['passwordError'] = 'Password or email is incorrect. Please try again.';

                    $this->view('index', $data);
                }
            }

        } else {
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
        }
        
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->AUTO_INCREMENT;
        $_SESSION['email'] = $user->email;
        $_SESSION['role_id'] = $user->role;
        header('location:' . URLROOT );
        
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['role_id']);
        header('location:' . URLROOT );
        
    }
    function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
    }
}
