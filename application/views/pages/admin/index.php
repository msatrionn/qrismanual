
  <main>
    <div class="container">
      <section class="wow fadeIn" id="profil">
				<div class="card shadow p-4">
					<h3 class="text-center">Dashboard</h3>
					<div class="container">
						<div class="row mt-4">
								<div class="col-md-3">
									<div class="card shadow bg-danger text-white p-4">Metode Pembayaran : <?= $total_pembayaran->total_pembayaran ?> </div>
								</div>
								<div class="col-md-3">
									<div class="card shadow bg-danger text-white p-4">Pemesanan : <?= $pemesanan->pemesanan ?></div>
								</div>
								<div class="col-md-3">
									<div class="card shadow bg-danger text-white p-4">Diproses : <?= $diproses->proses ?></div>
								</div>
								<div class="col-md-3">
									<div class="card shadow bg-danger text-white p-4">Lunas : <?= $lunas->lunas ?></div>
								</div>
							</div>
					</div>
				</div>
      </section>
    </div>
  </main>
