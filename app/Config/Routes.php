<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/saveUser', 'Home::saveUser');
$routes->get('/getSingleUser/(:num)' , 'Home::getSingleUser/$1');
$routes->post('/editUser' , 'Home::editUser');
$routes->post('/deleteUser' , 'Home::deleteUser');


$routes->get('/datascrap/(:num)' , "ScrapStore::datascrap/$1");
$routes->get('/datascrapjdot/(:num)' , "ScrapStore::datascrapjdot/$1");


$routes->get('/webpage/(:any)/(:any)/(:num)', 'ScrapStore::index/$1/$2/$3');


$routes->post('/set-session-data', 'ScrapStore::setSessionData');

$routes->get('/webpage/cart', 'CartController::index');
$routes->get('/cart', 'CartController::getCart'); // Get cart items by user ID
$routes->post('/addtocart', 'CartController::addProduct');  // Add product to cart
$routes->post('/updatecart', 'CartController::updateProduct');  // Update product quantity in cart
$routes->post('/removecart', 'CartController::removeProduct');  // Remove product from cart


$routes->get('/webpage/contact-us', 'Contactus::index');

$routes->post('/send-mail', 'Contactus::sendMail');

$routes->get('/webpage/login', 'LoginController::index');
$routes->get('/webpage/signup', 'SignupController::index');
$routes->get('/webpage/verify', 'VerifyController::index');
$routes->get('/webpage/homepage', 'HomeController::index');



$routes->post('/signup', 'SignupController::saveUser');
$routes->post('/signupuser', 'SignupController::saveUserphp');

$routes->post('/verify', 'VerifyController::verifyOtp');
$routes->post('/verifyuser', 'VerifyController::verifyOtpphp');

$routes->post('/login', 'LoginController::userlogin');
$routes->post('/loginuser', 'LoginController::userloginphp');

$routes->get('/signout' , 'LoginController::signout');


















