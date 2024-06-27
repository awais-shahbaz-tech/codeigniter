<?php
namespace App\Controllers;



class Contactus extends BaseController
{

    public function index()
	{
        echo view('/webpage/sections/header'); 
        echo view("/webpage/pages/Contactus");
        echo view('/webpage/sections/footer');
    }

    function sendMail() {
        $name = $this->request->getVar('name');
        $to = $this->request->getVar('mailTo');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');
   
        $email = \Config\Services::email();
      
        $email->setTo('usmanhanif9876@gmail.com');
        $email->setFrom($to, $name);

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send())
		{
            return $this->response->setJSON(['status' =>"Mail sent successfully"]);
        }
		else
		{
            echo "Email failed:";
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
    
    
     function sendMailphp() {
        $name = $this->request->getVar('name');
        $to = $this->request->getVar('mailTo');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');
   
        $email = \Config\Services::email();
      
        $email->setTo('usmanhanif9876@gmail.com');
        $email->setFrom($to, $name);

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send())
		{
          
             session()->setFlashdata('sentmsg',"Mail sent successfully");
              return redirect()->to(base_url('/webpage/contact-us'));
        }
		else
		{
            echo "Email failed:";
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

}