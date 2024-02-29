<h1 class="mt-4">Buku</h1>
    <div class="card bg-transparent">
        <div class="card-body">
        <div class="row">
        <body style="background-image: url('assets/img/img1.jpg');"class="bg-dark">
            <div class="col-md-12">
                <a href="?page=buku_tambah" class="btn btn-primary">+Tambah Data</a>
                <br>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit
                        <th>Tahun Terbit</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                        while($data = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['kategori']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['penulis']; ?></td>
                                <td><?php echo $data['penerbit']; ?></td>
                                <td><?php echo $data['tahun_terbit']; ?></td>
                                <td><?php echo $data['deskripsi']; ?></td>
                                <td>
                                    <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-warning btn-sm mb-3">Edit</a>
                                    <a href="?page=buku_hapus&&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger btn-sm mb-3">Hapus</a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>  
        </div>
    </div>
 </div>