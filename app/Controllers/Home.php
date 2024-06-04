<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function __construct(){
        helper(['url']);
        $this -> user = new UserModel();
    }
    public function index()
    {
        echo view('/inc/header');
        $data["users"] = $this->user->orderby("id" , "DESC")->paginate(3 , "no");
         $data["pager"] =  $this->user->pager;       
        echo view('/home' , $data);
        echo view('/inc/footer');
    }

    public function saveUser(){
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $this->user->save(["username"=> $username, "email"=>$email , "password"=>$password]);
        
        session()->setFlashdata('success',"User saved successfully");
        return redirect()->to(base_url());
   
    }

    public function getSingleUser($id){
        $data  = $this->user->where("id" , $id)->first();
        return $this->response->setJSON($data);
      
    }

    public function editUser(){
        $id = $this->request->getVar('updateId');
        $username = $this->request->getVar("username");
        $email = $this->request->getVar("email");
        $password = $this->request->getVar("password");

        $data['username'] = $username;
        $data['password'] = $password;
        $data['email'] = $email;
        
        $this->user->update($id, $data);
        session()->setFlashdata('success',"User Update successfully");
        return redirect()->to(base_url('/'));
    }

    public function deleteUser(){
        $id = $this->request->getVar('id');
        $this->user->delete($id);
    }

}
