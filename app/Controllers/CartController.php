<?php

namespace App\Controllers;

use App\Models\CartModel;

class CartController extends BaseController
{


    public function __construct()
    {
        helper(['url']);
        $this->cartModel = new CartModel();
    }

    public function index()
	{
       $iduser = get_cookie('user_id');
        $data["cartdata"] = $this->cartModel->where('user_id', $iduser)->findAll();
         $token = get_cookie("token");
        if ($token !== null) {
        echo view('/webpage/sections/header'); 
        
        echo view("/webpage/pages/Addtocart" , $data);
        echo view('/webpage/sections/footer');
        }else{
            return redirect()->to(base_url('webpage/login'));
        }
    }
   
  

    public function getCart($userId)
    {
        $cartItems = $this->cartModel->where('user_id', $userId)->findAll();
        return $this->response->setJSON(['data' =>$cartItems ]);
    }
 

    public function addProduct()
    {
        $token = get_cookie("token");
        if ($token !== null) {
        $userId = get_cookie('user_id');
        $brand_name = $this->request->getPost('brand_name');
        $productName = $this->request->getPost('product_name');
        $productPrice = $this->request->getPost('product_price');
        $productImage = $this->request->getPost('product_image');
        $productQuanity = $this->request->getPost('product_quantity');
  
      

        $numericPrice = str_replace(['PKR ', ','], '', $productPrice);
        $formattedPrice =  number_format((float)$numericPrice, 2, '.', '');

        $existingCart = $this->cartModel->where('user_id', $userId)->where('product_name', $productName)->first();
     
        if ($existingCart) {
            $newQuantity = $existingCart['product_quantity'] + 1;
            $this->cartModel->update($existingCart['id'], ['product_quantity' => $newQuantity]);
            $message = 'Product quantity updated in the cart';
          
        }
        else{
        $this->cartModel->save(["user_id"=> $userId, "brand_name"=>$brand_name , "product_name"=>$productName ,  "product_price"=>$formattedPrice , "product_image"=>$productImage ,"product_quantity"=>$productQuanity ]);
        $message = 'Product added to cart';
        }
        return $this->response->setJSON(['status' =>$message  ]);
    }
    else{
        return redirect()->to(base_url('webpage/login'));
    }
    }

    public function updateProduct()
    {
        $cartId = $this->request->getPost('id');
       
        $productQuanity = $this->request->getPost('product_quantity');
        $existingCart = $this->cartModel->where('id', $cartId)->first();

        $this->cartModel->update($existingCart['id'], ['product_quantity' => $productQuanity]);
     
        return $this->response->setJSON(['status' =>'Cart updated'  ]);
    }

    public function removeProduct()
    {
        $cartId = $this->request->getPost('id');   
        if ($cartId) {
            $this->cartModel->delete($cartId);
            $status = 'Product removed from cart';
        } else {
            $status = 'Product not found in cart';
        }
        return $this->response->setJSON(['status' =>$status  ]);
      
    }
}
?>