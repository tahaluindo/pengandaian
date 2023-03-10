<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposito_model extends CI_Model
{

    public $table = 'deposito';
    public $id    = 'id_deposito';
    public $order = 'DESC';

    function get_all()
    {
        $this->db->select('deposito.id_deposito, deposito.name, deposito.nik, deposito.address, deposito.email, deposito.phone, deposito.total_deposito, deposito.resapan_deposito, deposito.saldo_deposito, deposito.jangka_waktu, deposito.waktu_deposito, deposito.jatuh_tempo, deposito.bagi_hasil, deposito.created_by, instansi.instansi_name, cabang.cabang_name');

        $this->db->join('instansi', 'deposito.instansi_id = instansi.id_instansi', 'left');
        $this->db->join('cabang', 'deposito.cabang_id = cabang.id_cabang', 'left');

        $this->db->where('is_delete_deposito', '0');

        $this->db->order_by($this->id, 'ASC');

        return $this->db->get($this->table)->result();
    }

    function get_all_deleted()
    {
        $this->db->select('deposito.id_deposito, deposito.name, deposito.nik, deposito.address, deposito.email, deposito.phone, deposito.total_deposito, deposito.jangka_waktu, deposito.waktu_deposito, deposito.jatuh_tempo, deposito.bagi_hasil, deposito.created_by');

        $this->db->where('is_delete_deposito', '1');

        $this->db->order_by($this->id, $this->order);

        return $this->db->get($this->table)->result();
    }

    function total_rows()
    {
        $this->db->where('is_delete_deposito', '0');
        return $this->db->get($this->table)->num_rows();
    }

    function total_deposito()
    {
        return $this->db->query('SELECT sum(total_deposito) AS total_deposito from deposito where is_delete_deposito = 0')->result();
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
