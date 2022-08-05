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
	<div class="container" style="min-height: 75vh;">
		<h2 class="mt-4 my-4">Pembelian anda</h2>
		<ol class="list-group list-group-numbered">
			<?php
			foreach ($pembayaran as $key => $value) { ?>
			<li class="list-group-item d-flex justify-content-between align-items-start">
				<div class="ms-2 me-auto">
				<div class="fw-bold"><?= $value->nama_pembayaran ?></div>
				<?= $value->deskripsi ?>
					<?php
					if ($value->status=="lunas") { ?>
						<i style="color:green">(Sudah Dibayar)</i>
					<?php }else{?>
						<i style="color:red">(Proses pembayaran)</i>
					<?php } ?>
				
				</div>
				
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value->id_transaksi ?>">
				Detail
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal<?= $value->id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col">
								<img src="<?= base_url('assets/file/pembayaran/'.$value->qris) ?>" style="width: 300px; height:300px; object-fit: cover;background-position: center;" alt="">
							</div>
							<div class="col mt-4">
								<p> 
									<b>Jenis Pembayaran</b>
									<?= $value->nama_pembayaran ?>
								</p>
								<p>
									<b>No Transaksi</b>
									<?= $value->no_jenis_transaksi ?>
								</p>
								<p>
									<b>Total Pembelian</b>
									<?= $value->jumlah_bayar ?>
								</p>
								<p>
									<b>Status</b><br>
									<?= $value->status ?>
								</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
				</div>
					<?php if ($value->status=="lunas") {?>
						<a href="<?= base_url('assets/file/transaksi/'.str_replace(" ","_",$value->bukti_transfer)) ?>" class="btn btn-danger" style="margin-left: 10px;" target="_blank">Download Bukti</a>
					<?php }elseif(($value->status=="proses")) {?>
						<a href="<?= base_url('assets/file/transaksi/'.str_replace(" ","_",$value->bukti_transfer)) ?>" class="btn btn-danger" style="margin-left: 10px;" target="_blank">Download Bukti</a>
						<form action="<?= base_url('transaksi/update_file') ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col form-group">
									<input type="hidden" name="id_transaksi" value="<?= $value->id_transaksi ?>">
									<input type="file" name="bukti_transfer" class="form-control" style="margin-left: 20px;" required>
								</div>
								<div class="col">
									<button type="submit" class="btn btn-danger" style="margin-left: 20px;">upload bukti</button>
								</div>
							</div>
						</form>
					<?php }else{?>
						<a href="" class="btn btn-danger" style="margin-left: 10px;" onclick="alert('Anda belum upload bukti')" >Download Bukti</a>
						<form action="<?= base_url('transaksi/`update_file`') ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col form-group">
									<input type="hidden" name="id_transaksi" value="<?= $value->id_transaksi ?>">
									<input type="file" name="bukti_transfer" class="form-control" style="margin-left: 20px;" required>
								</div>
								<div class="col">
									<button type="submit" class="btn btn-danger" style="margin-left: 20px;">upload bukti</button>
								</div>
							</div>
						</form>
					<?php } ?>
			<?php } ?>
		</ol>
		<p style="color: red;"><i>*file harus berupa jpg/jpeg/png</i></p>
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
