<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.css" integrity="sha512-DkOTFL3mBrpwoH8ESok7Laa3spjRgLCU8GXtVDvRvF/9Zqcy90f6ubFkd22SvdGzSlrPhREuiccMjsP9aaBbPg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>QRIS</title>
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
					<?php
					if ($this->session->userdata('id')!= null) {?>
					<li class="nav-item">
					<a class="nav-link " href="<?= base_url('login/logout') ?>">Logout</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<section>
		<img src="<?= base_url('assets/file/payment.jpg') ?>" alt="Notebook" style="width:100%;height: 500px;object-fit: cover;">
		<div class="content">
			<h1 class="text-center mt-4 pt-4">Tentang Kami</h1>
			<div class="container">
				<div class="py-5" style="text-align: justify;">
					istem pembayaran perdagangan elektronik memfasilitasi penerimaan pembayaran elektronik untuk transaksi daring. Juga dikenal sebagai subkomponen dari pertukaran data elektronik, sistem pembayaran perdagangan elektronik menjadi semakin populer karena meluasnya penggunaan belanja dan perbankan berbasis internet.
					istem pembayaran perdagangan elektronik memfasilitasi penerimaan pembayaran elektronik untuk transaksi daring. Juga dikenal sebagai subkomponen dari pertukaran data elektronik, sistem pembayaran perdagangan elektronik menjadi semakin populer karena meluasnya penggunaan belanja dan perbankan berbasis internet.
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
