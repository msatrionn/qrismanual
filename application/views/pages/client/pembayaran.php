<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.css" integrity="sha512-DkOTFL3mBrpwoH8ESok7Laa3spjRgLCU8GXtVDvRvF/9Zqcy90f6ubFkd22SvdGzSlrPhREuiccMjsP9aaBbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Hello, world!</title>
  </head>
  <body>
	  <style>
		  .btn.btn-primary{
			  background: #59bdae !important;
			  border: #59bdae;
		  }
		  .icon{
			  color: white;
			  font-size: 30px;
			  margin: 0 5px;
		}
	  </style>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background: #59bdae;">
		<div class="container">
			<a class="navbar-brand" href="#">TopUp</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav" style="display: flex;justify-content: end;">
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="<?= base_url('home/index') ?>">Beranda</a>
					</li>
					<li class="nav-item">
					<a class="nav-link " href="<?= base_url('home/topup') ?>">Top Up</a>
					</li>
					<li class="nav-item">
					<a class="nav-link " href="<?= base_url('home/about') ?>">Tetang kami</a>
					</li>
					<li class="nav-item">
					<a class="nav-link " href="<?= base_url('admin/logout') ?>">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<section>
		<img src="<?= base_url('assets/file/payment.jpg') ?>" alt="Notebook" style="width:100%;height: 500px;object-fit: cover;">
		<div class="content">
			<h1 class="text-center mt-4 my-4">
				Pembayaran
			</h1>
			<div class="container my-4 py-4" style="display: flex;justify-content: center;max-width:50%;">
				<div class="" >
					<img src="<?= base_url('assets/file/pembayaran/'.$pembayaran->qris) ?>" style="width: 300px; height:300px; object-fit: cover;background-position: center;" alt="">
				</div>
				<div class="" style="margin-left: 40px;width: 100%">
					<div>
						<div>E Money</div>
						<h3><?= $pembayaran->nama_pembayaran ?></h3>
						<p>(<?= $pembayaran->deskripsi ?>)</p>
					</div>
					<form action="<?= base_url('transaksi/save') ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group mt-2">
							<label for="">Nomor <?= $pembayaran->nama_pembayaran ?></label>
							<input type="text" name="nomor" class="form-control" placeholder="Masukkan Nomor" required>
						</div>
						<input type="hidden" name="pembayaran_id" value="<?= $pembayaran->id ?>">
						<div class="form-group mt-2">
							<label for="">Pilih Nominal Pembayaran</label>
							<select name="jumlah_bayar" class="form-control" id="">
								<option value="10000">10000</option>
								<option value="15000">15000</option>
								<option value="20000">20000</option>
								<option value="25000">25000</option>
								<option value="30000">30000</option>
								<option value="35000">35000</option>
							</select>
						</div>
						<div class="form-group mt-2">
							<label for="">Nomor Gopay</label>
							<input type="file" name="bukti_transfer" class="form-control" required>
						</div>
						<div class="form-group mt-4">
							<button type="submit" class="btn btn-primary">Bayar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div style="width: 100%; height:150px;background: #59bdae;">
			<h1 style="font-size: 20px;text-align: center;padding-top: 20px;color: white;">Sosial Media</h1>
			<div class="socmed" style="text-align: center; padding-top: 15px;">
				<a href=""><i class="icon fab fa-instagram"></i></a>
				<a href=""><i class="icon fab fa-facebook"></i></a>
				<a href=""><i class="icon fab fa-whatsapp"></i></a>
				<a href=""><i class="icon fab fa-youtube"></i></a>
			</div>
		</div>
	</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
