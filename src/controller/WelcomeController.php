<?php
use libs\system\Controller;

class WelcomeController extends Controller{

    public function __construct(){
        parent::__construct();
    }
    /** 
     * use: localhost/ORM/Welcome/
     */
    public function index(){  
        return $this->view->load("welcome/index");   
    }  
}
?>