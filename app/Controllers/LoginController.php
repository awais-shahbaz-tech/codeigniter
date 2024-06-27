<?php
namespace App\Controllers;
use App\Models\AllUserModel;
use Firebase\JWT\JWT;

use CodeIgniter\Cookie\Cookie;



class LoginController extends BaseController
{
    public function __construct(){
        helper(['url', 'cookie' ]);
        $this -> user = new AllUserModel();
    }

    public function index()
	{
        echo view('/webpage/sections/header'); 
        echo view("/webpage/pages/Login");
        echo view('/webpage/sections/footer');
    }

    public function adminlogin()
	{
       
        echo view("/admin/pages/Users/Login");
        echo view('/admin/Sections/footer');
    }

  


    public function userlogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->user->where('email', $email)->first();

        if ($user) {
            if (!$user['verify']) {
                return $this->response->setJSON(['status' => "Email not verified"], 403);
            }


            // Verify the password
            if (password_verify($password, $user['password'])) {
         
                $key = "kzUf4sxss4AeG5uHkNZAqT1Nyi1zVfpz";
                $payload = [
                    'iat' => time(),
                    'exp' => time() + 3600,
                    'uid' => $user['id'],   
                    'email' => $user['email']
                ];

                $jwt = JWT::encode($payload, $key, 'HS256');
              
                return $this->response->setJSON(['status' => "Login successful" , "token" => $jwt , "userid"=>$user['id']]);
            } else {
                return $this->response->setJSON(['status' => "Invalid password"], 401);
            }
        } else {
            return $this->response->setStatusCode(404)->setJSON(['status' => "User not found"]);
        }
    }


    public function userloginphp($role = null)
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->user->where('email', $email)->first();

        if ($user) {
            if (!$user['verify']) {
                session()->setFlashdata('login',"Email not verified");
             
            }

            if (password_verify($password, $user['password'])) {
                 $key =  "kzUf4sxss4AeG5uHkNZAqT1Nyi1zVfpz";
                 session()->setFlashdata('login',"Login successful");
                 
                 $payload = [
                    'iat' => time(),
                    'exp' => time() + 3600,
                    'uid' => $user['id'],   
                    'email' => $user['email']
                ];

                $jwt = JWT::encode($payload, $key, 'HS256');
               
               //  set_cookie('token', $jwt, 14400); 
               setcookie(
                'token',   // Cookie name
                $jwt,      // Cookie value
                [
                    'expires' => time() + 14400,  // Expire in 4 hours
                    'path' => '/',                // Path
                    'domain' => '',               // Domain, set to your domain if needed
                    'secure' => false,            // True if using HTTPS
                    'httponly' => true,           // Accessible only through HTTP protocol
                    'samesite' => 'Lax'           // SameSite policy
                ]
            );

            setcookie(
                'user_id',   
                $user['id'], 
                [
                    'expires' => time() + 14400,  // Expire in 4 hours
                    'path' => '/',                // Path
                    'domain' => '',               // Domain, set to your domain if needed
                    'secure' => false,            // True if using HTTPS
                    'httponly' => true,           // Accessible only through HTTP protocol
                    'samesite' => 'Lax'           // SameSite policy
                ]
            );
                session()->setFlashdata('token',$jwt);
              if($role === "admin"){
                return redirect()->to(base_url('admin/dashboard'));
              }
              else
                 return redirect()->to(base_url('webpage/homepage'));
                


            } else {
                session()->setFlashdata('login',"Invalid password");
          
            }
        } else {
 
            session()->setFlashdata('login',"User not found");
        }
    }

    public function signout($role = null)
    {
        // Delete cookies
        setcookie('token', '', [
            'expires' => time() - 3600,
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);

        setcookie('user_id', '', [
            'expires' => time() - 3600,
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);

        // Redirect to login page or homepage
        if($role === "admin"){
        return redirect()->to(base_url('admin/login'));
        }
        else{
            return redirect()->to(base_url('webpage/login'));
        }
    }

}