<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<p class="login-box-msg" style="font-size:small">
					Untuk pengalaman lebih baik, disarankan menggunakan browser <strong>chrome</strong> pada <strong>komputer pribadi (Laptop/PC Desktop)</strong><br />
					Silahkan tunjukkan <strong>qrcode</strong> kepada <strong>pembimbing</strong> untuk melakukan <strong>scan penilaian</strong>.
				</p>
				<div class="row">
					<div class="col-lg-8">
						<table id="dtTable" class="table table-sm table-bordered table-hover text-nowrap">
							<thead>
								<th class="text-center">No.</th>
								<th>Aspek</th>
								<th class="text-center">Angka</th>
								<th class="text-center">Huruf</th>
							</thead>
							<tbody>
								<?php for ($i = 0; $i < 10; $i++) : ?>
									<tr>
										<td class="text-center"><?= $i + 1 ?></td>
										<td><?= $aspek[$i] ?></td>
										<td class="text-center"><?= $nilai[$i] ?></td>
										<?php if ($nilai[$i] <= 100 && $nilai[$i] >= 91) : ?>
											<td class="text-center">A</td>
										<?php elseif ($nilai[$i] <= 90 && $nilai[$i] >= 75) : ?>
											<td class="text-center">B</td>
										<?php elseif ($nilai[$i] <= 74 && $nilai[$i] >= 60) : ?>
											<td class="text-center">C</td>
										<?php elseif ($nilai[$i] < 60) : ?>
											<td class="text-center">D</td>
										<?php endif ?>
									</tr>
									<?php $jumlah_nilai += $nilai[$i] ?>
								<?php endfor ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2" class="text-center">Jumlah Nilai</td>
									<td class="text-center"><?= $jumlah_nilai ?></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="2" class="text-center">Rata - Rata</td>
									<td class="text-center"><?= ceil($jumlah_nilai / $jumlah_aspek) ?></td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div id="qrcode" class="col-4">
						<?php if ($prakerin['biodata_industri_tanggal_selesai'] <= date("Y-m-d")) : ?>
							<img id="qrcode-images" class="img-responsive w-100" src="<?= $qrcode ?>" alt="qrcode_images" />
						<?php else : ?>
							<p class="text-sm text-justify">
								Helo, <strong class="text-teal"><?= $this->session->userdata('nama') ?></strong> QRCode penilaian untuk di isi oleh pembimbingmu, akan keluar pada saat tanggal prakerinmu selesai. Silahkan tunjukkan QRCode tersebut kepada pembimbing dan minta lah pembimbingmu untuk scan QRCode tersebut dan mengisi formulir penilaian. Terima kasih
							</p>
							<p class="text-center h4">
								<i class="far fa-2x fa-smile text-teal"></i>
							</p>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<div class="btn-group">
					<a href="<?= base_url() ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>