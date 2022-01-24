<!DOCTYPE html>
<html >
  <head>
    <title>My own inventory system</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type= "text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type= "text/javascript" src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script type= "text/javascript">
  $( function(){
    $("#from").datepicker();
  });

  $( function(){
    $("#to").datepicker();
  });
  </script>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">各診所倉庫傳票擺放位置</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
<div class="container">
  <h3 style = "text-align: center;font-weight: bold;">倉庫傳票</h3>
  <div CLASS = "row">
    <form class="form-horizontal" action="index12.php" method="POST">
      <div class="mb-3 row">
        <label class = "col-lg-2 control-label">Name</label>
        <div class ="col-lg-4">
          <input type="text" class="form-control" name="name" placehplder="Name" >
        </div>
  </div>
<div class="mb-3 row">
  <label class="col-lg-2 control-label ">Gender</label>
  <div class="col-lg-4">
    <input type="radio" name="gender" value="Male" >Male
    <input type="radio" name="gender" value="Female" >Female
    <input type="radio" name="gender" value="Other" checked = "true" >Other 
  </div>
</div>

<div class="mb-3 row">
  <label class="col-lg-2 control-label">Course</label>
  <div class="col-lg-4">
    <select name="course" class="form-control">
      <option>Select</option>
      <option value="B.A">B.A</option>
      <option value="B.COM">B.COM</option>
      <option value="B.SC">B.SC</option>
    </select>
  </div>
</div>

<div class="mb-3 row">
  <label class="col-lg-2 control-label">From</label>
  <div class="col-lg-4">
    <input type="text" name="from_date" id="from" class="form-control">
  </div>
</div>

<div class="mb-3 row">
  <label class="col-lg-2 control-label">To</label>
  <div class="col-lg-4">
    <input type="text" name="to_date" id="to" class="form-control" >
  </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label"></label>
  <div class="col-lg-4">
    <input type="submit" name="submit" class="btn btn-primary" >
  </div>
</div>
</form>
</div>

  <div class="row">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Email</th>
          <th>From</th>
          <th>To</th>
        </tr>
      </thead>
  
	
	<?php
      include ("db1.php");
      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        if($name !=""||$gender !=""||$email !=""||$course !=""||$from !=""||$name
         !=""){
           $query = "SELECT * FROM records WHERE name = '$name' OR gender = '$gender' OR course ='$course' OR from_date = '$from_date' AND to_date = '$to_date'";
         }
           $data = Mysqli_query($conn, $query) or die ('error');
           if(mysqli_num_rows ($data) > 0 ){
             while($row = mysqli_fetch_assoc($data)){
             $id = $row['id'];
             $name = $row['name'];
             $gender = $row['gender'];
             $email = $row['email'];
             $from_date = $row['from_date'];
             $to_date = $row['to_date'];

           ?>
           <tr>
             <td><?php echo $id;?></td>
             <td><?php echo $name;?></td>
             <td><?php echo $gender;?></td>
             <td><?php echo $email;?></td>
             <td><?php echo $from_date;?></td>
             <td><?php echo $to_date;?></td>
           </tr>
           <?php
         }
       }
           else{
            ?>
            <tr>
              <td>
                Records NoT fOUND!</td>
            </tr>
            <?php
          }
       }
    ?>

    </tbody>
	  </table>
  </div>
</div>

</form>

  </body>
</html>

