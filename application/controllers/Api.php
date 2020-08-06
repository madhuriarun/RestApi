<?php
class Api extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Api_model');
    }
    
    function getUserDetails(){
        $json=array();
            $foo = file_get_contents("php://input");
            $content=json_decode($foo, true);
            $id = $content['id'];
            $id =explode(", ", $id);
            $id =implode(", ", $id);
            $data=$this->Api_model->getUserDetails($id);
            $json=$data;
            $this->output->set_content_type('application/json');

        $this->output->set_output(json_encode($json));
    }

    function getUserDetailsByFormat(){
        $json=array();
            $foo = file_get_contents("php://input");
            $content=json_decode($foo, true);
            $id = $content['id'];
            $id =explode(", ", $id);
            $id =implode(", ", $id);
            $fmt = $content['fmt'];
            $data=$this->Api_model->getUserDetails($id);
            if($fmt == 0){
              $json=$data;  
          }else{
            foreach ($data as $key => $value) {
               $json[$value->id]=$value->name.','.$value->email.','.$value->phone.','.$value->city;
            }
          }
            
            $this->output->set_content_type('application/json');

        $this->output->set_output(json_encode($json));
    }    

}