<?php
defined('BASEPATH') or exit('No direct script access allowed');
class RekapModel extends CI_Model
{
    function getdata($table)
    {
        return $this->db->get($table);
    }
}
