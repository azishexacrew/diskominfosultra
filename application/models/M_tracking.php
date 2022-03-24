<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_tracking extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('a.*, b.service_name');
        $this->db->from('tbl_web_tracking a');
        $this->db->join('tbl_web_service b','a.service_id=b.service_id','LEFT');
        
        if($key!=''){
            $this->db->like("a.tracking_name", $key);
            $this->db->or_like("a.tracking_nup", $key);
            $this->db->or_like("a.tracking_status", $key);
            $this->db->or_like("b.service_name", $key);
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
        $this->db->insert('tbl_web_tracking', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_web_tracking', $data, array('tracking_id' => $data['tracking_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_web_tracking', array('tracking_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('tracking_id', $id);
        $query = $this->db->get('tbl_web_tracking', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}