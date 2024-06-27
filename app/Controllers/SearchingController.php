<?php
namespace App\Controllers;
use App\Models\SearchingModel;


class SearchingController extends BaseController
{
    public function __construct(){
        helper(['url' ]);
        $this -> user = new SearchingModel();
    }

    public function index($lat = null , $long = null)
	{   
        $token = get_cookie('token');
        if($token){
            if ($lat !== "lat" && $long !== "long") {
                $lat_truncated = floor($lat); // Truncate latitude to integer part
            $long_truncated = floor($long); // Truncate longitude to integer part
            
            // Perform database query with LIKE conditions
            $data["users"] = $this->user
                                ->like('latitude', (string) $lat_truncated, 'after')
                                ->like('longitude', (string) $long_truncated, 'after')
                                ->findAll();
            
              } else {
                // Retrieve all users if lat and long are not provided
                $data["users"] = $this->user->findAll();
            }
       
        // $data["pager"] =  $this->user->pager;  
        echo view('/admin/Sections/Header'); 
        echo view('/admin/pages/Users/SearchingUsers' , $data); 
        echo view('/admin/Sections/Footer'); 
    }
    else{
        return redirect()->to(base_url('admin/login'));
    }
     
    }

    


}