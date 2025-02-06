<?php 
    class C_produk extends CI_Controller {
        public function dashboard(){
            echo "Dashboard";

        }
        public function index(){
            $this->load->model('M_produk');
            $data['produk'] = $this->M_produk->get_produks();
            $this->load->view('V_produk', $data);
        }
    }

?>
