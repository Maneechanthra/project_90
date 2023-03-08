<?php
    session_start();
    require('../config.php');
    print_r( $_SESSION['app_data'] );
    $App_id = $_SESSION['App_id'];
    echo "App_id : ".$App_id;
?>




<!doctype html>
<html lang="en">
  <head>
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

    <style>
  
</style>
  </head>
    <style>
            
            @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Thai:wght@500&family=Sarabun:wght@300&display=swap');
            *{font-family: 'Sarabun', sans-serif;}

        .app_subsection{
            padding-top:20px; 
            color:red; 
            font-weight:800; 
            font-size:120%;
        }
    </style>

  <body class="">

        <div style="margin-top:20px" class="container">
        <?php include('navbar.html') ?>
        </div>
        
        </div>
        

     <!------------------------------------------------------- ข้อมูลส่วนตัว ------------------------------------------------------->      

    <div class="container">
      <div class="py-5 text-center">
        <img style="width: 20%;" class="mb-4" src="../assets/images/KU_Logo.png" alt="" width="100px">
        <h2>กรอกข้อมูลส่วนตัว</h2>
        <p class="lead"><?php echo isset($_SESSION['National_id']) ? "ผู้สมัคร : ".$_SESSION['Firstname_th'] : "ผู้สมัครใหม่";  ?></p>
      </div>
        <hr>
      <!------------------------------------------------------- ชื่อภาษาไทย ------------------------------------------------------->     
        <form class="card-form" action="../functions/form1_function.php" method="POST">
        <div>

        <?php
                        $National_value = "";
                        if( isset( $_SESSION['app_data']['National_id'] ) ){
                            $National_value = $_SESSION['app_data']['National_id'] ; 
                        }                    
                    ?>

            <div>
                        <p style="font-weight: bold;" class="lead"><?php echo isset($_SESSION['National_id']) ? "รหัสประจำตัวประชาชน หรือ Passport : ".$_SESSION['National_id'] : "ผู้สมัครใหม่";  ?></p>
            </div>

            <div>
                <p style="color:red; font-weight:800; font-size:120%;">ข้อมูลภาษาไทย</p>
            </div>  

            <div style="margin-top : 10px" class="col-lg-12 col-12 row">               
                <div class="col-lg-4 col-12 form-group">                
                    <label for="Prefix_th">คำนำหน้า : </label>
                    <select class="form-control form-control-lg" name="Prefix_th" id="Prefix_th">
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>                        
                    </select>
                </div>       
                
                <?php
                        $th_firstname_value = "";
                        if( isset( $_SESSION['app_data']['Firstname_th'] ) ){
                            $th_firstname_value = $_SESSION['app_data']['Firstname_th'] ; 
                        }                    
                    ?>
                
                <div class="col-lg-4 col-12 form-group">
                    <label for="Firstname_th">ชื่อ : </label> 
                    <input type="text" class="form-control" id="Firstname_th" name="Firstname_th" placeholder="ชื่อภาษาไทย" value="<?php echo $th_firstname_value ?>" require="">
                </div>

                <?php
                        $Lastname_th_value = "";
                        if( isset( $_SESSION['app_data']['Lastname_th'] ) ){
                            $Lastname_th_value = $_SESSION['app_data']['Lastname_th'] ; 
                        }                    
                    ?>

                <div class="col-lg-4 col-12 form-group">
                    <label for="Lastname_th">นามสกุล : </label> 
                    <input type="text" class="form-control" id="Lastname_th" name="Lastname_th" placeholder="นามสกุลภาษาไทย" value="<?php echo $Lastname_th_value ?>">
                </div>
            </div>
            <!------------------------------------------------------- ชื่อภาษาอังกฤษ ------------------------------------------------------->  
            <div class="app_subsection">
                ข้อมูลอังกฤษ
            </div>
            <div class="col-lg-12 col-12 row">               
                <div class="col-lg-4 col-12  form-group">                
                    <label for="Prefix_en">Title : </label>
                    <select class="form-control form-control-lg" class="form-select" aria-label="Default select example" name="Prefix_en" id="Prefix_en">
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>                        
                    </select>
                </div>                                
                <div class="col-lg-4 col-12 form-group">

                    <?php
        
                        $firstname_en_value = "";
                        if( isset( $_SESSION['app_data']['Firstname_en'] ) ){
                            $firstname_en_value = $_SESSION['app_data']['Firstname_en'] ; 
                        }                    
                    ?>                 
                    

                    <label for="Firstname_en">Firstname : </label> 
                    <input type="text" class="form-control" id="Firstname_en" name="Firstname_en" placeholder="Firstname" value="<?php echo $firstname_en_value ?>">
                </div>
                <?php
                        $en_lastname_value = "";
                        if( isset( $_SESSION['app_data']['Lastname_en'] ) ){
                            $en_lastname_value = $_SESSION['app_data']['Lastname_en'] ; 
                        }                    
                    ?>
                <div class="col-lg-4 col-12 form-group">
                    <label for="Lastname_en">Lastname : </label> 
                    <input type="text" class="form-control" id="Lastname_en" name="Lastname_en" placeholder="Lastname" value="<?php echo $en_lastname_value ?>">
                </div>
            </div>
            
            <!------------------------------------------------------- ข้อมูลทั่วไป ------------------------------------------------------->  

            <div class="col-lg-12 col-12 row">               
                <div class="col-lg-12 col-12 form-group">
                    <?php
                        $birthday_value = "";
                        if( isset( $_SESSION['app_data']['Birth_date'] ) ){
                            $birthday_value = $_SESSION['app_data']['Birth_date'] ; 
                        }                    
                    ?>                
                    <label for="Birth_date">วัน/เดือน/ปี เกิด : </label> 
                    <input type="date" class="form-control" id="Birth_date" name="Birth_date" placeholder="Birthday" value="<?php echo $birthday_value; ?>"> 
                </div>
            </div>

            <div class="col-lg-12 col-12 row">               
                <div class="col-lg-4 col-12  form-group">  
                <?php
                        $Ethnicity_value = "";
                        if( isset( $_SESSION['app_data']['Ethnicity'] ) ){
                            $Ethnicity_value = $_SESSION['app_data']['Ethnicity'] ; 
                        }                    
                    ?> 
                    <label for="Ethnicity">เชื้อชาติ</label><br>
                    <select class="form-control form-control-lg" name="Ethnicity" id="Ethnicity">
                        <option value="<?php echo $Ethnicity_value; ?>"><?php echo $Ethnicity_value; ?></option> 
                        <option value="ไทย">ไทย</option>
                        <option value="-1">อื่นๆ</option> 
                                              
                    </select>
                  <input class="form-control form-control-lg" type="text" name="other_ethnicity" id="other_ethnicity" style="display:none; width: 200px; margin-top : 10px" placeholder="กรุณาระบุอื่นๆ "> 
                </div>                                
                <div class="col-lg-4 col-12 form-group">
                <?php
                        $Nationality_value = "";
                        if( isset( $_SESSION['app_data']['Nationality'] ) ){
                            $Nationality_value = $_SESSION['app_data']['Nationality'] ; 
                        }                    
                    ?> 
                <label for="Nationality">สัญชาติ</label><br>
                    <select class="form-control form-control-lg" name="Nationality" id="Nationality">
                    <option value="<?php echo $Nationality_value; ?>"><?php echo $Nationality_value; ?></option>
                        <option value="ไทย">ไทย</option>
                        <option value="-1">อื่นๆ</option>                        
                    </select>
                    <input class="form-control form-control-lg" type="text" name="other_nationality" id="other_nationality" style="display:none; width: 200px; margin-top : 10px" placeholder="กรุณาระบุอื่นๆ "> 
                </div>
                <div class="col-lg-4 col-12 form-group" >
                <?php
                        $Religion_value = "";
                        if( isset( $_SESSION['app_data']['Religion'] ) ){
                            $Religion_value = $_SESSION['app_data']['Religion'] ; 
                        }                    
                    ?> 
                <label for="Religion">ศาสนา</label><br>
                    <select class="form-control form-control-lg" name="Religion" id="Religion">
                    <option value="<?php echo $Religion_value; ?>"><?php echo $Religion_value; ?></option>
                        <option value="พุทธ">พุทธ</option>
                        <option value="คริสต์">คริสต์</option>
                        <option value="อิสลาม">อิสลาม</option>
                        <option value="-1">อื่นๆ</option>                        
                    </select>
                    <input class="form-control form-control-lg" type="text" name="other_religion" id="other_religion" style="display:none; width: 200px; margin-top : 10px" placeholder="กรุณาระบุอื่นๆ ">
                </div>
            </div>
           

            <!---------------------------------------------------------------------------------------------------------------------------->

            <!------------------------------------------------------- ข้อมูลการติดต่อ -------------------------------------------------------->
            
            <div class="app_subsection">
                ข้อมูลติดต่อ
            </div>
            <div class="col-lg-12 col-12 row">                    
                <div style="margin-top: 10px;" class="col-lg-4 col-12">
                    ที่อยู่ที่สามารถติดต่อได้ :
                </div>
                    <div style="margin-top: 10px"  class="col-lg-12 col-12">   

                
                    <?php
                        $sql_home = "SELECT * FROM `address` WHERE App_id = '$App_id'";    
                        $query = mysqli_query($mysqli,$sql_home);
                        $row_home = mysqli_fetch_assoc($query);

                    ?> 

                    <!-- seelct ข้อมูล -->

                    <?php


                        $sql_data = "SELECT * FROM `address` WHERE App_id = '$App_id'";
                        $result = mysqli_query($mysqli, $sql_data);
                        $row_data = mysqli_fetch_assoc($result); 


                        if(isset($row_data)){
                            $data_id = $row_data['App_id'];
                            $sql_data2 = "SELECT * FROM `address` WHERE App_id = $data_id;";
                            $query_data = mysqli_query($mysqli,$sql_data2);
                            $row_data2 = mysqli_fetch_assoc($query_data);
                        } else {
                            $row_data2 = null;
                        }

                    ?>

                        <div class="col-lg-4 form-group">
                            <label style="padding-right: 10px;" for="Home_no">บ้านเลขที่ : </label> 
                            <input type="text" class="form-control" id="Home_no" name="Home_no" placeholder="กรุณากรอกบ้านเลขที่"  value = "<?php echo isset($row_data2) ? $row_data2['Home_no'] : ''; ?>">
                        </div>
 

                        <div class="col-lg-4 form-group">
                            <label style="padding-right: 10px;" for="Street">ถนน : </label> 
                            <input type="text" class="form-control" id="Street" name="Street" placeholder="กรุณากรอกถนน/ซอย"  value = "<?php echo isset($row_data2) ? $row_data2['Street'] : ''; ?> "> 
                        </div>

                        <div class="col-lg-4 form-group">
                            <label style="padding-right: 10px;" for="Village_no">หมู่บ้าน : </label> 
                            <input type="text" class="form-control" id="Village_no" name="Village_no" placeholder="กรุณากรอก"   value = "<?php echo isset($row_data2) ? $row_data2['Village_no'] : ''; ?>"> 
                        </div>
                    
                    <?php
                        $Telephone_number_value = "";
                        if( isset( $_SESSION['app_data']['Telephone_number'] ) ){
                            $Telephone_number_value = $_SESSION['app_data']['Telephone_number'] ; 
                        }                    
                    ?>
                     
                        <div class="col-lg-4 form-group">
                            <label style="padding-right: 10px;" for="Telephone_number">เบอร์โทรศัพท์(มือถือ) : </label> 
                            <input type="text" class="form-control" id="Telephone_number" name="Telephone_number" placeholder="กรุณากรอกเบอร์โทรศัพท์(มือถือ)" value="<?php echo $Telephone_number_value;?>"> 
                        </div>

                    <?php
                        $Home_number_value = "";
                        if( isset( $_SESSION['app_data']['Home_number'] ) ){
                            $Home_number_value = $_SESSION['app_data']['Home_number'] ; 
                        }                    
                    ?>

                        <div class="col-lg-4 form-group">
                            <label style="padding-right: 10px;" for="Home_number">เบอร์โทรศัพท์(บ้าน) *ถ้ามี : </label> 
                            <input type="text" class="form-control" id="Home_number" name="Home_number" placeholder="กรุณากรอกเบอร์โทรศัพท์(บ้าน)"  value="<?php echo $Home_number_value;?>"> 
                        </div>  

                    <?php
                        $Email_value = "";
                        if( isset( $_SESSION['app_data']['Email'] ) ){
                            $Email_value = $_SESSION['app_data']['Email'] ; 
                        }                    
                    ?>

                        <div class="col-lg-4 form-group">
                            <label style="padding-right: 10px;" for="Email">Email : </label> 
                            <input type="email" class="form-control" id="Email" name="Email" placeholder="กรุณากรอก Email"   value="<?php echo $Email_value;?>"> 
                        </div>

                    <?php
                        $Parents_occupation_value = "";
                        if( isset( $_SESSION['app_data']['Parents_occupation'] ) ){
                            $Parents_occupation_value = $_SESSION['app_data']['Parents_occupation'] ; 
                        }                    
                    ?>

                        <div class="col-lg-6 form-group">
                            <label style="padding-right: 10px;" for="Parents_occupation">อาชีพของผู้ปกครอง : </label> 
                            <input type="text" class="form-control" id="Parents_occupation" name="Parents_occupation" placeholder="กรุณากรอกอาชีพของผู้ปกครอง"  value="<?php echo $Parents_occupation_value;?>"> 
                        </div>

                    <?php
                        $Income_parents_value = "";
                        if( isset( $_SESSION['app_data']['Income_parents'] ) ){
                            $Income_parents_value = $_SESSION['app_data']['Income_parents'] ; 
                        }                    
                    ?>

                    <div class="col-lg-6 form-group">
                            <label style="padding-right: 10px;" for="Income_parents">รายได้ผู้ปกครองต่อเดือน : </label> 
                            <input type="text" class="form-control" id="Income_parents" name="Income_parents" placeholder="กรุณากรอกรายได้ต่อเดือน"  value="<?php echo $Income_parents_value;?>"> 
                    </div>
                        <?php 
                            include('Form.php');
                        ?>
                        
                        
                      
                    </div>
                   
                    
            </div>
   
            <!--------------------------------------------------------------------------------------------------------------------------->

        </div>
        <div style="padding-top:18px;">
            <button class="btn btn-primary btn-block" type="submit">บันทึก</button>
        </div>
    </form>

        <?php
            for($i=0;$i<20;$i++){
                echo "<br>";
            }
        ?>


      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>


    <link rel="stylesheet" href="../assets/jquery-ui/jquery-ui.css">
    
    <script src="../assets/jquery-ui/jquery.js"></script>
    <script src="../assets/jquery-ui/jquery-ui.js"></script>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {



        'use strict';

        // $("#app_birthday" ).datepicker();
        $("#Birth_date" ).datepicker({ dateFormat: 'yy-mm-dd' });

        $("#Religion").change(function(){
            console.log( $(this).val() );
            if( $(this).val() == -1 ){
                $("#other_religion").show();
                $("#other_religion").focus();
            } else {
              $("#other_religion").hide();
            }

        });

        $("#Ethnicity").change(function(){
            console.log( $(this).val() );
            if( $(this).val() == -1 ){
                $("#other_ethnicity").show();
                $("#other_ethnicity").focus();
            } else {
              $("#other_ethnicity").hide();
            }

        });

        $("#Nationality").change(function(){
            console.log( $(this).val() );
            if( $(this).val() == -1 ){
                $("#other_nationality").show();
                $("#other_nationality").focus();
            } else {
              $("#other_nationality").hide();
            }

        });

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
