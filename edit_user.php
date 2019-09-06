<?php include_once("header.php");
    $aid        = $_GET["aid"];  
    $id         = $_GET["id"];  
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name  = test_input($_POST["full_name"]);
    $email      = test_input($_POST["email"]);
    $phone      = test_input($_POST["phone"]);
    
    if ( $full_name != null && $email != null && $phone != null ){
    
        $r_sql = "UPDATE current_locations SET
            full_name = '$full_name',
            email = '$email',
            phone = '$phone'
            WHERE aid = '$aid'";
        
         if($conn->query($r_sql) === TRUE) {
            $success =  "Updated successfully";
        } else {
            echo "Error: " . $r_sql . "<br>" . $conn->error;
        }
    }else{
        echo $err = "Failed!";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<?php 
$sql = "SELECT * FROM current_locations WHERE aid='$aid' and id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$row = $result->fetch_assoc();
 $u_aid = $row['aid'];
 $u_username = $row['username'];
 $u_full_name = $row['full_name'];
 $u_email = $row['email'];
 $u_phone = $row['phone'];


}

?>



<div class="container" style ="margin-top:40px; margin-bottom:60px; width:100%">

<div class=" bootstrap snippet">
    <div class="row">
  		<div class="container">
  		    <div class="col-sm-"12" syt><h4>User name</h4></div>
  		</div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
      <div class="">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="www.techlore.net">www.techlore.net</a></div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-lg text-primary"></i> 
            	<i class="fab fa-instagram fa-lg text-danger "></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-sm-6">
           <h6 class ="text-success"><?= $success; ?></h6>
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="" method="post" id="registrationForm">
                  
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name"><h6>Android Id</h6></label>
                             <input type="text" class="form-control" value="<?= $u_aid;?>"  readonly>
                            </div>
                      </div>
                       <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name"><h6>Username</h6></label>
                             <input type="text" class="form-control" value="<?= $u_username;?>"  readonly>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h6>Full name</h6></label>
                              <input type="text" class="form-control" name="full_name" id="first_name" value="<?= $u_full_name;?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h6>Email</h6></label>
                              <input type="email" class="form-control" name="email" value="<?= $u_email ;?>" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h6>Phone</h6></label>
                              <input name = "phone" type="phone" class="form-control" value="<?= $u_phone;?>">
                          </div>
                      </div>

                       

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn  btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> update</button>
                               	<a href="user_list.php" class="btn " type="reset"><i class="glyphicon glyphicon-repeat"></i> close</a>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
               
              </div><!--/tab-pane-->
          </div>

        </div>
    </div><!--/row-->

</div>

<script>
    $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>
<?php include_once("footer.php");?>
