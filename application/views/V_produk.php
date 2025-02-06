<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Produk</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px 12px;
        }
        th {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <!-- <th>ID Produk</th> -->
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Status Produk</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($produk)): ?>
                <?php 
                $no = 0;
                    foreach($produk as $p): ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <!-- <td><?php echo $p->id_produk; ?></td> -->
                        <td><?php echo $p->nama_produk; ?></td>
                        <td><?php echo $p->harga; ?></td>
                        <!-- <td><?php echo $p->kategori_id; ?></td> -->
                        <td><?php echo $p->nama_kategori; ?></td>
                        <td><?php echo $p->nama_status; ?></td>
                        <td>
                            <input type="button" value="Edit">
                            <input type="button" value="Hapus">
                        </td>
                    </tr>
                <?php 
                    $no++;
                    endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Tidak ada data produk.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
