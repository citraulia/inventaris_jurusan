<?= $this->extend('jurusan/layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Profil Saya</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('jurusan'); ?>">Dashboard</a></li>
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
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" value="<?= $userJurusan['user_nama']; ?>" readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="readPosisi">Posisi</label>
                        <input type="text" class="form-control" id="readPosisi" value="<?= $userJurusan['user_posisi']; ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNip">NIP</label>
                    <input type="text" class="form-control" id="inputNip" value="<?= $userJurusan['user_nip']; ?>" readonly />
                </div>
                <div class="form-row mt-lg-1">
                    <div class="form-group col-md-4">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" value="<?= $userJurusan['user_username']; ?>" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" value="<?= $userJurusan['user_password']; ?>" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" value="<?= $userJurusan['user_password']; ?>" readonly />
                    </div>
                </div>
                <a href="<?= base_url('jurusan/myprofile-edit/' . $userJurusan['user_id']); ?>" class="btn btn-primary mt-lg-3"><i class="fas fa-pen mr-3"></i>Edit</a>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>
