<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the contact Model for CodeIgniter CRUD using Ajax Application.
class Contact_model extends CI_Model
{
 
	var $table = 'contacts';
 
 
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
 
 
        public function get_all_contacts()
        {
            $this->db->from($this->table);
            $query=$this->db->get();
            return $query->result();
        }
 
 
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
 
		return $query->row();
	}
 
	public function contact_add($data)
	{
       
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
 
	public function contact_update($where, $data)
	{
            if($this->email_exists($data["email"],$where['id']))
                return 0;
            $this->db->update($this->table, $data, $where);
            return $this->db->affected_rows();
	}
 
	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
        
        private function email_exists($email,$id)
        {
            return false;
            $this->db->where('email', $email);
            $query = $this->db->get('contacts');
            if( $query->num_rows() > 0 )
            {
                $row=$query->result();
                if($id!=$row["id"])
                    return false;
                return false;
            }
            return false;
        }
 
}