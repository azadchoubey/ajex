<?php 
header ('Access-Control-Allow-Origin:*');

class Resetapi extends CI_Controller{

public function index(){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $this->load->model('ajaxmodel');
   $id= $this->ajaxmodel->checkuser( $username, $password);

   if($id == 'false'){
    echo    $id;
    
   }else{
    $this->session->set_userdata('id',$id);
    echo    $id;
   }
  
}else{
    $this->load->view('ajaxviews/login');

} }public function after_login(){
  
   if( isset($_SESSION['id'])){
    $data = array('session' =>$_SESSION['id']);

        $this->load->view('ajaxviews/adduser', $data);
        if(isset($_POST['logout'])){

         $this->session->unset_userdata('id');
         return redirect('index.php/public1/Resetapi');
        }


   }else{
                return redirect('index.php/public1/Resetapi');
   }
}
}