<?php 
    class C_produk extends CI_Controller {
        public function dashboard(){
            echo "Dashboard";

        }
        public function index(){
            $this->load->model('M_produk');
            $data['produk'] = $this->M_produk->get_produks();
            $this->load->view('V_produk', $data);

                    $this->db->select('produk.*, status.nama_status, kategori.nama_kategori');
        $this->db->from('produk');

        // Join dengan tabel status berdasarkan kecocokan produk.status_id dengan status.id_status
        $this->db->join('status', 'status.id_status = produk.status_id', 'left');

        // Join dengan tabel kategori berdasarkan kecocokan produk.kategori_id dengan kategori.id_kategori
        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id', 'left');

        // Eksekusi query
        $query = $this->db->get();
        return $query->result();
        }
    }

?>
