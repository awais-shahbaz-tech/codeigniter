<?php
namespace App\Controllers;



class AdminController extends BaseController
{
  

    public function index()
	{   
        $token = get_cookie('token');
        if($token){
            echo view('/admin/Sections/Header'); 
            echo view('/admin/pages/Dashboard'); 
            echo view('/admin/Sections/Footer'); 
        }
        else{
            return redirect()->to(base_url('admin/login'));
        }
      
     
    }

}