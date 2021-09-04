<div class="container mt-3">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">

      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
      Tambah Daftar Anime</button>
      
    </div>      
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">

      <form action="<?= BASEURL; ?>/Anime/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari judul anime" name="keyword" id="keyword" autocomplete="off" autofocus="">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
          </div>
        </div>
      </form>
      
    </div>      
  </div>


  <div class="row mb-3"> 
    <div class="col-lg-6">

      <h2><?= $data["judul"]; ?></h2>
      <ul class="list-group">
       <?php foreach ($data["anm"] as $anm ):?>
         <li class="list-group-item"><?= $anm["judul"]; ?>

         <a href="<?= BASEURL; ?>/Anime/hapus/<?= $anm["id"] ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('Apakah anda ingin menghapus data ini?')">hapus</a>

         <a href="<?= BASEURL; ?>/Anime/ubah/<?= $anm["id"] ?>" class="badge badge-success float-right ml-2 tombolUbahData" data-toggle="modal" data-target="#formModal" data-id="<?= $anm["id"]; ?>">edit</a>

         <a href="<?= BASEURL; ?>/Anime/detail/<?= $anm["id"] ?>" class="badge badge-primary float-right ml-2">detail</a>

       </li>
     <?php endforeach; ?>
   </ul>
 </div>
</div>	
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/Anime/" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="judul">Judul ( max 128 characters ) :</label>
            <input type="text" class="form-control" id="judul" name="judul" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" placeholder="1.0" step="0.01" min="0" max="10" required="">
          </div>
          <div class="form-group">
            <label for="genre">Genre ( max 512 characters ) :</label>
            <input type="text" class="form-control" id="genre" name="genre" required="">
          </div>
          <div class="form-group">
            <label for="sinopsis">Sinposis ( max 5120 characters ) :</label>
            <textarea  type="text" class="form-control" rows="3" id="sinopsis" name="sinopsis" required=""></textarea>
          </div>
          <!-- <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
              <option>Completed</option>
              <option>On-Going</option>
            </select>
          </div> -->

        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>