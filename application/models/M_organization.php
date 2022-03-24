<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_organization extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('a.*, b.organization_name as atasan');
        $this->db->from('tbl_web_organization a');
        $this->db->join('tbl_web_organization b','a.organization_up=b.organization_id','LEFT');
        
        if($key!=''){
            $this->db->like("a.organization_name", $key);
            $this->db->or_like("a.organization_nip", $key);
            $this->db->or_like("a.organization_position", $key);
        }

        if($limit !="" OR $start !=""){
            $this->db->limit($limit, $start);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function create($data) {
        $this->db->insert('tbl_web_organization', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_web_organization', $data, array('organization_id' => $data['organization_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_web_organization', array('organization_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('organization_id', $id);
        $query = $this->db->get('tbl_web_organization', 1);
        return $query->result();
    }


    public function generateTree($up) {
        $this->db->select('*');
        $this->db->from('tbl_web_organization');
        $this->db->where('organization_up', $up);
        $query = $this->db->get ();
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>