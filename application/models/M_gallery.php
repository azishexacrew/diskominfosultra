<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_gallery extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $type)
    {
        $this->db->select('a.*, b.album_date');
        $this->db->from('tbl_web_gallery a');
        $this->db->join('tbl_web_album b', 'a.album_id = b.album_id');

        if ($key != '') {
            $this->db->where("a.album_id", $key);
        }
        if ($type != '') {
            $this->db->where("a.gallery_type", $type);
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

    public function read_frontend($limit, $start, $key, $type, $group)
    {
        $this->db->select('*');
        $this->db->from('tbl_web_gallery a');
        $this->db->join('tbl_web_album b', 'a.album_id = b.album_id', 'LEFT');

        if ($key != '') {
            $this->db->where("a.album_id", $key);
        }
        if ($type != '') {
            $this->db->where("a.gallery_type", $type);
            if ($type == 'video')
                $this->db->or_where("a.gallery_type", 'link');
        }
        if ($group) {
            $this->db->group_by("a.album_id");
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
        $this->db->insert('tbl_web_gallery', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_gallery', $data, array('album_id' => $data['album_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_gallery', array('gallery_id' => $id));
    }

    public function delete_where($field, $id)
    {
        $this->db->delete('tbl_web_gallery', array('album_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('album_id', $id);
        $query = $this->db->get('tbl_web_gallery', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
