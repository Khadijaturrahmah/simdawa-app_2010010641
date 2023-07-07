<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisModel extends CI_Model
{

    private $tabel = "jenis_beasiswa";
    public function get_jenis()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function inssert_jenis()
    {
        $data = [
            'nama_jenis' => $this->input->post('nama_jenis'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert($this->tabel, $data);

        //Notifikasi
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data jenis berhasil ditambahkan");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data jenis gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function get_jenis_byid($id)
    {

        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }

    public function update_jenis()
    {
        $data = [
            'nama_jenis' => $this->input->post('nama_jenis'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);

        //Notifikasi
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data jenis berhasil diubah");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data jenis gagal diubah!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function delete_jenis($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);

        //Notifikasi
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data jenis berhasil dihapus");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data jenis gagal dihapus!");
            $this->session->set_flashdata('status', false);
        }
    }
}
