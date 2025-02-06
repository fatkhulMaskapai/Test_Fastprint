<?php 
    class M_produk extends CI_Model {
        //tanpa filter
        // public function get_all_produk() {
        //     // Memilih semua field dari tabel produk dan juga nama kategori serta nama status
        //     $this->db->select('produk.*, kategori.nama_kategori, status.nama_status');
        //     $this->db->from('produk');
        //     // Join dengan tabel kategori, menghubungkan produk.kategori_id dengan kategori.id_kategori
        //     $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori', 'left');
        //     // Join dengan tabel status, menghubungkan produk.status_id dengan status.id_status
        //     $this->db->join('status', 'produk.status_id = status.id_status', 'left');
        //     return $this->db->get()->result();
        // }

        //get produk dengan filter, i think lebih ok
        public function get_all_produk($status_filter = null) {
            $this->db->select('produk.*, kategori.nama_kategori, status.nama_status');
            $this->db->from('produk');
            $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori', 'left');
            $this->db->join('status', 'produk.status_id = status.id_status', 'left');
            if ($status_filter != null) {
                $this->db->where('produk.status_id', $status_filter);
            }
            return $this->db->get()->result();
        }

        
        // Ambil data produk berdasarkan id_produk beserta nama kategori dan nama status
        public function get_produk_by_id($id) {
            $this->db->select('produk.*, kategori.nama_kategori, status.nama_status');
            $this->db->from('produk');
            $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori', 'left');
            $this->db->join('status', 'produk.status_id = status.id_status', 'left');
            $this->db->where('produk.id_produk', $id);
            return $this->db->get()->row();
        }

        // Insert data produk baru
        public function insert_produk($data) {
            return $this->db->insert('produk', $data);
        }

        // Update data produk berdasarkan id_produk
        public function update_produk($id, $data) {
            $this->db->where('id_produk', $id);
            return $this->db->update('produk', $data);
        }

        // Hapus data produk berdasarkan id_produk
        public function delete_produk($id) {
            $this->db->where('id_produk', $id);
            return $this->db->delete('produk');
        }
    }
?>
