<?php
class Contacts extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->model('contact_model');
                $this->load->library('form_validation');
                $this->load->helper('form');
        }
        public function index()
        {
                $data['contacts']=$this->contact_model->get_all_contacts();
		$this->load->view('contact_view',$data);
        }
        public function contact_add()
        {
            //echo json_encode(array("status" => TRUE));
            if($this->validation()==TRUE)
            {
                $data = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'phone' => $this->input->post('phone'),
                            'email' => $this->input->post('email'),
                    );
                $insert = $this->contact_model->contact_add($data);
                echo json_encode(array("status" => TRUE));
            }
            else {
                echo json_encode(array("status" => FALSE));
            }
            
        }
        public function ajax_edit($id)
        {
                $data = $this->contact_model->get_by_id($id);



                echo json_encode($data);
        }

        public function contact_update()
        {
            $data = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'phone' => $this->input->post('phone'),
                            'email' => $this->input->post('email'),
                    );
            $result=$this->contact_model->contact_update(array('id' => $this->input->post('id')), $data);
            if($result==0)
                echo json_encode(array("status" => FALSE));
            else 
                echo json_encode(array("status" => TRUE));
	}
 
	public function contact_delete($id)
	{
		$this->contact_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
                return;
	}
        
        private function validation()
        {
            $this->form_validation->set_rules('email','email','is_unique[contacts.email]');
            if ($this->form_validation->run() == FALSE) 
                return false;
            else 
                return true;
            
        }
 
 
 
}