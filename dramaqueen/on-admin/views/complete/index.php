<?php
$urlcrud = "index.php?page=complete/";
?>
<div class="row">
	<div class="col-lg-12">
		<a href="<?= $urlcrud.'create' ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="success">
				
		<th>ID</th>
		<th>GAMBAR</th>
		<th>JUDUL</th>
		<th>TAHUN</th>
		<th>JUMLAH EPISODE</th>
		<th>GENRE</th>
		<th>NEGARA</th>
		<th style="text-align: center;">Actions</th>
			</tr>
			<?php
	include "koneksi.php";
	
	$query = "SELECT * FROM complete"; 
	$sql = mysqli_query($connect, $query); 
	
	while($data = mysqli_fetch_array($sql)){ 
		?>
		<tr id="delete<?php echo $data['id'] ?>">
		<td><?=$data['id'] ?></td>
		<?php
		echo "<td><img src='../images/".$data['gambar']."' width='150' height='100'></td>";?>
		<td><?=$data['judul'] ?></td>
		<td><?=$data['tahun'] ?></td>
		<td><?=$data['jumlah_ep'] ?></td>
		<td><?=$data['genre'] ?></td>
		<td><?=$data['negara'] ?></td>

		<td ><button onclick="deleteAjax(<?php echo $data['id'];  ?>)"  class="btn btn-danger">delete</button>
		<a href="<?= $urlcrud.'edit&id='.$data['id'] ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>
	<?php
	}
	?>
		</table>
	</div>
</div>
<script type="text/javascript">
	 
	 function deleteAjax(id){
   
       if(confirm('are You sure?')){
         
         $.ajax({

              type:'post',
              url:'index.php?page=complete/hapus',
              data:{delete_id:id},
              success:function(data){
              
                   $('#delete'+id).hide('slow');
              }

         });

       }

	 }
	 


// Delete 

</script>
  </div>
<!-- now need jquery cdn -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</html>
</body>