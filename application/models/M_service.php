<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_service extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('a.*, b.sector_name');
        $this->db->from('tbl_web_service a');
        $this->db->join('tbl_web_sector b','a.sector_id=b.sector_id','LEFT');
        
        if($key!=''){
            $this->db->like("a.service_name", $key);
            $this->db->or_like("a.service_code", $key);
            $this->db->or_like("b.sector_name", $key);
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
        $this->db->insert('tbl_web_service', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_web_service', $data, array('service_id' => $data['service_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_web_service', array('service_id' => $id));
        $this->db->delete('tbl_web_terms', array('service_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('service_id', $id);
        $query = $this->db->get('tbl_web_service', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}