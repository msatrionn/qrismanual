
  <main>
    <div class="container">
      <section class="mt-5 wow fadeIn" id="profil">
		  <div class="card shadow" style="min-height: 100vh;">
			<div class="container">
				<p class="mt-4">Form Tambah Data</p>
				<form action="<?= base_url('pembayaran/simpan') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Nama Pembayaran</label>
						<input type="text" name="nama_pembayaran" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<input type="text" name="deskripsi" class="form-control" required>
					</div>
					<div class="form-group">	
						<label for="">QRIS</label>
						<input type="file" name="qris" class="form-control" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
      </section>
    </div>
  </main>
