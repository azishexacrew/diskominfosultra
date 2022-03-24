<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_regulation extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $cat)
    {
        $this->db->select('*');
        $this->db->from('tbl_web_regulation a');
        $this->db->join('tbl_web_regulation_category b', 'a.regulation_category_id=b.regulation_category_id', 'LEFT');
        // $this->db->where('a.regulation_category_id = b.regulation_category_id', $key);

        if ($key != '') {
            if ($key['search'] != '') {
                $this->db->like("a.regulation_name", $key['search']);
            }
            if ($key['search_category_id'] != '') {
                $this->db->where("a.regulation_category_id", $key['search_category_id']);
            }
            if ($key['search_year'] != '') {
                $this->db->where("a.regulation_year", $key['search_year']);
            }
        }

        if ($cat != '') {
            $this->db->where("a.regulation_category_id", $cat);
        }

        if ($limit != "" or $start != "") {
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

    public function read_2($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_web_regulation a');
        $this->db->join('tbl_web_regulation_category b', 'a.regulation_category_id=b.regulation_category_id', 'LEFT');
        // $this->db->where('a.regulation_category_id = b.regulation_category_id', $key);


        if ($key != '') {
            $this->db->like("regulation_name", $key['search_regulation_name']);
            $this->db->where("regulation_year", $key['search_regulation_year']);
            $this->db->where("a.regulation_category_id", $key['search_regulation_category_id']);
        }

        if ($limit != "" or $start != "") {
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

    public function create($data)
    {
        $this->db->insert('tbl_web_regulation', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_regulation', $data, array('regulation_id' => $data['regulation_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_regulation', array('regulation_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('regulation_id', $id);
        $query = $this->db->get('tbl_web_regulation', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
