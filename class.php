<?php
/* create class crud*/
class crud{
   private $conn;
   private $username ='root';
   private $servername = 'localhost';
   private $password = '';
   private $dbname = 'oopscrud';
 /* create function for database connection */
   function __construct(){
     $this->conn =  new mysqli($this->servername,$this->username,$this->password,$this->dbname);
     if($this->conn->connect_error)
     {
         echo "connection failed";
     }
     else{
         //echo "noo";
         return $this->conn;
     }
   } 
/* connection end */

   /* create function for insert data into db */
      public function insertRecord($post,$tmp,$fname)
      {
      
         $Name = $post['name'];
         $Email = $post['email'];
         $Age = $post['age'];
         $City = $post['city'];
          // $tmp=$_FILES['image']['tmp_name'];
          // $fname=$_FILES['image']['name'];
         mkdir("users/$Email");
         move_uploaded_file($tmp,"users/$Email/$fname");
         $img="users/$Email/$fname";
         $image = $img;
         $sql ="insert into employee(UName,Email,Age,City,image) values('$Name','$Email','$Age','$City','$image')";
         $result = $this->conn->query($sql);
         if($result){
             header("location:add.php?msg='user successfully added'");
           }
         else{
             echo"err";
          }
        }
     /* end of insertrecord */

     
    /*create function display data*/ 
       public function displayRecord()
      {
          $sql= "select * from employee";
           $result=$this->conn->query($sql);
           if($result->num_rows>0)
          {
            while($row = $result->fetch_assoc()){
               $data[] = $row;
             }
              return $data;
             }
     }
    

/* edit data */
/* select data from db to display and edit */

       function editRecord($editid)
{
     $sql = "select * from employee where id = '$editid'";
     $result =mysqli_query($this->conn,$sql);
     if($result->num_rows==1)
     {
         $row = mysqli_fetch_assoc($result);
         return $row;
     }
}
/* edit record end */

/* update record*/
   function UpdateRecord($post)
{
   $Name = $post['name'];
   $Email = $post['email'];
   $Age = $post['age'];
   $City = $post['city'];
   $editid = $post['id'];
   $sql ="update employee set UName='$Name',Email='$Email',Age='$Age',City='$City' where Email='$Email'" ;
   $result = $this->conn->query($sql);
   if($result){
        //echo "err";
       header("location:add.php?upd=user updated successfully!!");
     }
   else{
       echo"err";
    }
}
/* update record end*/

/* delete record */
public function deleteRecord($delid)
{
    $sql = "delete from employee where id ='$delid'";
    $result = $this->conn->query($sql);
    if($result){
        header('location:add.php?msg=delete data successfully');
    }
    else{
        echo "error";
 }

}
}




?>