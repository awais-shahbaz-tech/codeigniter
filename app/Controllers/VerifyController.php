<?php
namespace App\Controllers;
use App\Models\AllUserModel;


class VerifyController extends BaseController
{
    public function __construct(){
        helper(['url']);
        $this -> user = new AllUserModel();
    }

    public function index()
	{
        echo view('/webpage/sections/header'); 
        echo view("/webpage/pages/Verifyotp");
        echo view('/webpage/sections/footer');
    }



    public function verifyOtp()
    {
        $email = $this->request->getPost('email');
        $otp = $this->request->getPost('otp');

        $users = $this->user->where('email', $email)->where('otp', $otp)->first();

        if ($users) {
         
                $this->user->update($users['id'], ['verify' => true, 'otp' => null,]);
                return $this->response->setJSON(['status' => "User verified successfully"] , 200);
            } 
         else {
            return $this->response->setJSON(['status' => "Invalid OTP"], 400);
        }
    }

    
    public function verifyOtpphp()
    {
        $email = session()->getFlashdata("emailuser");
        $otp = $this->request->getPost('otp');

        $users = $this->user->where('email', $email)->where('otp', $otp)->first();

        if ($users) {
         
                $this->user->update($users['id'], ['verify' => true, 'otp' => null,]);
                session()->setFlashdata('success',"User verified successfully");
                session()->setFlashdata('emailuser',"");
                return redirect()->to(base_url('webpage/login'));
                // return $this->response->setJSON(['status' => "User verified successfully"]);
            } 
         else {
            session()->setFlashdata('error',"Invalid OTP");
            // return $this->response->setJSON(['status' => "Invalid OTP"], 400);
        }
    }
}