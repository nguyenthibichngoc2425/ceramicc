<style>
  body {
  background: linear-gradient(135deg, #f8f9fa, #d1e3fc);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  min-height: 100vh;
  padding: 20px 0;
}

.content-header h1 {
  font-size: 36px;
  font-weight: 900;
  color: #1f2d3d;
  margin-bottom: 15px;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
}

.breadcrumb {
  background: transparent;
  margin-bottom: 25px;
  font-weight: 600;
  font-size: 14px;
}
.breadcrumb li a {
  color: #007bff;
  transition: color 0.3s ease;
}
.breadcrumb li a:hover {
  color: #0056b3;
}

.box {
  background: white;
  border-radius: 25px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
  border: none;
  padding: 30px 25px;
  max-width: 1100px;
  margin: 0 auto;
}

.box-header.with-border {
  border-bottom: 1px solid #dee2e6;
  margin-bottom: 25px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 10px;
}

table.table-bordered {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 15px;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

table.table-bordered th {
  background: linear-gradient(90deg,rgb(166, 174, 191),rgb(7, 31, 60));
  color: white;
  text-align: center;
  font-weight: 700;
  padding: 15px 10px;
  user-select: none;
}

table.table-bordered td {
  text-align: center;
  vertical-align: middle;
  background-color: #fefefe;
  color: #333;
  padding: 14px 8px;
  font-weight: 600;
  border-top: 1px solid #e3e3e3;
  transition: background-color 0.3s ease;
  cursor: default;
}

table.table-bordered tbody tr:hover td {
  background-color: #e7f1ff;
  color: #0056b3;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-sm {
  border-radius: 25px;
  padding: 8px 18px;
  font-weight: 600;
  box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  letter-spacing: 0.5px;
}

.btn-primary {
  background: linear-gradient(45deg,rgb(99, 132, 166),rgb(8, 17, 55));
  border: none;
  color: white;
  box-shadow: 0 5px 15px rgba(29, 140, 248, 0.6);
}
.btn-primary:hover {
  box-shadow: 0 8px 25px rgba(29, 140, 248, 0.9);
  transform: scale(1.05);
}

.btn-success {
  background: linear-gradient(45deg, #56ab2f, #a8e063);
  border: none;
  color: white;
  box-shadow: 0 5px 15px rgba(88, 196, 57, 0.6);
}
.btn-success:hover {
  box-shadow: 0 8px 25px rgba(88, 196, 57, 0.9);
  transform: scale(1.05);
}

.btn-info {
  background: linear-gradient(45deg, #36d1dc, #5b86e5);
  border: none;
  color: white;
  box-shadow: 0 5px 15px rgba(54, 209, 220, 0.6);
}
.btn-info:hover {
  box-shadow: 0 8px 25px rgba(54, 209, 220, 0.9);
  transform: scale(1.05);
}

</style>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Photo</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Date Added</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM users WHERE type=:type");
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                        $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                        $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        echo "
                          <tr>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td>".$row['email']."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>
                              ".$status."
                              ".$active."
                            </td>
                            <td>
                              <a href='cart.php?user=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-search'></i> Cart</a>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  
    <?php include 'includes/users_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.status', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'users_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.userid').val(response.id);
      $('#edit_email').val(response.email);
      $('#edit_password').val(response.password);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact_info);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
