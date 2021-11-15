<?php
include("class.php");
/* create object */
$obj = new crud();
/*insert record */
if(isset($_POST['submit']))
{
    $tmp=$_FILES['image']['tmp_name'];
    $fname=$_FILES['image']['name'];
    $obj->insertRecord($_POST,$tmp,$fname);
}
/* update record*/
// if(isset($_POST['update'])){
//     $obj->UpdateRecord($post);
// }

/* delete record */
if(isset($_GET['deleteid'])){
    $delid = $_GET['deleteid'];
   $myrecord= $obj->deleteRecord($delid);
  // echo $myrecord;
}


?>









<!--html form part--->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add form</title>
</head>
<body>
    <!------alert massage------->  
    <?php 
      if(!empty($_GET['msg'])){
    ?>
    <div id="alert" class="alert alert-success">   
    <?php echo   $_GET['msg']; ?>
    </div>
    <?php
      }   
    ?>
    <!-----------update alert-------->
<?php 

if(!empty($_GET['upd'])){
?>
<div id="alert" class="alert alert-success">   
<?php echo   $_GET['upd']; ?>
</div>

<?php 
}   
?>
<!----delete alert------>
<?php
if(!empty($_GET['del'])){
?>
<div id="alert" class="alert alert-danger">   
<?php echo   $_GET['del']; ?>
</div>

<?php 
}   
?>
<!-- ADD Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document"> 
     <div class="modal-content"> 
       <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
      <div class=" form1 form-body">
<div class="row">
<div class="form-holder">
    <div class="form-content">
        <div class="form-items">
            <h3 class="text-center">Add Employee</h3>
            <p>Fill in the data below.</p>
            <form method="POST" enctype="multipart/form-data">

                <div class="col-md-20">
                    <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                </div><br>

                <div class="col-md-20">
                    <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                </div>
                <br>
                <div class="col-md-20">
                <input class="form-control" type="number" name="age" placeholder="Age" required>
                </div><br>

                <div class="col-md-20">
                    <input class="form-control" type="text" name="city" placeholder="City" required>
                </div><br>
                <div class="col-md-30">
                    <input class="form-control" type="file" name="image" required>
                </div>
                <div class="form-button mt-3">
                    <button id="submit" name="submit" type="submit" class="btn btn-primary">Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div> 
</div>
</div>
      </div>
    </div>
  </div>
</div>  

<div class="container">
<div class="col-md-19 text-right">
    <button type="button" class=" add btn btn-success mt-4" data-toggle="modal" data-target="#exampleModal">
  ADD
</button>
<!---display table---->
<!---using for each loop and  fatching all the data---->
<table class=" tbl table table-border">
    <tr class="bg">
        <th>Sn</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>AGE</th>
        <th>CITY</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php
    /*create object of displayRecord*/
     $obj = new crud();
     $data = $obj->displayRecord();
     $sn=1;
     foreach($data as $value){
    ?>
         <tr>
             <td><?php echo $sn++;?></td>
             <td><?php echo $value['UName']; ?></td>
             <td><?php echo $value['Email']; ?></td>
             <td><?php echo $value['Age']; ?> </td>
             <td><?php echo $value['City']; ?></td>
             <td class="head"> <img src=" <?php echo $value['image']; ?>" alt="" style="width:80px;,height:80px;"></td>
           
             <td>
                 <a href="edit.php?editid=<?php echo $value['id'];?>" class="btn btn-info">Edit</a>
                 <a href="?deleteid=<?php echo $value['id'];?>" class=" btn btn-danger">Delete</a>

             </td>
         </tr>

       <?php
       
     }

?>
</div>
</div>

<!----------edit------------->
 
<!--Update  Modal -->
    <!-- <div class="frm">
    <div class="form-content">
        <div class="form-items">
            <h3 class="title">Upadte Employee</h3>
            <p class="pera">update in the data below.</p>
            <form method="POST">

                <div class="col-md-11">
                    <input class="form-control" type="text" value="<?php echo $myrecord['UName'];?>" name="name" placeholder="Full Name">
                </div><br>

                <div class="col-md-11">
                    <input class="form-control" type="email" value="<?php echo $myrecord['Email'];?>" name="email" placeholder="E-mail Address" >
                </div>
                <br>
                <div class="col-md-11">
                <input class="form-control" type="number" value="<?php echo $myrecord['Age'];?>" name="age" placeholder="Age">
                </div><br>

                <div class="col-md-11">
                    <input class="form-control" type="text" value="<?php echo $myrecord['City'];?>" name="city" placeholder="City">
                </div><br>
                <div class="form-button mt-3">
                    <button id="editid" name="update" type="submit" class="upbtn btn-success">Update</button>
                   
                </div>
         </form>
        </div>
    </div>
</div>
</div> 
  -->

</body> 

</html>