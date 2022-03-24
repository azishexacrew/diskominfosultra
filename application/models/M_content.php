<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_content extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function update($data)
    {
        $this->db->update('tbl_web_content', $data, array('content_id' => $data['content_id']));
    }

    public function get($id)
    {
        $this->db->where('content_menu', $id);
        $query = $this->db->get('tbl_web_content', 1);
        return $query->result();
    }


    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(tracking_id) FROM tbl_web_tracking ) as total_pengurusan,
            (SELECT count(tracking_id) FROM tbl_web_tracking WHERE tracking_status=0) as total_proses,
            (SELECT count(tracking_id) FROM tbl_web_tracking WHERE tracking_status=1) as total_selesai,
            (SELECT count(service_id) FROM tbl_web_service) as total_jenis_izin,
            (SELECT count(regulation_id) FROM tbl_web_regulation) as total_produk_hukum,
            (SELECT count(news_id) FROM tbl_web_news) as total_Berita,
            (SELECT count(album_id) FROM tbl_web_album) as total_album
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }

    public function get_title()
    {
        $this->db->select('a.content_title');
        $this->db->from('tbl_web_content a');
        // $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }
}
