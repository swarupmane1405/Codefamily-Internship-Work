<?php
  include "connection.php";
?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
  <h2>Stacked form</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="pwd">firstname</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">
    </div>
    <div class="form-group">
      <label for="pwd">lastname</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
    </div>
    <div class="form-group">
      <label for="pwd">email</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">contact</label>
      <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact">
    </div>
    <button type="submit"  name="insert" class="btn btn-primary">insert</button>
   <button type="submit"  name="delete" class="btn btn-primary">delete</button>
   <button type="submit"  name="update" class="btn btn-primary">update</button>
    
  </form>
</div>
</div>
    <div class="clo-lg-12">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>contact</th>
        <th>edit</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
     <?php
       $res=mysqli_query($link,"select * from table1");
       while($row=mysqli_fetch_array($res))
       {
         echo "<tr>";
         echo"<td>";  echo $row["id"]; echo"</td>";
         echo"<td>";  echo $row["firstname"]; echo"</td>";
         echo"<td>";  echo $row["lastname"]; echo"</td>";
         echo"<td>";  echo $row["email"]; echo"</td>";
         echo"<td>";  echo $row["contact"]; echo"</td>";
         echo"<td>";  ?> <a href="edit.php?id=<?php  echo $row["id"]; ?>"><button type="button" class="btn btn-success">edit</button></a>  <?php echo"</td>";
         echo"<td>";  ?> <a href="delete.php?id=<?php  echo $row["id"]; ?>"><button type="button" class="btn btn-danger">delete</button></a>  <?php echo"</td>";

         echo"</tr>";
       }
     ?>
      
    </tbody>
  </table>
    </div>
</body>
</html>
<?php
 if(isset($_POST["insert"]))
 {
     mysqli_query($link,"insert into table1 values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[contact]')");
     ?>
     <script type="text/javascript">
      window.location.href=window.location.href;
     </script>
     <?php
    
 }
 if(isset($_POST["delete"]))
 {
    mysqli_query($link,"delete from  table1 where firstname='$_POST[firstname]'");
    ?>
     <script type="text/javascript">
      window.location.href=window.location.href;
     </script>
     <?php
    
    
 }
 if(isset($_POST["update"]))
 {
    mysqli_query($link,"update table1 set firstname='$_POST[lastname]'where firstname='$_POST[firstname]'");
    ?>
     <script type="text/javascript">
      window.location.href=window.location.href;
     </script>
     <?php
    
   
 }

