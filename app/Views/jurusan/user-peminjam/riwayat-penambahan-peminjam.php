<?= $this->extend('jurusan/layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Riwayat Penambahan Akun Peminjam</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('jurusan'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Riwayat Penambahan Akun Peminjam</li>
        </ol>

        <!-- Flash Session -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- End Flash Session -->

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    DataTable Riwayat Penambahan Akun Peminjam
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. Hp</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. Hp</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($userPeminjam as $peminjam) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $peminjam['peminjam_nama']; ?></td>
                                    <td><?= $peminjam['peminjam_hp']; ?></td>
                                    <td><?= $peminjam['peminjam_email']; ?></td>
                                    <td>
                                        <span class="badge text-white
                                        <?php if ($peminjam['peminjam_status'] == 2) {
                                            echo 'bg-warning'; // Pending
                                        } elseif ($peminjam['peminjam_status'] == 1) {
                                            echo 'bg-success'; // Disetujui
                                        } elseif ($peminjam['peminjam_status'] == 0) {
                                            echo 'bg-danger'; // Ditolak
                                        } ?>">
                                            <?php 
                                            if ($peminjam['peminjam_status'] == 2) {
                                                echo 'Pending';
                                            } elseif ($peminjam['peminjam_status'] == 1) {
                                                echo 'Aktif';
                                            } else {
                                                echo 'Tidak Aktif';
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('jurusan/userpeminjam/' . $peminjam['peminjam_slug']); ?>" class="btn btn-info btn-block">Detail</a>
                                        <?php if (allow('1') || allow('2')) : ?>
                                            <!-- Tombol Setujui hanya muncul jika status = Pending (2) -->
                                            <?php if ($peminjam['peminjam_status'] == 2): ?>
                                                <form action="<?= base_url('jurusan/penambahan-peminjam/setujui/' . $peminjam['peminjam_id']); ?>" method="POST" style="display:inline;">
                                                    <button type="submit" class="btn btn-success btn-block">Setujui</button>
                                                </form>
                                            <?php endif; ?>

                                            <!-- Tombol Tolak hanya muncul jika status = Pending (2) -->
                                            <?php if ($peminjam['peminjam_status'] == 2): ?>
                                                <form action="<?= base_url('jurusan/penambahan-peminjam/tolak/' . $peminjam['peminjam_id']); ?>" method="POST" style="display:inline;">
                                                    <button type="submit" class="btn btn-danger btn-block">Tolak</button>
                                                </form>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <!-- Tombol Delete hanya muncul jika status = Inactive (0) dan user level 3 -->
                                        <?php if ($peminjam['peminjam_status'] == 0 && allow('3')) : ?>
                                            <form action="<?= base_url('jurusan/penambahan-peminjam/delete/' . $peminjam['peminjam_id'] . '?redirect=riwayat'); ?>" method="POST" style="display:inline;">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-danger btn-block" 
                                                    data-toggle="modal" 
                                                    data-target="#deleteModal<?= $peminjam['peminjam_id']; ?>">
                                                    <i class="fas fa-times mr-3"></i>Hapus
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <!-- Modal Konfirmasi Delete -->
                                <div class="modal fade" id="deleteModal<?= $peminjam['peminjam_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $peminjam['peminjam_id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?= $peminjam['peminjam_id']; ?>">Konfirmasi Penghapusan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus peminjam ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <form action="<?= base_url('jurusan/penambahan-peminjam/delete/' . $peminjam['peminjam_id']); ?>" method="POST">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection('content'); ?>
