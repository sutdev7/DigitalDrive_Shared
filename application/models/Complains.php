<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Complains extends CI_Model {

	public function __construct(){
		parent::__construct();
        //$this->load->model('Users');
	}

    public function save_user_complain($dataComplain = null) {    
        
        if(empty($dataComplain))
            return array('status' => FALSE, 'message' => 'unable_to_add_record_in_db');  

        $id_generator = $this->auth->generator(10);
        $date_of_creation = date("Y-m-d H:i:s");
        $data = array(
            'user_complain_id' => $id_generator,         
            'contract_id' => $dataComplain['contract_id'],
            'offer_id' => $dataComplain['offer_id'],
            'task_id' =>  $dataComplain['task_id'],
            'freelancer_id' =>  $dataComplain['freelancer_id'],
            'complain_type' =>  $dataComplain['complain_type'],
            'complain_details' =>  $dataComplain['complain_details'],
            'complain_created_by' =>  $dataComplain['complain_created_by'],
            'complain_doc' =>  $date_of_creation
        );
        $result = $this->db->insert('user_complains',$data);  
        $insert_id = $this->db->insert_id(); 

        if($result) {
            foreach($dataComplain['file_attach'] as $val) {
                $date_of_creation = date("Y-m-d H:i:s");
                $data = array(
                    'complain_id' => $insert_id,         
                    'complain_attach_filename' => $val,
                    'complain_attachment_uploaded_by' => $dataComplain['complain_created_by'],                    
                    'complain_attachment_doc' => $date_of_creation
                );
                $result_sub = $this->db->insert('user_complain_attachments',$data);  
            }
        }        

        return array('status' => TRUE, 'message' => 'successfully_add_record_in_db');          
    }    

}		