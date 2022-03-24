<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_terms extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key, $service) {
        $this->db->select('a.*, b.service_id');
        $this->db->from('tbl_web_terms a');
        $this->db->join('tbl_web_service b','a.service_id=b.service_id','LEFT');
        
        if($key!=''){
            $this->db->like("a.terms_text", $key);
        }

        if($limit !="" OR $start !=""){
            $this->db->limit($limit, $start);
        }
        $this->db->where('b.service_id', $service);
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
        $this->db->insert('tbl_web_terms', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_web_terms', $data, array('terms_id' => $data['terms_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_web_terms', array('terms_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('terms_id', $id);
        $query = $this->db->get('tbl_web_terms', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}