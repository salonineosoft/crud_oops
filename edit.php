<?php
include("class.php");
$obj = new crud();
if(isset($_POST['update'])){
$obj->UpdateRecord($_post);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <?php
    if(isset($_GET['editid'])){
    $obj = new crud();
    $editid = $_GET['editid'];
    $myrecord = $obj->editRecord($editid);
    //print_r($myrecord)
?>
    <div class="frm">
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
                    <button id="editid" name="update" value="update" type="submit" class="upbtn btn-success">Update</button>
                   
                </div>
         </form>
        </div>
    </div>
</div>
</div>
<?php
    }
    ?>
</body>
</html>