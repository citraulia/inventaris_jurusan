<?= $this->extend('landing/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Informasi Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Informasi Barang</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i> Data Barang
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
                                    <td>
                                        <a href="<?= base_url('landing/detail-barang/' . $barang['barang_kode']); ?>" class="btn btn-info">Detail</a>
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
