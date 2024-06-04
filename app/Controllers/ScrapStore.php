<?php

namespace App\Controllers;
require_once(__DIR__ . '/../simple_html_dom.php');

class ScrapStore extends BaseController
{
    public $alldata = [];
  

    public function index($page ,$brand,  $pageno )
    { 

        if ($brand === "ideas") {
            $this->datascrapphp($pageno);
        } elseif ($brand === "jdot") {
            $this->datascrapjdotphp($pageno);
        }
       
        echo view('/webpage/sections/header');    
        echo view("/webpage/pages/" . $page, ['alldata' => $this->alldata]);
        echo view('/webpage/sections/footer');
    }

    public function datascrap($id) {
         
           $url = "https://www.gulahmedshop.com/unstitched-fabric/lawn-collection/summer-essential-collection?p={$id}";
        //    $htmlContent = file_get_contents($url);
           $html =file_get_html($url);



            $html->find('title',0)->plaintext ;
           $products = [];
       
           $productItems = $html->find('.product-item');
       
          foreach ($productItems as $product) {     
               $productLink = $product->find('.product-item-link', 0);
               $name = $productLink ? trim($productLink->plaintext) : 'N/A';
             
               $priceElement = $product->find('.price', 0);
               $price = $priceElement ? trim($priceElement->plaintext) : 'N/A';
            
               $imageElement = $product->find('img', 0);
               $image = $imageElement ? $imageElement->getAttribute('data-owlsrc') : 'N/A';
   
               $products[] = [
                   'name' => $name,
                   'price' => $price,
                   'image' => $image
               ];
           }
           $this->alldata = [
            'title' => $html->find('title', 0)->plaintext,
            'products' => $products
        ];
        return $this->response->setJSON($this->alldata);
       
        

    }

    
    public function datascrapjdot($id) {
         
        $url = "https://www.junaidjamshed.com/womens/semi-formal-stitched/formal-unstitched.html?product_list_limit=36";
     //    $htmlContent = file_get_contents($url);
        $html =file_get_html($url);



         $html->find('title',0)->plaintext ;
        $products = [];
    
        $productItems = $html->find('.product-item');
    
       foreach ($productItems as $product) {     
            $productLink = $product->find('.product-item-link', 0);
            $name = $productLink ? trim($productLink->plaintext) : 'N/A';
          
            $priceElement = $product->find('.price', 0);
            $price = $priceElement ? trim($priceElement->plaintext) : 'N/A';
         
            $imageElement = $product->find('img', 0);
            $image = $imageElement ? $imageElement->getAttribute('data-original') : 'N/A';

            $products[] = [
                'name' => $name,
                'price' => $price,
                'image' => $image
            ];
        }
        $this->alldata = [
         'title' => $html->find('title', 0)->plaintext,
         'products' => $products
     ];
     return $this->response->setJSON($this->alldata);
    
     

 }

 public function datascrapjdotphp($id) {
         
    $url = "https://www.junaidjamshed.com/womens/semi-formal-stitched/formal-unstitched.html?product_list_limit=36";
 //    $htmlContent = file_get_contents($url);
    $html =file_get_html($url);



     $html->find('title',0)->plaintext ;
    $products = [];

    $productItems = $html->find('.product-item');

   foreach ($productItems as $product) {     
        $productLink = $product->find('.product-item-link', 0);
        $name = $productLink ? trim($productLink->plaintext) : 'N/A';
      
        $priceElement = $product->find('.price', 0);
        $price = $priceElement ? trim($priceElement->plaintext) : 'N/A';
     
        $imageElement = $product->find('img', 0);
        $image = $imageElement ? $imageElement->getAttribute('data-original') : 'N/A';

        $products[] = [
            'name' => $name,
            'price' => $price,
            'image' => $image
        ];
    }
    $this->alldata = [
     'title' => $html->find('title', 0)->plaintext,
     'products' => $products
 ];
 return json_encode($this->alldata);
}

    public function datascrapphp($id) {
         
        $url = "https://www.gulahmedshop.com/unstitched-fabric/lawn-collection/summer-essential-collection?p={$id}";
     //    $htmlContent = file_get_contents($url);
        $html =file_get_html($url);



         $html->find('title',0)->plaintext ;
        $products = [];
    
        $productItems = $html->find('.product-item');
    
       foreach ($productItems as $product) {     
            $productLink = $product->find('.product-item-link', 0);
            $name = $productLink ? trim($productLink->plaintext) : 'N/A';
          
            $priceElement = $product->find('.price', 0);
            $price = $priceElement ? trim($priceElement->plaintext) : 'N/A';
         
            $imageElement = $product->find('img', 0);
            $image = $imageElement ? $imageElement->getAttribute('data-owlsrc') : 'N/A';

            $products[] = [
                'name' => $name,
                'price' => $price,
                'image' => $image
            ];
        }
        $this->alldata = [
         'title' => $html->find('title', 0)->plaintext,
         'products' => $products
     ];
     return json_encode($this->alldata);
    
     

 }


 public function setSessionData()
 {
   
     // Get the POST data
     $name = $this->request->getPost('name');
     $image = $this->request->getPost('image');
     $price = $this->request->getPost('price');

     // Start the session if not already started
     $session = session();
     $session->remove('detail');
     // Set session data
     $session->set('detail' , [
         'name' => $name,
         'image' => $image,
         'price' => $price
     ]);

     // Send a JSON response back to the client
     return $this->response->setJSON(['status' => 'success']);
 }
}
?>