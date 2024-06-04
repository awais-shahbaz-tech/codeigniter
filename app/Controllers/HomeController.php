<?php
namespace App\Controllers;



class HomeController extends BaseController
{
 
    public function index()
	{
        echo view('/webpage/sections/header'); 
        echo view("/webpage/pages/HomePage");
        echo view('/webpage/sections/footer');
    }
}