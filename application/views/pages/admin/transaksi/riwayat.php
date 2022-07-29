
  <main>
    <div class="container">
      <section class="wow fadeIn" id="profil">
		  <h1>Riwayat</h1>
			<div class="card shadow p-2">
				<div class="container">
					<div class="table-responsive  mt-4">
						<table class="table text-nowrap" id="tablesdata">
							<thead>
								<tr>
									<th class="border-top-0">Nomor</th>
									<th class="border-top-0">Nama Pembayaran</th>
									<th class="border-top-0">Nomor Transaksi</th>
									<th class="border-top-0">Deskripsi</th>
									<th class="border-top-0">Username / Email</th>
									<th class="border-top-0">Harga</th>
									<th class="border-top-0">Status</th>
									<th class="border-top-0">Bukti Transfer</th>
								</tr>
							</thead>
							<tbody>
								
								<?php $no=0; ?>
								<?php foreach ($transaksi as $key => $value) {?>
								<?php $no++ ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $value->nama_pembayaran ?></td>
										<td><?= $value->no_jenis_transaksi ?></td>
										<td><?= $value->deskripsi ?></td>
										<td><?= $value->username ?> / <?= $value->email ?></td>
										<td><?= $value->jumlah_bayar ?></td>
										<td><?= $value->status ?></td>
										<td><a href="<?= base_url('assets/file/transaksi/'.$value->bukti_transfer) ?>"><img src="<?= base_url('assets/file/transaksi/'.$value->bukti_transfer) ?>" width="200px" height="150px" alt="" style="object-fit: cover;"></a></td>
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
