<?= $this->extend('jurusan/layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Detail <?= $userPeminjam['peminjam_nama']; ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('jurusan/userpeminjam'); ?>">User Peminjam</a></li>
            <li class="breadcrumb-item active">Detail User Peminjam</li>
        </ol>
        <div class="card border-dark mb-3">
            <div class=" card-header">Detail dari <?= $userPeminjam['peminjam_nama']; ?></div>
            <div class="card-body text-dark">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="readNama">Nama</label>
                            <input type="text" class="form-control" id="readNama" name="nama" style="font-weight: bold;" value="<?= $userPeminjam['peminjam_nama']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="readHp">Nomor Hp</label>
                            <input type="text" class="form-control" id="readHp" name="hp" style="font-weight: bold;" value="<?= $userPeminjam['peminjam_hp']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="readAlamat">Email</label>
                        <input type="email" class="form-control" id="readEmail" name="email" style="font-weight: bold;" value="<?= $userPeminjam['peminjam_email']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="readStatus">Status Akun</label>
                        <input type="text" class="form-control bg-<?= ($userPeminjam['peminjam_status'] == 1) ? 'success' : (($userPeminjam['peminjam_status'] == 2) ? 'warning' : 'danger'); ?> text-white"
                            id="readStatus" name="status" style="font-weight: bold;"
                            value="<?= ($userPeminjam['peminjam_status'] == 1) ? 'Active' : (($userPeminjam['peminjam_status'] == 2) ? 'Pending' : 'Inactive'); ?>" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="readUsername">Username</label>
                            <input type="text" class="form-control" id="readUsername" name="username" style="font-weight: bold;" value="<?= $userPeminjam['peminjam_username']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="readPassword">Password</label>
                            <input type="password" class="form-control" id="readPassword" name="password" style="font-weight: bold;" value="<?= $userPeminjam['peminjam_password']; ?>" readonly>
                        </div>
                    </div>
                </form>

                <?php if (allow('3')) : ?>
                    <?php if ($userPeminjam['peminjam_status'] == 1) : ?>
                        <!-- Jika status Active (1), tampilkan tombol Edit & Delete -->
                        <a href="<?= base_url('jurusan/userpeminjam/edit/' . $userPeminjam['peminjam_slug']); ?>" class="btn btn-warning mt-lg-2">
                            <i class="fas fa-pen mr-3"></i>Edit
                        </a>
                        <form action="<?= base_url('jurusan/userpeminjam/' . $userPeminjam['peminjam_id'] . '?redirect=detail'); ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-danger mt-lg-2" data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-times mr-3"></i>Delete
                            </button>
                        </form>
                    <?php elseif ($userPeminjam['peminjam_status'] == 0) : ?>
                        <!-- Jika status Inactive (0), hanya tampilkan tombol Delete -->
                        <form action="<?= base_url('jurusan/userpeminjam/' . $userPeminjam['peminjam_id'] . '?redirect=detail'); ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-danger mt-lg-2" data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-times mr-3"></i>Hapus
                            </button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>
<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus peminjam ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="<?= base_url('jurusan/userpeminjam/' . $userPeminjam['peminjam_id'] . '?redirect=detail'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>