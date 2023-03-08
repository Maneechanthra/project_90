<?php
    session_start();
    require('../config.php');

    $selected_stady_plan = $_POST['Stady_plan'];
    if( $selected_stady_plan == -1 ){
        $selected_stady_plan = $_POST['other_stady_plan'];
    }    

    $App_id = $_SESSION["App_id"];
    $Province_of_school = $_POST["Ref_prov_id"];
    $edu_qualification = $_POST["edu"];
    $school = $_POST["School_name"];
    $gpax = $_POST["gpax"];
    $major = $_POST["major"];

    //$name = $_POST['name'];

    $Major_id_1 = $_POST['major'];

    $id = mysqli_insert_id($mysqli);

    $sql_query = "SELECT * FROM applications WHERE National_id = '".$_SESSION['National_id']."' AND Tcas_round = '".$_SESSION['Tcas_round']."' ";
    $result = mysqli_query($mysqli,$sql_query);
    $record_number = mysqli_fetch_array($result);
    
    $sql_check = "SELECT * FROM education_information WHERE App_id = '$App_id';";
    $query_check = mysqli_query($mysqli, $sql_check);
    $num = mysqli_num_rows($query_check);
    $result_check = mysqli_fetch_array($query_check);
    
    

  //  $sql = "SELECT * FROM education_information WHERE App_id = $App_id";
  //  $query = mysqli_query($mysqli,$sql);
  //  $num = mysqli_num_rows($query);
  //  $result = mysqli_fetch_array($query);


   // $mysql = "SELECT * FROM education_information WHERE App_id = ";



    $sqli = "SELECT * FROM major WHERE Major_id = '$major';";
    $queryi = mysqli_query($mysqli,$sqli);
    $resulti = mysqli_fetch_array($queryi);
    $grade_major = $resulti["gpa"];




    




?>

<?php 
if( $num == 1 ){
    if($gpax >= $grade_major){
    $update_sql = "UPDATE education_information SET School_name = '$school', Edu_qualification = '$edu_qualification', Stady_plan = '$selected_stady_plan', Gpax = '$gpax', Province_id = '$Province_of_school' WHERE education_information.`App_id` = $App_id;";
    echo $update_sql;
    mysqli_query($mysqli,$update_sql);

    $update_major = "UPDATE register_major SET `Major_id_1`='".$_POST['major']."',`Major_id_2`='',`Major_id_3`='',`Major_id_4`='' WHERE register_major.`App_id` = '$App_id';";
    echo $update_major;
    mysqli_query($mysqli,$update_major);
    
?>
<script>
			alert("บันทึกเรียบร้อยแล้ว");
            location.href='../views/print.php?App_id=<?php echo $App_id;?>&Major_id=<?php echo $major;?>';
		</script>
<?php } ?>


<?php
}else if($num == 0){


    

    if($gpax >= $grade_major){

       if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == UPLOAD_ERR_OK) {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            $upload_path = "../uploads/pdf/";

            move_uploaded_file($file_tmp, $upload_path . $file_name);

           // $insert_sql = "INSERT INTO education_information (App_id, School_name, Edu_qualification, Stady_plan, Gpax, Province_id) 
            //VALUES ('$App_id', '$school', '$edu_qualification', '$selected_stady_plan', '$gpax', '$Province_of_school');";
            //mysqli_query($mysqli,$insert_sql);

            $insert_sql = "INSERT INTO education_information (App_id, School_name, Edu_qualification, Stady_plan, Gpax, Province_id,Transcipt) 
            VALUES ('$App_id', '$school', '$edu_qualification', '$selected_stady_plan', '$gpax', '$Province_of_school','$file_name');";
            mysqli_query($mysqli,$insert_sql);

//            $insert_query = "INSERT INTO pdf_data (App_id, portfolio) VALUES ('$id', '$file_name')";
  //          mysqli_query($mysqli, $insert_query);

 }
 

    $id = mysqli_insert_id($mysqli);

    $insert_sql2 = "INSERT INTO register_major (App_id, Major_id_1) 
    VALUES ('$id', '$Major_id_1');";
    mysqli_query($mysqli,$insert_sql2);



    //---------------------------------------

    /*
     if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == UPLOAD_ERR_OK) {
                $file_name = $_FILES['pdf_file'][''];
                $file_tmp = $_FILES['pdf_file']['tmp_name'];
                $upload_path = "../uploads/pdf/";

                move_uploaded_file($file_tmp, $upload_path . $file_name);

                $insert_query = "INSERT INTO pdf_data (App_id, portfolio) VALUES ('$id', '$file_name')";
                mysqli_query($mysqli, $insert_query);

     }
    
    */
     //----------------------------------------



    ?>
<script>
			alert("บันทึกเรียบร้อยแล้ว");
			location.href='../views/print.php?App_id=<?php echo $id;?>&Major_id=<?php echo $major;?>';
		</script>
<?php }?>
    <script>
			alert("ไม่สารถใส่ข้อมูลนี้ได้เนื่องจากเกรดเฉลี่ยต่ำกว่าเงื่อนไขที่กำหนด!!");
			location.href='../views/major.php';
		</script>
<?php }?>

<html>

<bode>
<a href="PageUploadToMySQL3.php">View files</a>
</bode>

</html>