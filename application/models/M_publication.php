<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_publication extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $cat)
    {
        $this->db->select('*');
        $this->db->from('tbl_web_publication a');
        $this->db->join('tbl_web_publication_category b', 'a.publication_category_id=b.publication_category_id', 'LEFT');
        // $this->db->where('a.publication_category_id = b.publication_category_id', $key);

        if ($key != '') {
            $this->db->like("publication_name", $key);
        }

        if ($cat != '') {
            $this->db->where("a.publication_category_id", $cat);
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
        $this->db->from('tbl_web_publication a');
        $this->db->join('tbl_web_publication_category b', 'a.publication_category_id=b.publication_category_id', 'LEFT');
        // $this->db->where('a.publication_category_id = b.publication_category_id', $key);


        if ($key != '') {
            $this->db->like("publication_name", $key['search_publication_name']);
            $this->db->where("publication_year", $key['search_publication_year']);
            $this->db->where("a.publication_category_id", $key['search_publication_category_id']);
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
        $this->db->insert('tbl_web_publication', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_publication', $data, array('publication_id' => $data['publication_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_publication', array('publication_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('publication_id', $id);
        $query = $this->db->get('tbl_web_publication', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}