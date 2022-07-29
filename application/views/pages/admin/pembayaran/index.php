
  <main>
    <div class="container">
      <section class="wow fadeIn" id="profil">
		  <h1>Pembayaran</h1>
		  <a href="<?= base_url('pembayaran/create') ?>" class="btn btn-success my-2">Tambah</a>
			<div class="card shadow p-2">
				<div class="container">
					<div class="table-responsive  mt-4">
						<table class="table text-nowrap" id="tablesdata">
							<thead>
								<tr>
									<th class="border-top-0">Nomor</th>
									<th class="border-top-0">Nama Pembayaran</th>
									<th class="border-top-0">QRIS</th>
									<th class="border-top-0">Aksi</th>
								</tr>
							</thead>
							<tbody>
								
								<?php $no=0; ?>
								<?php foreach ($pembayaran as $key => $value) {?>
								<?php $no++ ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $value->nama_pembayaran ?></td>
										<td><img src="<?= base_url('assets/file/pembayaran/'.$value->qris) ?>" width="200px" height="150px" alt="" style="object-fit: cover;"></td>
										<td>
											<div class="d-flex">
												<a href="<?= base_url('pembayaran/edit/'.$value->id) ?>" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
												<a href="<?= base_url('pembayaran/delete/'.$value->id) ?>" onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-danger">Delete</a>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
      </section>
    </div>
  </main>
