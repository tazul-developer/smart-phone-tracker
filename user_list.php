<?php include_once("header.php"); ?>
<head> <meta http-equiv="refresh" content="30" /> </head>

<div id="content-wrapper">

<div class="container-fluid">


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header"><a class ="btn btn-primary btn-sm" href="register.php">Add New User</a></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
             <tr>
              <th scope="col">#</th>
              
              <th scope="col">User Name</th>
              <th scope="col">Full Name </th>
              <th scope="col">Android ID </th>
              <th scope="col">User Role </th>
              <th scope="col">Action </th>
            </tr>
          </thead>
<?php 
$sql = "SELECT * FROM current_locations";
$result = $conn->query($sql);
$count = 1;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { ?>
          <tbody>
              <tr>
            <td scope="row"><?= $count++; ?></td>
            <td><b>
                <?php
                $u_name = $row["username"]; 
                if($u_name == NULL){
                    echo "Unknown User";
                }else{
                    echo $u_name;
                }
                ?>
            </b></td>
            <td> 
                <?php
                    $f_name = $row["full_name"]; 
                    if($f_name == NULL){
                        echo "Unknown User";
                    }else{
                        echo $f_name;
                    }
                ?>
            </td>
            <td><?= $row["aid"]; ?></td>
            <td>
                <?php $u_role = $row["role"]; 
                    if($u_role == 2){
                        echo "Super Admin";
                    }else{
                        echo "Regular user";
                    }
            
                ?>
            </td>
             <td>
                <a class ="btn btn-primary btn-sm" href="edit_user.php?aid=<?php echo $row["aid"];?>&id=<?php echo $row["id"];?>"><i class="far fa-edit"></i></a> |
                <a class ="btn btn-danger btn-sm" href="delete_user.php?aid=<?php echo $row["aid"];?>&id=<?php echo $row["id"];?>" onclick="return confirm('Are you sure to delete this User?');">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
          </tbody>
               
<?php } }else {echo "0 results";} ?>
        </table>
      </div>
    </div>
  </div>
<?php include_once("footer.php");?>