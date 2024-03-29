<h1 class="mt-4">Ulasan Buku</h1>
<div class="card bg-transparent">
    <div class="card-body">
        <div class="row">
        <body style="background-image: url('assets/img/img1.jpg');"class="bg-dark">
            <div class="col-md-12">
                <?php if ($_SESSION['user']['level'] == 'peminjam') { ?>
                    <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Data</a>
                    <br><br>
                <?php } ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th width="16%">Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $user_id = $_SESSION['user']['id_user']; // Ambil ID pengguna yang sedang login
                    $query = mysqli_query($koneksi, "SELECT * FROM ulasan LEFT JOIN user ON user.id_user = ulasan.id_user LEFT JOIN buku ON buku.id_buku = ulasan.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
        <td>
        <?php if ($_SESSION['user']['level'] == 'peminjam' && $data['id_user'] == $user_id) { ?>
          <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
         <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
         <?php } elseif ($_SESSION['user']['level'] != 'peminjam') { ?>
        <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
         <?php } ?>
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
