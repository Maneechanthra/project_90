
<?php
      $con= mysqli_connect("localhost","root","oof123456","admission_kucsc") or die("Error: " . mysqli_error($con));
      mysqli_query($con, "SET NAMES 'utf8' ");
      error_reporting( error_reporting());
      date_default_timezone_set('Asia/Bangkok');

      //print_r( $_SESSION['app_data'] );
      $App_id2 = $_SESSION['App_id'];
      //echo "App_id : ".$App_id2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>City</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>ข้อมูลส่วนตัว</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/form-validation.css" rel="stylesheet">
  </head>
    <style>
        .app_subsection{
            padding-top:20px; 
            color:red; 
            font-weight:800; 
            font-size:120%;
        }
    </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  
<?php

    $sql_provinces = "SELECT * FROM `provinces`";
    $query = mysqli_query($con, $sql_provinces);
    


    $sql_provinces2 = "SELECT * FROM `address` WHERE App_id = '$App_id2'";
    $result = mysqli_query($con, $sql_provinces2);
    $row_prov = mysqli_fetch_assoc($result); 

    if(isset($row_prov)){
      $province_rowp = $row_prov['Province_id'];
      $sql_pro = "SELECT * FROM `provinces` WHERE id = '$province_rowp';";
      $query_pro2 = mysqli_query($mysqli,$sql_pro);
      $row_pro2 = mysqli_fetch_assoc($query_pro2);
  } else {
      $row_pro2 = null;
  }

  
  $sql_query5 = "SELECT * FROM `provinces`";
  $query5 = mysqli_query($mysqli, $sql_query5);
    
 ?>
       
       <div class="col-lg-3 form-group">
  <label for="sel1">จังหวัด:</label>
  <select select class="form-control form-control-lg" name="Ref_prov_id" id="provinces">

  <option value="" <?php if(!$row_pro2){ echo 'selected disabled'; } ?>>-กรุณาเลือกจังหวัด-</option>  

      
 <!-- <?php /*  <option value="<?php echo $row_pro2['id']; ?>" <?php if(isset($row_pro2)){ echo 'selected'; } ?>><?php echo isset($row_pro2) ? $row_pro2['name_th'] : ''; ?></option> */ ?> -->

      <?php foreach ($query5 as $value) { ?>

      <option value="<?=$value['id']?>" <?php if($row_pro2 && $row_pro2['id'] == $value['id']){ echo 'selected'; } ?>><?=$value['name_th']?></option>

<?php } ?>
  </select>
  <br>
  </div> 


          <?php

  //////------------------------------------------------------------------------------------

  //$sql_am = "SELECT * FROM `address` WHERE App_id = '$App_id2'";
  //$result2 = mysqli_query($con, $sql_am);
  //$row_am = mysqli_fetch_assoc($result2); 

if(isset($row_prov)){
  $am_rowp = $row_prov['District_id'];
  $sql_am = "SELECT * FROM `amphures` WHERE id = '$am_rowp';";
  $query_am = mysqli_query($mysqli,$sql_am);
  $row_am2 = mysqli_fetch_assoc($query_am);


  

} else {
  $row_am2 = null;
}
$sql_query6 = "SELECT * FROM `amphures`";
$query6 = mysqli_query($mysqli, $sql_query6);

          ?>

<div style="width: 200px;" class="col-lg-3 form-group">
          <label style="padding-right: 10px;" for="amphures">อำเภอ : </label> 
          <select class="form-control form-control-lg" name="Ref_dist_id" id="amphures">
          
          <option value="" <?php if(!$row_am2){ echo 'selected disabled'; } ?>>-กรุณาเลือกอำเภอ-</option>  

      
<!-- <?php /* <option value="<?php echo $row_am2['id']; ?>" <?php if(isset($row_am2)){ echo 'selected'; } ?>><?php echo isset($row_am2) ? $row_am2['name_th'] : ''; ?></option> */ ?> -->

    <?php foreach ($query6 as $value) { ?>

    <option value="<?=$value['id']?>" <?php if($row_am2 && $row_am2['id'] == $value['id']){ echo 'selected'; } ?>><?=$value['name_th']?></option>

<?php } ?>

      </select>
      </div>
      <?php

  //////------------------------------------------------------------------------------------

  //$sql_am = "SELECT * FROM `address` WHERE App_id = '$App_id2'";
  //$result2 = mysqli_query($con, $sql_am);
  //$row_am = mysqli_fetch_assoc($result2); 

if(isset($row_prov)){
  $dis_rowp = $row_prov['Sub_District_id'];
  $sql_dis = "SELECT * FROM `districts` WHERE id = '$dis_rowp';";
  $query_dis = mysqli_query($mysqli,$sql_dis);
  $row_dis2 = mysqli_fetch_assoc($query_dis);

} else {
  $row_dis2 = null;
}
$sql_query6 = "SELECT * FROM `districts`";
$query6 = mysqli_query($mysqli, $sql_query6);

          ?>
      
      <div class="col-lg-3 form-group">
          <label style="padding-right: 10px;" for="districts">ตำบล : </label> 
          <select class="form-control form-control-lg" name="Ref_subdist_id" id="districts">
          <option value="" <?php if(!$row_dis2){ echo 'selected disabled'; } ?>>-กรุณาเลือกตำบล-</option>  

      
<!-- <?php /* <option value="<?php echo $row_dis2['id']; ?>" <?php if(isset($row_dis2)){ echo 'selected'; } ?>><?php echo isset($row_dis2) ? $row_dis2['name_th'] : ''; ?></option>  */ ?>  -->

<?php while ($value = mysqli_fetch_assoc($query6)) { ?>
            <option value="<?=$value['id']?>" <?php if($row_dis2 && $row_dis2['id'] == $value['id']){ echo 'selected'; } ?>><?=$value['name_th']?></option>
        <?php } ?>
          </select> 
      </div>


       <div class="col-lg-3 form-group">
          <label style="padding-right: 10px;" for="Postal_Code">รหัสไปรษณีย์ : </label> 
          <input type="text" name="Postal_Code" id="Postal_Code" class="form-control" value = "<?php echo isset($row_dis2) ? $row_dis2['Postal_Code'] : ''; ?>">
      </div>
</body>
</html>
<?php include('script.php');?>
