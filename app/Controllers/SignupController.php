<?php
namespace App\Controllers;
use App\Models\AllUserModel;


class SignupController extends BaseController
{
    public function __construct(){
        helper(['url']);
        $this -> user = new AllUserModel();
    }

    public function index()
	{
        echo view('/webpage/sections/header'); 
        echo view("/webpage/pages/Signup");
        echo view('/webpage/sections/footer');
    }

  
   

    public function saveUser(){
        $username = $this->request->getPost('username');
        $useremail = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Generate a verification otp
        $otp = random_int(1000, 9999);

        $this->user->save(["username"=> $username, "email"=>$useremail , "password"=>$password ,  "otp" => $otp, "verify"=>false]);
        $email = \Config\Services::email();
      
        $email->setTo($useremail);
        $email->setFrom("usmanhanif9876@gmail.com", "Confirm User");

        $email->setSubject("OTP");
        $message = "Your OTP for email verification is: " . $otp;
        $email->setMessage($message);

        if ($email->send())
		{
            return $this->response->setJSON(['status' =>"Mail sent successfully"]);
        }
        else{
            return $this->response->setJSON(['status' => "Failed to send email"], 500);
        }
       
       
   
    }
    public function saveUserphp(){
        $username = $this->request->getPost('username');
        $useremail = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Generate a verification otp
        $otp = random_int(1000, 9999);

        $this->user->save(["username"=> $username, "email"=>$useremail , "password"=>$password ,  "otp" => $otp, "verify"=>false]);
        $email = \Config\Services::email();
      
        $email->setTo($useremail);
        $email->setFrom("usmanhanif9876@gmail.com", "Confirm User");

        $email->setSubject("OTP");
        $message = "Your OTP for email verification is: " . $otp;
        $email->setMessage($message);

        if ($email->send())
		{
            session()->setFlashdata('emailuser',$useremail);
            return redirect()->to(base_url('webpage/verify'));
            
        }
        else{
            return redirect()->to(base_url('webpage/signup'));
        }
       
       
   
    }
}