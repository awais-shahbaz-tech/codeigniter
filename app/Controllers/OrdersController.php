<?php

namespace App\Controllers;

use App\Models\OrderModel;

class OrdersController extends BaseController
{
    public function __construct()
    {
        helper(['url']);
        $this->Orders = new OrderModel();
    }

    public function index()
	{   
        $token = get_cookie('token');
        if($token){
            $data["orders"] = $this->Orders->orderby("id" , "DESC")->paginate(10 , "no");
            $data["pager"] =  $this->Orders->pager;  
            echo view('/admin/Sections/Header'); 
            echo view('/admin/pages/Orders/Orders' , $data); 
            echo view('/admin/Sections/Footer'); 
        }
        else{
            return redirect()->to(base_url('admin/login'));
        }
    }


    public function CreateOrder(){
        $data = [
            'user_id' => $this->request->getPost('user_id'),
             'name' => $this->request->getPost('name'),
             'total_price' => $this->request->getPost('total_price'),
             'delivery_price' => $this->request->getPost('delivery_price'),
            'order_status' => $this->request->getPost('order_status'),
            'payment_method' => $this->request->getPost('payment_method'),
            'delivery_status' => $this->request->getPost('delivery_status'),
            'customer_location' => $this->request->getPost('customer_location')
        ];

        $this->Orders->save($data);
        return $this->response->setStatusCode(200)->setJSON(['status' => "Order Submitted Successfully"]);
       
      
   
    }
    
}