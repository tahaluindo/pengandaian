<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposito_model extends CI_Model
{

    public $table = 'deposito';
    public $id    = 'id_deposito';
    public $order = 'DESC';

    function get_all()
    {
        $this->db->select('deposito.id_deposito, deposito.name, deposito.nik, deposito.address, deposito.email, deposito.phone, deposito.total_deposito, deposito.jangka_waktu, deposito.waktu_deposito, deposito.jatuh_tempo, deposito.bagi_hasil, deposito.created_by');

        $this->db->where('is_delete_deposito', '0');

        $this->db->order_by($this->id, $this->order);

        return $this->db->get($this->table)->result();
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function soft_delete($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
