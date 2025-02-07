<?= $this->extend('peminjam/layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">My Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('peminjam'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">My Profile</li>
        </ol>

        <!-- Flash Session -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- End Flash Session -->

        <div class="card border-dark mb-3">
            <div class="card-header">Profil Saya</div>
            <div class="card-body text-dark">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputNama">Nama</label>
                        <input type="text" class="form-control py-4" id="inputNama" value="<?= session('nama'); ?>" readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="inputHp">Nomor Hp</label>
                        <input type="tel" class="form-control py-4" id="inputHp" value="<?= $userPeminjam['peminjam_hp']; ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputEmail">Email</label>
                    <input type="text" class="form-control py-4" id="inputEmail" value="<?= $userPeminjam['peminjam_email']; ?>" readonly />
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="small mb-1" for="inputUsername">Username</label>
                        <input type="text" class="form-control py-4" id="inputUsername" value="<?= session('username'); ?>" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input type="password" class="form-control py-4" id="inputPassword" value="<?= $userPeminjam['peminjam_password']; ?>" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control py-4" id="inputConfirmPassword" value="<?= $userPeminjam['peminjam_password']; ?>" readonly />
                    </div>
                </div>

                <!-- Tombol Edit -->
                <a href="<?= base_url('peminjam/myprofile-edit/' . $userPeminjam['peminjam_id']); ?>" class="btn btn-primary mt-lg-3"><i class="fas fa-pen mr-3"></i>Edit</a>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>
