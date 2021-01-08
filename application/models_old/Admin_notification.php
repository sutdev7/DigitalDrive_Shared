<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_notification extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function add_notification($notification_data = array()) {
        if (!isset($notification_data['msg'])){
            return array('status' => FALSE, 'message' => 'invalid_data');
        }
        $data1 = array(
            'user_id_from'      => $this->session->userdata('user_id'),
            'message_content'   => isset($notification_data['msg']) ? $notification_data['msg'] : "",
            'date_time'         => date('Y-m-d H:i:s'),
        );
        $this->db->insert('admin_notification', $data1);
    }

    public function get_notification($userIdTo = '') {
        $read_msg = $this->db->where('user_id_to', $this->session->userdata('user_id'))
                ->where('user_id_from', $userIdTo)
                ->update('user_messages', array('is_read' => 'Y'));

        $sql = "select user_messages.*,users.name, users.user_id,user_login.profile_image, country.name as country,
				case when user_messages.user_id_from = '" . $this->session->userdata('user_id') . "' then 'chat-rht-other' else '' end as className
				from user_messages
				join users on users.user_id = user_messages.user_id_to
				join user_login on user_login.user_id = user_messages.user_id_from
				left join country on country.country_id = users.country
				where (user_messages.user_id_from = '" . $this->session->userdata('user_id') . "' and user_messages.user_id_to = '" . $userIdTo . "') or (user_messages.user_id_from = '" . $userIdTo . "' and user_messages.user_id_to = '" . $this->session->userdata('user_id') . "')";

        $query = $this->db->query($sql);
        $result = $query->result();

        $data = array();
        if (!empty($result)) {
            $i = 0;
            foreach ($result as $single) {
                $data[$i]['id'] = $single->id;
                $data[$i]['user_id_from'] = $single->user_id_from;
                $data[$i]['user_id_to'] = $single->user_id_to;
                $data[$i]['message_content'] = $single->message_content;
                if ($single->attachement != '') {
                    $path = "";
                    if (strstr($single->attachement, ".jpg") == ".jpg" || strstr($single->attachement, ".png") == ".png") {
                        $path = '<img src="' . base_url() . 'uploads/messages/' . $single->attachement . '">';
                        $data[$i]['download'] = $path . '<i class="fa fa-arrow-down"></i>';
                    } else {
                        $data[$i]['download'] = '<i class="fa fa-arrow-down"></i>';
                    }
                    $data[$i]['attachement'] = $single->attachement;
                } else {
                    $data[$i]['attachement'] = '';
                    $data[$i]['download'] = '';
                }
                $data[$i]['attachement_content'] = $single->attachement_content;
                $data[$i]['date_time'] = date('d/m/Y H:i A', strtotime($single->date_time));
                $data[$i]['status'] = $single->status;
                $data[$i]['deleted'] = $single->deleted;
                $data[$i]['name'] = $single->name;
                $data[$i]['user_id'] = $single->user_id;
                $data[$i]['className'] = $single->className;
                if (empty($single->profile_image)) {
                    $data[$i]['profileImage'] = base_url('assets/img/no-image.png');
                } else {
                    $data[$i]['profileImage'] = base_url('uploads/user/profile_image/' . $single->profile_image);
                }

                $i++;
            }
        }

        if (!empty($data)) {
            return $data;
        } else {
            return array();
        }
    }
}

