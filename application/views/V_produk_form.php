<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $judul; ?></title>
  <style>
    /* Atur tampilan dasar halaman */
    body {
      background-color: #f0f2f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 90vh;
      /* min-height: 100vh; */
    }
    
    /* Container untuk membungkus form */
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 400px;
    }
    
    /* Judul form */
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    
    /* Setiap elemen form */
    form p {
      margin-bottom: 15px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }
    
    input[type="text"],
    input[type="number"],
    select {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 14px;
    }
    
    /* Tombol submit */
    input[type="submit"] {
      background-color: #007BFF;
      border: none;
      color: #fff;
      padding: 10px 15px;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    
    /* Tautan Batal */
    a {
      text-decoration: none;
      color: #007BFF;
      margin-left: 10px;
      font-size: 16px;
    }
    
    a:hover {
      text-decoration: underline;
    }
    
    /* Tampilan pesan error (jika ada) */
    .error {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1><?php echo $judul; ?></h1>
    
    <!-- Tampilkan pesan error validasi (jika ada) -->
    <?php echo validation_errors('<p class="error">', '</p>'); ?>
    
    <form method="post" action="<?php echo $action; ?>">
      <p>
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="<?php echo isset($produk->nama_produk) ? $produk->nama_produk : set_value('nama_produk'); ?>">
      </p>
      <p>
        <label>Harga</label>
        <input type="number" name="harga" value="<?php echo isset($produk->harga) ? $produk->harga : set_value('harga'); ?>">
      </p>
      <p>
        <label>Kategori</label>
        <select name="kategori_id">
          <option value="">-- Pilih Kategori --</option>
          <?php foreach($kategori as $kat): ?>
            <option value="<?php echo $kat->id_kategori; ?>" 
              <?php 
                if(isset($produk->kategori_id)) { 
                  echo ($produk->kategori_id == $kat->id_kategori) ? 'selected' : '';
                } else { 
                  echo set_select('kategori_id', $kat->id_kategori);
                }
              ?>>
              <?php echo $kat->nama_kategori; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </p>
      <p>
        <label>Status Produk</label>
        <select name="status_id">
          <option value="">-- Pilih Status --</option>
          <?php foreach($status as $stat): ?>
            <option value="<?php echo $stat->id_status; ?>" 
              <?php 
                if(isset($produk->status_id)) { 
                  echo ($produk->status_id == $stat->id_status) ? 'selected' : '';
                } else { 
                  echo set_select('status_id', $stat->id_status);
                }
              ?>>
              <?php echo $stat->nama_status; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </p>
      <p>
        <input type="submit" value="Simpan">
        <a href="<?php echo base_url(); ?>">Batal</a>
      </p>
    </form>
  </div>
</body>
</html>
