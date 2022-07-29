
  <main>
    <div class="container">
      <section class="mt-5 wow fadeIn" id="profil">
		  <div class="card shadow" style="min-height: 100vh;">
			<div class="container">
				<p class="mt-4">Form Edit Data</p>
				<form action="<?= base_url('pembayaran/update') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Nama Pembayaran</label>
						<input type="text" name="nama_pembayaran" value="<?= $edit->nama_pembayaran ?>" class="form-control">
						<input type="hidden" name="id" value="<?= $edit->id ?>" class="form-control">
					</div>
					<div class="form-group">	
						<label for="">QRIS</label>
						<p>
							<img src="<?= base_url('assets/file/pembayaran/'.$edit->qris) ?>" width="200px" height="150px" alt="">
						</p>
						<input type="file" name="qris" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-success">Update</button>
					</div>
				</form>
			</div>
		</div>
      </section>
    </div>
  </main>
