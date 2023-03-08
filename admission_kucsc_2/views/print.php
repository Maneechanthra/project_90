<?php


require('../fpdf185/fpdf.php');
require('../config.php');


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->AddFont('sarabun','','THSarabun.php');
$pdf->AddFont('sarabunB','','THSarabun Bold.php');

$pdf ->Image('../assets/images/KU_Logo.png',92,10,30);
$pdf -> SetY(53);
$pdf->SetTitle('Register KU.CSC');


$App_id = $_GET['App_id'];
//echo $App_id;

//echo $Major_id;

$pdf->setFont('sarabunB','','18');

$pdf->Ln();
$pdf->Cell(0,8,iconv('utf-8','cp874','ใบรับสมัคร'),0,1,'C');
$pdf->Cell(0,8,iconv('utf-8','cp874','การคัดเลือกเข้าศึกษาต่อในมหาวิทยาลัยเกษตรศาสตร์'),0,1,'C');
$pdf->Cell(0,8,iconv('utf-8','cp874','วิทยาเขตเฉลิมพรเกียรติ จังหวัดสกลนคร'),0,1,'C');

    $sql1 = "SELECT * FROM `applications` WHERE App_id = '$App_id';";
    $query1 = mysqli_query($mysqli,$sql1);
    $row_p = mysqli_fetch_assoc($query1);

    if(isset($row_p)){
        $data_id = $row_p['App_id'];
        $sql_data2 = "SELECT * FROM `applications` WHERE App_id = $data_id;";
        $query_data = mysqli_query($mysqli,$sql_data2);
        $row_data2 = mysqli_fetch_assoc($query_data);
    } else {
        $row_data2 = null;
    }

    //-------------------------------------------------------------------------------------------

if(isset($row_p)){


    $pdf->Cell(0,9,iconv('utf-8','cp874','ประจำปีการศึกษา 2566 รอบที่ '.$row_data2['Tcas_round']),0,1,'C');
    $pdf->Ln();
    
    $pdf->setFont('sarabun','','16');
    $pdf->Cell(0,8,iconv('utf-8','cp874','รหัสบัตรประจำตัวประชาชน : '.$row_data2 ['National_id'].'                ชื่อ - นามสกุล : '.$row_data2 ['Firstname_th'].'  '.$row_data2['Lastname_th']),0,1);
    $pdf->Cell(0,8,iconv('utf-8','cp874','วัน เดือน ปีเกิด : '.$row_data2 ['Birth_date'].'            สัญชาติ : '.$row_data2 ['Ethnicity'].'       เชื้อชาติ : '.$row_data2['Nationality'].'        ศาสนา : '.$row_data2['Religion']),0,1);

} else {
    $pdf->Cell(0,8,iconv('utf-8','cp874','ที่อยู่ : ไม่มีข้อมูล'),0,1);
}


    //-------------------------------------------------------------------------------------------------

    $sql_add = "SELECT * FROM `address` WHERE App_id = '$App_id'";
    $result = mysqli_query($mysqli, $sql_add);
    $row_add = mysqli_fetch_assoc($result); 

    if(isset($row_add)){
      $province_rowp = $row_add['Province_id'];
      $sql_pro = "SELECT * FROM `provinces` WHERE id = '$province_rowp';";
      $query_pro2 = mysqli_query($mysqli,$sql_pro);
      $row_pro2 = mysqli_fetch_assoc($query_pro2);
  } else {
      $row_pro2 = null;
  }

  if(isset($row_add)){
    $amphures_row = $row_add['District_id'];
    $sql_am = "SELECT * FROM `amphures` WHERE id = $amphures_row;";
    $query_am = mysqli_query($mysqli,$sql_am);
    $row_am = mysqli_fetch_assoc($query_am);

} else {
    $row_am = null;
}


if(isset($row_add)){
    $dis_rowp = $row_add['Sub_District_id'];
    $sql_dis = "SELECT * FROM `districts` WHERE id = '$dis_rowp';";
    $query_dis = mysqli_query($mysqli,$sql_dis);
    $row_dis2 = mysqli_fetch_assoc($query_dis);
  
  } else {
    $row_dis2 = null;
  }

  //-------------------------------------------------------------------------------------------------



//----------------------------------------------------------------------------------------------------

if(isset($row_add)){
    $pdf->Cell(0,8,iconv('utf-8','cp874','บ้านเลขที่ : '.$row_add ['Home_no'].' หมูที่ : '.$row_add ['Village_no'].' ตำบล : '.$row_dis2['name_th'].' อำเภอ : '.$row_am['name_th'].' จังหวัด : '.$row_pro2['name_th'].' '.$row_dis2['Postal_Code']),0,1);
    } else {
    $pdf->Cell(0,8,iconv('utf-8','cp874','ที่อยู่ : ไม่มีข้อมูล'),0,1);
    }


 //------------------------------------------------------------------------------



