<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Produk</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        /* Tombol */
        .button {
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: inline-block;
        }
        .button-add {
            background-color: #27ae60;
            color: #fff;
        }
        .button-edit {
            background-color: #f1c40f;
            color: #fff;
        }
        .button-delete {
            background-color: #e74c3c;
            color: #fff;
        }
        /* Group tombol agar sejajar */
        .button-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        /* Filter link */
        .filter {
            text-align: center;
            margin-bottom: 20px;
        }
        .filter a {
            text-decoration: none;
            padding: 10px 15px;
            margin: 0 5px;
            background-color: #3498db;
            color: #fff;
            border-radius: 3px;
        }
        .filter a.active {
            background-color: #2980b9;
        }
        /* Tabel */
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        table th {
            background-color: #3498db;
            color: #fff;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        .center {
            text-align: center;
        }
        .left {
            text-align: left;
        }
        .right {
            text-align: right;
        }
    </style>
    <script>
        // Fungsi konfirmasi hapus produk dengan menampilkan nama produk
        function confirmDelete(url, productName) {
            if (confirm('Apakah Anda yakin ingin menghapus "' + productName + '"?')) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Daftar Produk</h1>
        
        <!-- Tombol untuk tambah produk baru -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="<?php echo base_url(); ?>C_produk/tambah" class="button button-add">Tambah Produk</a>
        </div>
        
        <!-- Filter Tampilan Produk -->
        <div class="filter">
            <a href="<?php echo base_url(); ?>C_produk/index/1" 
               class="<?php echo (isset($status_filter) && $status_filter == 1) ? 'active' : ''; ?>">
                Produk Tidak Bisa Dijual
            </a>
            <a href="<?php echo base_url(); ?>C_produk/index/2" 
               class="<?php echo (isset($status_filter) && $status_filter == 2) ? 'active' : ''; ?>">
                Produk Bisa Dijual
            </a>
        </div>
        
        <!-- Tabel Produk -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class = "center">No.</th>
                        <th class = "center">Nama Produk</th>
                        <th class = "center">Harga</th>
                        <th class = "center">Kategori</th>
                        <th class = "center">Status Produk</th>
                        <th class = "center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($produk)): ?>
                        <?php 
                            $no = 1;
                            foreach($produk as $p): ?>
                            <tr>
                                <td class="center"><?php echo $no; ?></td>
                                <td class="left"><?php echo $p->nama_produk; ?></td>
                                <td style="text-align: right;"><?php echo number_format($p->harga, 0, ',', '.'); ?></td>
                                <td><?php echo $p->nama_kategori; ?></td>
                              <td style="background-color: <?php echo ($p->status_id == '2') ? 'green' : 'magenta'; ?>">
                                <?php echo $p->nama_status; ?>
                            </td>

                                <td>
                                    <div class="button-group">
                                        <!-- Tombol Edit -->
                                        <a href="<?php echo base_url().'C_produk/edit/'.$p->id_produk; ?>" class="button button-edit">Edit</a>
                                        <!-- Tombol Hapus dengan konfirmasi -->
                                        <a href="javascript:void(0);" 
                                           onclick="confirmDelete('<?php echo base_url() . 'C_produk/hapus/'.$p->id_produk; ?>', '<?php echo $p->nama_produk; ?>')" 
                                           class="button button-delete">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                            $no++;
                            endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">Tidak ada data produk.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
