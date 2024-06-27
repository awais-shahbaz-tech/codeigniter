<?php
namespace App\Controllers;
use App\Models\AllUserModel;


class UsersController extends BaseController
{
    public function __construct(){
        helper(['url' ]);
        $this -> user = new AllUserModel();
    }

    public function index()
	{   
        $data["users"] = $this->user->orderby("id" , "DESC")->paginate(10 , "no");
        $data["pager"] =  $this->user->pager;  
        echo view('/admin/Sections/Header'); 
        echo view('/admin/pages/Users/Users' , $data); 
        echo view('/admin/Sections/Footer'); 
     
    }

}