<div class="container mt-5">
	
	<div class="card" style="width: 70rem;">
		<div class="card-body">
			<h5 class="card-title"><?= $data["anm"]["judul"]; ?></h5>
			<h6 class="card-subtitle mb-2 text-muted">Rating : <?= $data["anm"]["rating"]; ?></h6>
			<p class="card-text">Genre : <?= $data["anm"]["genre"]; ?></p>
			<p class="card-text">Sinopsis : <?= $data["anm"]["sinopsis"]; ?></p>
			<a href="<?= BASEURL; ?>/Anime" class="card-link">Kembali</a>
		</div>
	</div>

</div>


