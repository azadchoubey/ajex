<?php defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
class Getlogin extends CI_Controller{

public function index(){
        
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     $username=   $this->input->post('username');
     $password=   $this->input->post('password');
     $this->load->model('ajaxmodel');
   $result=  $this->ajaxmodel->checklogin($username,$password);
        echo $result;

    }else{
        $this->load->view('ajaxviews/login');
    }


}public function afterlogin(){

echo 'successfully Login';

}





}
















?>