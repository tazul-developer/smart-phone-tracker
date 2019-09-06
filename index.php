<?php include_once("header.php"); ?>




    <div id="content-wrapper">

      <div class="container-fluid">

    <div class="center" style="padding:20px;">
        <h2>Hi <?= ucfirst($_SESSION['login_user']); ?>!</h2> <spam><?php if($role==2){echo "(Super Admin)";}?></spam>
        <h4>Welcome to Android Phone Tracker</h4>
    </div>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <!--<i class="fas fa-fw fa-list"></i>-->
                </div>
                <div class="mr-5">
                <?php
                    $sql        = "SELECT * FROM current_locations";
                    $result     = $conn->query($sql);
                    echo $rowcount=mysqli_num_rows($result);
                ?> Registered user</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="http://techlore.net/current_list.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <!--<i class="fas fa-fw fa-shopping-cart"></i>-->
                  <!--<i class="fas fa-fw fa-location"></i>-->
                </div>
                <div class="mr-5">
                    <?php
                    $sql        = "SELECT * FROM custom_area";
                    $result     = $conn->query($sql);
                    echo $rowcount=mysqli_num_rows($result);
                    ?>
                Custom locations!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="http://techlore.net/custom_area.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <!--<div class="col-xl-3 col-sm-6 mb-3">-->
          <!--  <div class="card text-white bg-danger o-hidden h-100">-->
          <!--    <div class="card-body">-->
          <!--      <div class="card-body-icon">-->
                  <!--<i class="fas fa-fw fa-life-ring"></i>-->
          <!--      </div>-->
          <!--      <div class="mr-5">13 New Mail!</div>-->
          <!--    </div>-->
          <!--    <a class="card-footer text-white clearfix small z-1" href="#">-->
          <!--      <span class="float-left">View Details</span>-->
          <!--      <span class="float-right">-->
          <!--        <i class="fas fa-angle-right"></i>-->
          <!--      </span>-->
          <!--    </a>-->
          <!--  </div>-->
          <!--</div>-->
        </div>

        <!-- Area Chart Example-->
        <!--<div class="card mb-3">-->
        <!--  <div class="card-header">-->
        <!--    <i class="fas fa-chart-area"></i>-->
        <!--    Area Chart Example</div>-->
        <!--  <div class="card-body">-->
        <!--    <canvas id="myAreaChart" width="100%" height="30"></canvas>-->
        <!--  </div>-->
        <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
        <!--</div>-->


  <?php include_once("footer.php");?>