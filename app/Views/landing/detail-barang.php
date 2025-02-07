<?= $this->extend('landing/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">
            <a href="<?= base_url('landing/informasi-barang'); ?>" class="btn btn-light btn-sm mr-2">
                <i class="fas fa-arrow-left fa-2x"></i>
            </a>
            Detail Barang: <?= $informasiBarang['barang_nama']; ?>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('landing/informasi-barang'); ?>">Informasi Barang</a></li>
            <li class="breadcrumb-item active">Detail Barang</li>
        </ol>

        <div class="card border-dark mb-3">
            <div class="card-header">Detail dari <?= $informasiBarang['barang_nama']; ?></div>
            <div class="card-body text-dark">
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $informasiBarang['barang_kode']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $informasiBarang['barang_nama']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Perolehan</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $informasiBarang['barang_tahun_perolehan']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="keadaan">Keadaan Barang</label>
                    <input type="text" class="form-control" id="keadaan" name="keadaan" value="<?= $informasiBarang['barang_keadaan']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $informasiBarang['lokasi_fk']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="foto">Foto-Foto Barang</label>
                    <div class="mt-lg-2">
                        <?php foreach ($fotoBarang as $foto) : ?>
                            <img style="margin-left:5px;" src="<?= '/img/' . $foto['foto_nama']; ?>" class="img-thumbnail text-center" width="300">
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection('content'); ?>
