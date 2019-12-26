<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Replyforum_model extends CI_Model
    {
        
        private $_table = "forum_reply";

        public function rules()
        {
            return [
                ['field' => 'reply_content',
                'label' => 'Konten',
                'rules' => 'required'],
            ];
        }
        
        public function saveparent($data)
        {
            $this->reply_pjd_id = $data["reply_pjd_id"];
            $this->reply_content = $data["reply_content"];
            $this->reply_user_name = $data["reply_user_name"];
            $this->reply_created = $data["reply_created"];
            $this->db->insert($this->_table, $this);

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function savechild($data)
        {
            $this->reply_pjd_id = $data["reply_pjd_id"];
            $this->reply_content = $data["reply_content"];
            $this->reply_user_name = $data["reply_user_name"];
            $this->reply_created = $data["reply_created"];
            $this->reply_parent = $data["reply_parent"];
            $this->db->insert($this->_table, $this);

            return ($this->db->affected_rows() > 0) ? true : false;
        }

        public function getparentbypjd($reply_pjd_id)
        {
            $this->db->where('reply_pjd_id', $reply_pjd_id);
            $this->db->where('reply_parent is null');
            $this->db->order_by('reply_created', 'asc');

            return $this->db->get($this->_table)->result();
        }

        public function getbyid($reply_id)
        {
            $this->db->where('reply_id', $reply_id);

            return $this->db->get($this->_table)->row();
        }
        
        public function getchild($reply_parent)
        {
            $this->db->where('reply_parent', $reply_parent);
            $this->db->order_by('reply_created', 'asc');

            return $this->db->get($this->_table)->result();
        }
    }