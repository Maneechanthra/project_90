<?php
    session_start();
    require('../config.php');

    $selected_stady_plan = $_POST['Study_plan'];
    if( $selected_stady_plan == -1 ){
        $selected_stady_plan = $_POST['other_Study_plan'];
    }    

    $national_id_new = $_POST["National_id"];
    $Province_of_school = $_POST["Province_of_school"];
    $edu_qualification = $_POST["edu_qualification"];
    $Study_plan = $_POST["Study_plan"];
    $school = $_POST["School_name"];
    $gpax = $_POST["gpax"];
    $major = $_POST["major"];
    
    $sql = "SELECT * FROM education_student WHERE National_id = $national_id_new";
    $query = mysqli_query($mysqli,$sql);
    $num = mysqli_num_rows($query);

    $sqli = "SELECT * FROM major WHERE Major_id = $major";
    $queryi = mysqli_query($mysqli,$sqli);
    $resulti = mysqli_fetch_array($queryi);
    $grade_major = $resulti["gpa"];
?>

<?php 
if( $num == 1 ){
    if($gpax >= $gpa){
    $update_sql = "UPDATE `education_student` SET `National_id` = '$national_id_new', `School` = '$school', `Education_qualification` = '$edu_qualification', `Study_plan` = '$Study_plan', `Average_GPA` = '$gpax', `Province_of_school` = '$Province_of_school', `Major_id` = '$major' WHERE `education_student`.`National_id` = $national_id_new;
    ";
    mysqli_query($mysqli,$update_sql);
?>
<script>
			alert("บันทึกเรียบร้อยแล้ว");
			location.href='../views/print.php?National_id=<?php echo $national_id_new;?>&Major_id=<?php echo $major;?>';
		</script>
<?php } ?>


<?php
}else if($num == 0){
    if($gpax >= $gpa){
    $insert_sql = "INSERT INTO `education_student` (`education_id`, `national_id`, `School`, `Education_qualification`, `Study_plan`, `Average_GPA`, `Province_of_school`, `major_id`) VALUES (NULL, '$national_id_new', '$school', '$edu_qualification', '$Study_plan', '$gpax', '$Province_of_school', '$major')";
    mysqli_query($mysqli,$insert_sql);
    ?>
<script>
			alert("บันทึกเรียบร้อยแล้ว");
			location.href='../views/print.php?National_id=<?php echo $national_id_new;?>&Major_id=<?php echo $major;?>';
		</script>
<?php }?>
    <script>
			alert("ไม่สารถใส่ข้อมูลนี้ได้เนื่องจากเกรดเฉลี่ยต่ำกว่าเงื่อนไขที่กำหนด!!");
			location.href='../views/login.html';
		</script>
<?php }?>