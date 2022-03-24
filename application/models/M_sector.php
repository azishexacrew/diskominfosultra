<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_sector extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key) {
        $this->db->select('sector_id, sector_name');
        $this->db->from('tbl_web_sector');
        
        if($key!=''){
            $this->db->like("sector_name", $key);
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
        $this->db->insert('tbl_web_sector', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_web_sector', $data, array('sector_id' => $data['sector_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_web_sector', array('sector_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('sector_id', $id);
        $query = $this->db->get('tbl_web_sector', 1);
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>