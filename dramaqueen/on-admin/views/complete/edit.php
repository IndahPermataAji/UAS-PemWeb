<?php
$urlcrud = "index.php?page=complete/";

	include "koneksi.php";

	$id = $_GET['id'];

	$query = "SELECT * FROM complete WHERE id='".$id."'";
	$sql = mysqli_query($connect, $query);  
	$data = mysqli_fetch_array($sql); 
	?>
	 <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>
	<div class="row">
	<div class="col-lg-6">
	<form method="post" action="<?= $urlcrud.'proses_edit&id='.$data['id'] ?>" enctype="multipart/form-data" >
			<input type="hidden" name="id" value="<?= $data->id ?>">
			<div class="form-group">
				<label>ID</label>
				<input type="text" name="id" value="<?php echo $data['id']; ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Judul</label>
				<input type="text" name="judul" value="<?php echo $data['judul']; ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<input type="text" name="tahun" value="<?php echo $data['tahun']; ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Jumlah Episode</label>
				<input type="text" name="jumlah_ep" value="<?php echo $data['jumlah_ep']; ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Genre</label>
				<input type="text" name="genre" value="<?php echo $data['genre']; ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Negara</label>
				<input type="text" name="negara" value="<?php echo $data['negara']; ?>" class="form-control" required>
			</div>
			<div class="form-group">
				<label>GAMBAR</label><br>
				<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
				<input type="file" name="gambar">
			</div>
			<a href="index.php?page=complete/index"><input type="submit" class="btn btn-primary btn-sm" name="Ubah" value="Ubah">
			<a href="index.php?page=complete/index"><input type="button" class="btn btn-primary btn-sm" value="Batal"></a>
			<br>
			<br>
			<br>
			<br>
		</form>
	</div>
</div>

