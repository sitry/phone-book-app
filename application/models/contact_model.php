<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the contact Model for CodeIgniter CRUD using Ajax Application.
class Contact_model extends CI_Model
{
    /**
    * The table name.
    *
    * @var string
    */
    private $table = 'contacts';
    
    /**
    * Class constructor.
    *
    */
    public function __construct()
    {
            parent::__construct();
            $this->load->database();
    }

    /**
     * Return all records from contacts.
     */
    public function get_all_contacts()
    {
        $this->db->from($this->table);
        $query=$this->db->get();
        return $query->result();
    }

    /**
     * return a contact record by id.
     * @param mixed $id the contact id.
     */
    public function get_by_id($id)
    {
            $this->db->from($this->table);
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $query->row_array();;
    }
    /**
     * insert a record to contacts table.
     * @param array $data the contact information.
     * 
     */
    public function contact_add($data)
    {

            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
    }
    /**
     * @param array $where contains the contact id.
     * @param array $data the contact information.
     */
    public function contact_update($where, $data)
    {
        if($this->phone_exists($data["phone"], $where['id']))
            return -1;
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    /**
     * delete a record from the contacts table.
     * @param mixed $id the contact id.
     */
    public function delete_by_id($id)
    {
            $this->db->where('id', $id);
            $this->db->delete($this->table);
    }
    /**
     * check if phone exists 
     * @param mixed $phone the contact phone.
     * @param mixed $id the contact id.
     */
    private function phone_exists($phone, $id)
    {
        $this->db->where('phone', $phone);
        $query = $this->db->get($this->table);
        if( $query->num_rows() > 0 )
        {
            $row=$query->row_array();
            if($id!=$row["id"])
            {
                return true;
            }
        }
        return false;
    }
 
}