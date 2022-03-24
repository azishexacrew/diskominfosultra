<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_album extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $cat)
    {
        $this->db->select('a.*, c.user_fullname');
        $this->db->from('tbl_web_album a');
        $this->db->join('tbl_user c', 'a.user_id=c.user_id', 'LEFT');

        if ($key != '') {
            $this->db->like("a.album_name", $key);
            $this->db->or_like("c.user_fullname", $key);
        }


        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.album_id', 'DESC');

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
        $this->db->insert('tbl_web_album', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_album', $data, array('album_id' => $data['album_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_album', array('album_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('album_id', $id);
        $query = $this->db->get('tbl_web_album', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}