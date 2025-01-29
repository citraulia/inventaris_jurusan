<?= $this->extend('jurusan/layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Informasi Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Informasi Barang</li>
        </ol>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <span>Total Barang:</span>
                        <br>
                        <span><?= Count($statusBarang->where('barang_status !=', 0)->findAll()); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <span>Barang yang Siap Pakai:</span>
                        <br>
                        <span><?= Count($statusBarang->where(['barang_status' => '1'])->findAll()); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <span>Barang yang Dipinjam:</span>
                        <br>
                        <span><?= Count($statusBarang->where(['barang_status' => '2'])->findAll()); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <span>Barang Tidak aktif:</span>
                        <br>
                        <span><?= Count($statusBarang->whereIn('barang_status', [3, 4])->findAll()); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Session -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- End Flash Session -->

        <!-- Flash Session -->
        <?php if (session()->getFlashdata('tolak')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('tolak'); ?>
            </div>
        <?php endif; ?>
        <!-- End Flash Session -->

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i>
                    DataTable Informasi Barang
                </div>

                <?php if (allow('3')) : ?>
                    <div>
                        <a href="<?= base_url('jurusan/informasibarang/create'); ?>" class="btn btn-primary"><i class="fas fa-plus mr-3"></i>Tambah Barang</a>
                    </div>
                <?php endif; ?>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tahun Perolehan</th>
                                <th>Keadaan</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tahun Perolehan</th>
                                <th>Keadaan</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($informasiBarang as $barang) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $barang['barang_kode']; ?></td>
                                    <td><?= $barang['barang_nama']; ?></td>
                                    <td><?= $barang['barang_tahun_perolehan']; ?></td>
                                    <td><?= $barang['barang_keadaan']; ?></td>
                                    <td><?= $barang['lokasi_fk']; ?></td>
                                    <td class="text-light text-center 
                                        <?php if ($barang['barang_status'] == 1) {
                                            echo 'bg-success';
                                        } else if ($barang['barang_status'] == 0) {
                                            echo 'bg-secondary'; // Tidak akan ditampilkan karena disembunyikan
                                        } else if ($barang['barang_status'] == 2) {
                                            echo 'bg-warning';
                                        } else if ($barang['barang_status'] == 3) {
                                            echo 'bg-primary'; // Pending
                                        } else if ($barang['barang_status'] == 4) {
                                            echo 'bg-danger'; // Sedang Perbaikan
                                        } ?>
                                    ">
                                        <?php if ($barang['barang_status'] == 1) {
                                            echo '<b>ACTIVE</b>';
                                        } else if ($barang['barang_status'] == 0) {
                                            echo '<b>DIHAPUS</b>'; // Tidak akan ditampilkan
                                        } else if ($barang['barang_status'] == 2) {
                                            echo '<b>SEDANG DIPINJAM</b>';
                                        } else if ($barang['barang_status'] == 3) {
                                            echo '<b>PENDING</b>';
                                        } else if ($barang['barang_status'] == 4) {
                                            echo '<b>SEDANG PERBAIKAN</b>';
                                        } ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-block">
                                            <a href="<?= base_url('jurusan/informasibarang/' . $barang['barang_kode']); ?>" class="btn btn-info">Detail</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection('content'); ?>