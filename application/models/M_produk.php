<?php 
    class M_produk extends CI_Model {

        public function get_produks() {
            $this->db->select('produk.*, status.nama_status, kategori.nama_kategori');
            $this->db->from('produk');

            // Join tabel
            $this->db->join('status', 'status.id_status = produk.status_id', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id', 'left');

            // Eksekusi query
            $query = $this->db->get();
            return $query->result();
        }
    }
?>
