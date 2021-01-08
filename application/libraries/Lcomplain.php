<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lcomplain {
    public function save_complain_data($userInfo = null) {
        $CI =& get_instance();
        $CI->load->model('Complains');          

        if(empty($userInfo))
            redirect('dashboard', 'refresh');

        $submitData = $CI->input->post();

        $file_uploaded = array();
        if(!empty($_FILES) && is_array($_FILES)){  
            $postData['uploadFiles'] = array();
            for($i = 0; $i<count($_FILES['fldComplainDocuments']['name']); $i++) {
                $path = $_FILES['fldComplainDocuments']['name'][$i];
                $path_parts = pathinfo($path);
                $filename = time() . $CI->session->userdata('user_id') . '_' . $path;

                $sourcePath = $_FILES['fldComplainDocuments']['tmp_name'][$i];
                $targetPath = "./uploads/complain/".$filename;

                if(move_uploaded_file($sourcePath,$targetPath)) {
                     $file_uploaded[] = $filename;
                }
            }
        } 

        $data = array(
                    "contract_id" => $submitData['fldContractID'],
                    "offer_id" => $submitData['fldOfferID'],
                    "task_id" => $submitData['fldTaskID'],
                    "freelancer_id" => $submitData['fldFreelancerID'],
                    "complain_type" => $submitData['cheComplainType'],
                    "complain_details" => $submitData['complain_details'],
                    "complain_created_by" => $CI->session->userdata('user_id'),
                    "file_attach" => $file_uploaded
                );       
        $result = $CI->Complains->save_user_complain($data);
        if($result) {
            $CI->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your complain has been registered successfully.</div>');         
        }
        else {
            $CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Unable to register your complain. Please try again after sometime.</div>');
        } 
        redirect('dashboard', 'refresh');        
    }
}
