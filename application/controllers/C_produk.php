<?php 
    class C_produk extends CI_Controller {
        // public function index(){
        //     $this->load->model('M_produk');
        //     $data['produk'] = $this->M_produk->get_all_produk();
        //     $this->load->view('V_produk', $data);
        // }

        public function index($status_filter = 2) {
            // Ambil data produk sesuai filter status (1 atau 2)
            $data['produk'] = $this->M_produk->get_all_produk($status_filter);
            // Kirim juga nilai filter agar view dapat menandai link aktif
            $data['status_filter'] = $status_filter;
            $this->load->view('V_produk', $data);
        }
    // Form tambah produk
        public function tambah() {
            // Ambil data kategori dan status untuk dropdown
            $data['kategori'] = $this->db->get('kategori')->result();
            $data['status']   = $this->db->get('status')->result();

            // Set aturan validasi form:
            // - Nama Produk wajib diisi  
            // - Harga wajib diisi dan harus berupa angka  
            // - Kategori dan Status harus dipilih
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
            $this->form_validation->set_rules('status_id', 'Status Produk', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Tampilkan form tambah produk
                $data['action']  = base_url() . 'C_produk/tambah';
                $data['judul']   = 'Tambah Produk';
                $data['produk']  = null; // Tidak ada data produk saat menambah
                $this->load->view('V_produk_form', $data);
            } else {
                // Ambil inputan form
                $input = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'harga'       => $this->input->post('harga'),
                    'kategori_id' => $this->input->post('kategori_id'),
                    'status_id'   => $this->input->post('status_id')
                );
                $this->M_produk->insert_produk($input);
                redirect('C_produk');
            }
        }

        // Form edit produk
        public function edit($id) {
            $produk = $this->M_produk->get_produk_by_id($id);
            if(empty($produk)) {
                show_404(); // Tampilkan error 404 jika data tidak ditemukan
            }
            // Ambil data kategori dan status untuk dropdown
            $data['kategori'] = $this->db->get('kategori')->result();
            $data['status']   = $this->db->get('status')->result();

            // Set validasi form
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
            $this->form_validation->set_rules('status_id', 'Status Produk', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Tampilkan form edit dengan data produk yang ada
                $data['action']  = base_url() .'C_produk/edit/'.$id;
                $data['judul']   = 'Edit Produk';
                $data['produk']  = $produk;
                $this->load->view('V_produk_form', $data);
            } else {
                // Ambil data dari form untuk diupdate
                $update = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'harga'       => $this->input->post('harga'),
                    'kategori_id' => $this->input->post('kategori_id'),
                    'status_id'   => $this->input->post('status_id')
                );
                $this->M_produk->update_produk($id, $update);
                redirect('C_produk');
            }
        }

        // Proses hapus produk
        public function hapus($id) {
            $this->M_produk->delete_produk($id);
            redirect('C_produk');
        }

    }

?>
