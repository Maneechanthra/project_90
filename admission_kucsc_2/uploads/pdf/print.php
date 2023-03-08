<?php
session_start();



require('../fpdf185/fpdf.php');
require('../config.php');


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->AddFont('sarabun','','THSarabun.php');
$pdf->AddFont('sarabunB','','THSarabun Bold.php');

//$pdf ->Image('../assets/images/KU_Symbol_Eng.png',92,10,30);

$national_id = $_GET['National_id'];
$major_id = $_GET["Major_id"];

$pdf->setFont('sarabunB','','18');

    $sql = "SELECT * FROM `applications` WHERE national_id = $national_id";
    $query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);
$pdf->Image('logo/1.png',90,10,30);
$pdf->SetY(38);
$pdf->Cell(0,9,iconv('utf-8','cp874','ใบรับสมัคร'),0,1,'C');
$pdf->Cell(0,9,iconv('utf-8','cp874','การคัดเลือกเข้าศึกษาต่อในมหาวิทยาลัยเกษตรศาสตร์'),0,1,'C');
$pdf->Cell(0,9,iconv('utf-8','cp874','วิทยาเขตเฉลิมพรเกียรติ จังหวัดสกลนคร'),0,1,'C');
$pdf->Cell(0,9,iconv('utf-8','cp874','ประจำปีการศึกษา 2566 รอบที่ '.$row['TCAS_round']),0,1,'C');
$pdf->Ln();

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874','รหัสบัตรประจำตัวประชาชน : '.$row ['national_id'].'                ชื่อ - นามสกุล : '.$row ['Fname_th'].'  '.$row['Lname_th']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874','วัน เดือน ปีเกิด : '.$row ['Bday'].'            สัญชาติ : '.$row ['Ethnicity'].'       เชื้อชาติ : '.$row['Nationality'].'        ศาสนา : '.$row['Religion']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874','บ้านเลขที่  : '.$row ['Home_no'].'  หมู่ที่ : '.$row ['Village_no'].'  ตำบล : '.$row['Sub_district'].'  อำเภอ : '.$row['District'].'  จังหวัด : '.$row['Province'].' '.$row ['Postal_Code']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874',' โทรศัพท์บ้าน '.$row ['Home_number'].'   โทรศัพท์มือถือ : '.$row ['Telephone_number'].' Email : '.$row['Email']),0,1);

$sql = "SELECT * FROM `education_student` WHERE major_id = $major_id";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);

    $major_id = $row["major_id"];

$sqli = "SELECT * FROM `major` WHERE major_id = $major_id";
$queryi = mysqli_query($mysqli,$sqli);
$rowi = mysqli_fetch_assoc($queryi);
$group_id = $rowi["group_id"];

$sqlp = "SELECT * FROM `group` WHERE group_id = $group_id";
$queryp = mysqli_query($mysqli,$sqlp);
$rowp = mysqli_fetch_assoc($queryp);

$pdf->setFont('sarabunB','','18');
$pdf->Cell(0,10,iconv('utf-8','cp874','ข้อมูลการศึกษา'),0,1);

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874','ผลการเรียนเฉลี่ยสะสม : '.$row['Education_qualification'].' ('.$row['Study_plan'].')  รวมเป็น '.$row['Average_GPA']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874','ชื่อโรงเรียน : '.$row ['School']),0,1);


$pdf->setFont('sarabunB','','18');
$pdf->Cell(0,9,iconv('utf-8','cp874','สมัครเข้าศึกษา  : '.$rowp ['group']),0,1);
$pdf->Cell(0,9,iconv('utf-8','cp874','หลักสูตร   : '.$rowi ['major']),0,1);

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,7,iconv('utf-8','cp874','             ข้าพเจ้าขอรับรองว่ามีคุณสมบัติครบตามประกาศรับสมัครของมหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตเฉลิมพระเกียรติ  '),0,1);
$pdf->Cell(0,7,iconv('utf-8','cp874','จังหวัดสกลนคร ทุกประการ หากตรตรวจสอบในภายหลังพบว่าขาดคุณสมบัติ ข้าพเจ้ายินดีให้มหาวิทยาลัยตัดสิทธิ์ในการเข้าศึกษา'),0,1);
$pdf->Cell(0,7,iconv('utf-8','cp874','โดยไม่มีข้ออุทธรณ์ใดๆ ทั้งสิ้น'),0,1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$sql = "SELECT * FROM `applications` WHERE national_id = $national_id";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874',' ลงชื่อ '.$row ['Fname_th'].'  '.$row['Lname_th'].' ผู้สมัคร '),0,1,'R');
$pdf->Cell(0,8,iconv('utf-8','cp874',' ( '.$row ['Fname_th'].'  '.$row['Lname_th'].' ) '),0,1,'R');

$pdf->Output();


?>