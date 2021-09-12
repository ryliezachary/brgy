<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
#myProgress {
  width: 100%;
  background-color: grey;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: blue;
}
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Search Relative
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Individuals</li>
        <li class="active">Search Individual Relative</li>
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
               <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a> -->
            </div>
            <!-- <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div> -->


          <form action="search_individual.php" method="post">
            <div id="myProgress">
                <div id="myBar" style="display:none"></div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default">Search</span>
              <input type="text" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" checked>
              <label class="form-check-label" for="inlineCheckbox1">Last Name</label>
            </div>
            <!-- <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" checked>
              <label class="form-check-label" for="inlineCheckbox2">Middle Name</label>
            </div> -->
            <input type="submit" onclick="move()" class="btn btn-primary">
            <!-- <button class="btn btn-primary" type="submit" onclick="move()">Search</button> -->

            </form>
          </div>
        </div>
      </div>



      <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Similarity Percentage</th>
                </thead>
                <tbody>
                <?php
                  if(isset($_POST['search'])){
                     
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM individuals";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){

                      similar_text($search,$row['lastname'],$percent);
                      $percent;
                      if($percent > 75){

                  ?>

                      <tr>
                         
                          <td><?php echo $row['firstname']; ?></td>
                          <td><?php echo $row['lastname']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['contact_info']; ?></td>
                          <td><?php echo number_format((float)$percent, 2, '.','') . '%'; ?></td>
                          <td>
                        </td>
                        </tr>
                        <?php
                    }
                  }
                  }
                  ?>
                 
                </tbody>
              </table>
            </div>
    </section>  
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/search_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'individual_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.individual_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#datepicker_edit').val(response.birthdate);
      $('#edit_contact').val(response.contact_info);
      $('#gender_val').val(response.gender).html(response.gender);
    }
  });
}

var i = 0;

function move() {
  document.getElementById("myBar").style.display = "block";
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
        document.getElementById("myBar").style.display = "none";
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}


</script>
</body>
</html>