if(isset($row_p)){
    $pdf->Cell(0,8,iconv('utf-8','cp874',' โทรศัพท์บ้าน '.$row_p ['Home_number'].'   โทรศัพท์มือถือ : '.$row_p ['Telephone_number'].' Email : '.$row_p['Email']),0,1);

} else {

    $pdf->Cell(0,8,iconv('utf-8','cp874','ที่อยู่ : ไม่มีข้อมูล'),0,1);
}

//------------------------------------------------------------------------------------


$pdf->setFont('sarabunB','','18');
$pdf->Cell(0,10,iconv('utf-8','cp874','ข้อมูลการศึกษา'),0,1);


$sql_e = "SELECT * FROM education_information WHERE App_id = '$App_id' ";
$query_e = mysqli_query($mysqli,$sql_e);
$row_e = mysqli_fetch_assoc($query_e);

if(isset($row_e)){
    $data_id = $row_e['App_id'];
    //echo $data_id;
    $sql_e1 = "SELECT * FROM `education_information` WHERE App_id = $data_id;";
    $query_e1 = mysqli_query($mysqli,$sql_e1);
    $row_e1 = mysqli_fetch_assoc($query_e1);
} else {
    $row_e1 = null;
}


if(isset($row_e)){
$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874','ผลการเรียนเฉลี่ยสะสม : '.$row_e1 ['Edu_qualification'].' ('.$row_e1 ['Stady_plan'].')  รวมเป็น '.$row_e1 ['Gpax']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874','ชื่อโรงเรียน : '.$row_e1 ['School_name']),0,1);    
} else {
    $pdf->Cell(0,8,iconv('utf-8','cp874','ที่อยู่ : ไม่มีข้อมูล'),0,1);
} 

$Major_id = $_GET['Major_id'];
//echo $Major_id;

$sql_e2 = "SELECT * FROM `major` WHERE Major_id = '$Major_id' ";
$query_e2 = mysqli_query($mysqli,$sql_e2);
$row_e2 = mysqli_fetch_assoc($query_e2);

if(isset($row_e2)){
    $Major_id2 = $row_e2['Major_id'];
    $sql_m = "SELECT * FROM `major` WHERE Major_id = '$Major_id2'";
    $query_m = mysqli_query($mysqli,$sql_m);
    $row_m = mysqli_fetch_assoc($query_m);

} else {
    $row_m = null;
  }

  
if(isset($row_m)){
    $Facuty_id = $row_m['Facuty_id'];
    $sqlf = "SELECT * FROM `facuty` WHERE Facuty_id = $Facuty_id";
    $queryf = mysqli_query($mysqli,$sqlf);
    $rowf = mysqli_fetch_assoc($queryf);
} else {
    $rowf = null;
  }

if(isset($row_m)){
$pdf->setFont('sarabunB','','18');
$pdf->Cell(0,9,iconv('utf-8','cp874','สมัครเข้าศึกษา  '.$rowf ['Facuty_name']),0,1);

} else {
    $pdf->Cell(0,8,iconv('utf-8','cp874','ที่อยู่ : ไม่มีข้อมูล'),0,1);
} 

if(isset($row_e2)){
$pdf->Cell(0,9,iconv('utf-8','cp874','หลักสูตร  '.$row_m ['Major_name']),0,1);
} else {
    $pdf->Cell(0,8,iconv('utf-8','cp874','ที่อยู่ : ไม่มีข้อมูล'),0,1);
} 


$pdf->setFont('sarabun','','16');
$pdf->Cell(0,7,iconv('utf-8','cp874','             ข้าพเจ้าขอรับรองว่ามีคุณสมบัติครบตามประกาศรับสมัครของมหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตเฉลิมพระเกียรติ  '),0,1);
$pdf->Cell(0,7,iconv('utf-8','cp874','จังหวัดสกลนคร ทุกประการ หากตรตรวจสอบในภายหลังพบว่าขาดคุณสมบัติ ข้าพเจ้ายินดีให้มหาวิทยาลัยตัดสิทธิ์ในการเข้าศึกษา'),0,1);
$pdf->Cell(0,7,iconv('utf-8','cp874','โดยไม่มีข้ออุทธรณ์ใดๆ ทั้งสิ้น'),0,1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$sql = "SELECT * FROM applications WHERE App_id = '$App_id'";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874',' ลงชื่อ '.$row ['Firstname_th'].'  '.$row['Lastname_th'].' ผู้สมัคร '),0,1,'R');
$pdf->Cell(0,8,iconv('utf-8','cp874',' ( '.$row ['Firstname_th'].'  '.$row['Lastname_th'].' )        '),0,1,'R');

$pdf->Output();

?>