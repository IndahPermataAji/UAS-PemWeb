<?php
include 'koneksi.php';

$sql = "SELECT * FROM complete";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $link_delete = "<a class='hapusData' href='hapus.php?id=".$row['id']."'>
            Delete</a>";
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>

</head>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
   <a class="navbar-brand" href="https://www.tutorialswb.com/">TutorialsWB</a>
  </div>
 </nav>
 <div class="col-md-3"></div>
 <div class="col-md-6 well">
  <h3 class="text-primary"><center>Hapus Data Tanpa Refresh Halaman Menggunakan MySQLi</center></h3>
  <hr style="border-top:1px dotted #ccc;"/>
  <button type="button" class="btn btn-success" data-target="#form_modal" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add User</button> 
  <br /><br />
  <table id="example" class="table table-striped table-bordered" style="width:100%">
   <thead>
    <tr>
     <th>Firstname</th>
     <th>Lastname</th>
     <th>Age</th>
     <th>Address</th>
     <th>Action</th>
    </tr>
   </thead>
   <tbody>
    <?php
    require 'conn.php';
    $query = mysqli_query($conn, "SELECT * FROM `member` ORDER BY `lastname` ASC") or die(mysqli_error());
    while($fetch = mysqli_fetch_array($query)){
     ?>
     <tr class="del_mem<?php echo $fetch['mem_id']?>">
      <td><?php echo $fetch['firstname']?></td>
      <td><?php echo $fetch['lastname']?></td>
      <td><?php echo $fetch['age']?></td>
      <td><?php echo $fetch['address']?></td>
      <td><button type="button" class="btn btn-danger btn_del" id="<?php echo $fetch['mem_id']?>"><span class="glyphicon glyphicon-remove"></span> Delete</button></td>
     </tr>
     <?php
    }
    ?>
   </tbody>
  </table>
 </div>
 <div class="modal fade" id="modal_confirm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title">Notification</h3>
    </div>
    <div class="modal-body">
     <center><h4>Apakah anda benar-benar ingin menghapusnya?</h4></center>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
     <button type="button" class="btn btn-success" id="btn_yes">Yes</button>
    </div>
   </div>
  </div>
 </div>
 <div class="modal fade" id="form_modal" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <form method="POST" action="save_member.php">
     <div class="modal-header">
      <h3 class="modal-title">Add User</h3>
     </div>
     <div class="modal-body">
      <div class="col-md-2"></div>
      <div class="col-md-8">
       <div class="form-group">
        <label>Firstname</label>
        <input type="text" name="firstname" class="form-control" required="required"/>
       </div>
       <div class="form-group">
        <label>Lastname</label>
        <input type="text" name="lastname" class="form-control" required="required" />
       </div>
       <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" class="form-control" min="0" max="200" required="rquired" />
       </div>
       <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" required="required"/>
       </div>
      </div>
     </div>
     <div style="clear:both;"></div>
     <div class="modal-footer">
      <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
      <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
     </div>
    </div>
   </form>
  </div>
 </div>
</div>

<script>
 $(document).ready(function() {
  $('#example').DataTable();
 } );
</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
</body> 
</html> 