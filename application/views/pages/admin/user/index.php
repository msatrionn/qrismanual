
  <main>
    <div class="container">
      <section class="wow fadeIn" id="profil">
		  <h1>User</h1>
			<div class="card shadow p-2">
				<div class="container">
					<div class="table-responsive  mt-4">
						<table class="table text-nowrap" id="tablesdata">
							<thead>
								<tr>
									<th class="border-top-0">Nomor</th>
									<th class="border-top-0">Email</th>
									<th class="border-top-0">Username</th>
									<th class="border-top-0">Alamat</th>
									<th class="border-top-0">No Telpon</th>
									<th class="border-top-0">Aksi</th>
								</tr>
							</thead>
							<tbody>
								
								<?php $no=0; ?>
								<?php foreach ($user as $key => $value) {?>
								<?php $no++ ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $value->email ?></td>
										<td><?= $value->username ?></td>
										<td><?= $value->alamat ?></td>
										<td><?= $value->no_telp ?></td>
										<td>
											<div class="d-flex">
												<a href="<?= base_url('login/delete_data_user/'.$value->id) ?>" onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-danger">Delete</a>
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
