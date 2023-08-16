<?php

    class Users extends Controller {

        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process form
                //die('submitted');
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name'                  =>  trim($_POST['name']),
                    'email'                 =>  trim($_POST['email']),
                    'password'              =>  trim($_POST['password']),
                    'confirm_password'      =>  trim($_POST['confirm_password']),
                    'name_err'              =>  '',
                    'email_err'             =>  '',
                    'password_err'          =>  '',
                    'confirm_password_err'  =>  ''

                ];

                // Validate name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check email

                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'This email already exist';
                    }
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6 ) {
                    $data['password_err'] = 'Password length must be at east 6 characters';
                }

                //Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Password do not match';
                    }
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    //Validated
                    //die('SUCCESS');

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if ($this->userModel->register($data)) {
                        // Reson to use helper file
                        //header('location:' . URLROOT . '/users/login');
                        redirect('users/login');
                    } else  {
                        die('Something went wrong');
                    }

                } else {
                    $this->view('users/register', $data);
                }


            } else {
                 //Load form
                 //echo 'load form';
                // Init data
                $data = [
                    'name'                  =>  '',
                    'email'                 =>  '',
                    'password'              =>  '',
                    'confirm_password'      =>  '',
                    'name_err'              =>  '',
                    'email_err'             =>  '',
                    'password_err'          =>  '',
                    'confirm_password_err'  =>  ''
                ];

                // Load view
                $this -> view('users/register', $data);
            }
        }

        public function login() {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process form

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email'                 =>  trim($_POST['email']),
                    'password'              =>  trim($_POST['password']),
                    'email_err'             =>  '',
                    'password_err'          =>  ''
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }
//                elseif(strlen($data['password']) < 6 ) {
//                    $data['password_err'] = 'Password length must be at east 6 characters';
//                }

                //Make sure errors are empty
                if( empty($data['email_err']) && empty($data['password_err']) ) {
                    //Validated
                    die('SUCCESS');
                } else {
                    $this->view('users/login', $data);
                }



            } else {
                //Load form
                //echo 'load form';
                // Init data
                $data = [
                    'email'                 =>  '',
                    'password'              =>  '',
                    'email_err'             =>  '',
                    'password_err'          =>  ''
                ];

                // Load view
                $this -> view('users/login', $data);
            }
        }
    }