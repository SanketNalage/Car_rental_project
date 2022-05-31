<?php
session_start();
include "config.php";
if ($_SESSION["alogin"] == true) {
    
} else {
    header("Location:index.php");
    exit;
}

if(isset($_POST['sub'])){
  //include "config.php";
  $vtitle = $_POST['vtitle'];
  $vbran = $_POST['vbrand'];
  $voverview = $_POST['voverview'];
  $pdprice = $_POST['pdprice'];
  $ftype = $_POST['fueltype'];
  $myear = $_POST['myear'];
  $scapacity = $_POST['scapacity'];
  $vimg1 = addslashes(file_get_contents($_FILES["img1"]["tmp_name"]));
  $vimg2 = addslashes(file_get_contents($_FILES["img2"]["tmp_name"]));
  $vimg3 = addslashes(file_get_contents($_FILES["img3"]["tmp_name"]));
  $vimg4 = addslashes(file_get_contents($_FILES["img4"]["tmp_name"]));

  $ac = $_POST['ac'];
  $airbag = $_POST['airbag'];
 
  $query = "INSERT INTO car (vtitle,vbrand,voverview,pdprice,ftype,myear,scapacity,vimg1,vimg2,vimg3,vimg4,ac,airbag) VALUES ('$vtitle','$vbran','$voverview','$pdprice','$ftype','$myear','$scapacity','$vimg1','$vimg2','$vimg3','$vimg4','$ac','$airbag')";
 
  $result = mysqli_query($conn, $query) or die("Error".mysqli_error($conn));
 
      header("Location:car_info.php");
     
 
  mysqli_close($conn);

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once "head.php";
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        include "leftmeun.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><b> Car Insert</b></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                           
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- action="car_operation_insert.php" -->
            <!-- Main content -->
           
            <div class="container m-1">
                <form class="row g-3" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" >
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Vehicle Title<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="vtitle" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Vehicle Brand<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="vbrand" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Overview<span style="color:red">*</span></label>
                        <textarea class="form-control" name="voverview" rows="2" required=""></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Price per day (In rupees)<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="pdprice" placeholder="₹" required>
                    </div>

                    <label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
                    <div class="col-sm-1">
                        <select class="selectpicker" name="fueltype" required>
                            <option value=""> Select </option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="CNG">CNG</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="year" class="form-label">Model year<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="myear" required>
                    </div>
                    <div class="col-md-6">
                        <label for="capacity" class="form-label">Sitting capacity<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="scapacity" required>
                    </div>
                    <div class="hr-dashed"></div>


                    <div class="form-group">
                        <div class="col-sm-12">
                            <h4><b>Upload Images</b></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
                        </div>
                        <div class="col-sm-4">
                            Image 2<span style="color:red">*</span><input type="file" name="img2" required>
                        </div>
                       
                    </div>


                    <div class="form-group">
                    <div class="col-sm-4">
                            Image 3<span style="color:red">*</span><input type="file" name="img3" required>
                        </div>
                        <div class="col-sm-4">
                            Image 4<span style="color:red">*</span><input type="file" name="img4" required>
                        </div>
                    
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="gridCheck">Speciality</label>
                        <div class="form-check">
                            <input class="form-check-input" name="ac" type="checkbox" value="1" id="gridCheck">
                            <input class="form-check-input" name="ac" type="hidden" value="0" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Air Condition
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="airbag" type="checkbox" value="1" id="gridCheck">
                            <input class="form-check-input" name="airbag" type="hidden" value="0" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Airbag (Safety)
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="sub">Insert</button>
                    </div>
                </form>
            </div>
            <!-- main Content End -->
           
        </div>
        <?php
        include "footer.php";
        ?>
    </div>
</body>

</html>