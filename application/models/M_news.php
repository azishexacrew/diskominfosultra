<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_news extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $cat)
    {
        $this->db->select('a.*, c.user_fullname, d.news_category_name');
        $this->db->from('tbl_web_news a');
        $this->db->join('tbl_user c', 'a.user_id=c.user_id', 'LEFT');
        $this->db->join('tbl_web_news_category d', 'a.news_category_id = d.news_category_id', 'LEFT');

        if ($key != '') {
            $this->db->like("a.news_title", $key);
            $this->db->or_like("c.user_fullname", $key);
            $this->db->or_like("d.news_category_name", $key);
        }

        if ($cat != '') {
            $this->db->where("a.news_category_id", $cat);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.news_id', 'DESC');

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
        $this->db->insert('tbl_web_news', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_news', $data, array('news_id' => $data['news_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_news', array('news_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('news_id', $id);
        $query = $this->db->get('tbl_web_news', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }

    public function populer($limit)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_web_news a');

        if ($limit != "") {
            $this->db->limit($limit);
        }

        $this->db->order_by('a.news_count_view', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }
}
