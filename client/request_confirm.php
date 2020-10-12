<html>
<head>
<title>::Leave Request Confirmation::</title>
<?php
session_start();
include 'connect.php';
include 'leave_mailer.php';
include 'clientnavi.php';

$user = $_SESSION['user'];
echo "<link rel='stylesheet' type='text/css' href='style.css'>";
echo "<div class = 'textview'>";
echo "<center>";
if(isset($user))
	{
	$leavetype = $_POST['leavetype'];
	$leavedays = $_POST['leavedays'];
	$leavedate = $_POST['leaveyear']."-".$_POST['leavemonth']."-".$_POST['leavedate'];
	$date = date_create($leavedate);
	$duration = $leavedays." days";
	$interval = date_interval_create_from_date_string($duration);
	$enddate = date_add($date,$interval);
	$end = date_format($enddate,"Y-m-d");
	$empname = $_POST['empname'];
	$emptype = $_POST['emptype'];
	$designation = $_POST['designation'];
	$emptype = $_POST['emptype'];
	$empfee = $_POST['empfee'];
	$value1 = $_POST['value1'];
	$value2 = $_POST['value2'];
	$value3 = $_POST['value3'];
	$value4 = $_POST['value4'];
	$value5 = $_POST['value5'];
	$value6 = $_POST['value6'];
	$value7 = $_POST['value7'];
	$value8 = $_POST['value8'];
	$value9 = $_POST['value9'];
	$value10 = $_POST['value10'];
	$value11 = $_POST['value11'];
	$value12 = $_POST['value12'];
	$value13 = $_POST['value13'];
	$value14 = $_POST['value14'];
	$value15 = $_POST['value15'];
	$value16 = $_POST['value16'];
	$value17 = $_POST['value17'];
	$value18 = $_POST['value18'];
	$value19 = $_POST['value19'];
	$value20 = $_POST['value20'];
	$value21 = $_POST['value21'];
	$leavereason = $_POST['leavereason'];
	$dept = $_POST['dept'];
		if(!empty($leavedays))

			{
				if(strtotime($leavedate) > time())
				{
				$sql = "SELECT * FROM employees WHERE UserName='".$user."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row["UserName"] == $user)
							{
								if($leavetype === "Sick Leave")
								{
									if(($leavedays <= $row["SickLeave"]) || $leavedays < 0)
										{
										$empname = $row["EmpName"];
										$to = $row["EmpEmail"];
										$sql2 = "INSERT INTO emp_leaves(EmpName,LeaveType,LeaveDays,StartDate,EndDate,Dept) VALUES('".$empname."','".$leavetype."','".$leavedays."','".$leavedate."','".$end."','".$row['Dept']."')";
											if (mysqli_query($conn, $sql2))
											{
											$msg = "The Leave Request generated by you is as follows : \nEmployee Name : ".$empname."\nLeave Days Requested : ".$leavedays."\nType of leave : ".$leavetype."\nStarting Date of Leave : ".$leavedate."\n\n\nThank You,\nwebadmin,Leave Management System.";
											
											$status = mailer($to,$msg,$empname);
												if($status == true)
													echo "Request Has Been Sucessfully Submitted.<br/>Please Check Your email for your leave request<br/>";
											}
											else
											{
											echo "Error: " . $sql . "<br>" . mysqli_error($conn);
											}
										}
									else
									{
									header('location:request_leave.php?err='.urlencode("You cannot ask for sick leaves more than that of your account !"));
									}
								}
								if($leavetype === "Earn Leave")
								{
									if(($leavedays <= $row["EarnLeave"]) || $leavedays < 0)
										{
										$empname = $row["EmpName"];
										$to = $row["EmpEmail"];
										$sql2 = "INSERT INTO emp_leaves(EmpName,LeaveType,LeaveDays,StartDate,EndDate,Dept) VALUES('".$empname."','".$leavetype."','".$leavedays."','".$leavedate."','".$end."','".$row['Dept']."')";;
											if (mysqli_query($conn, $sql2))
											{
											$msg = "The Leave Request generated by you is as follows : \nEmployee Name : ".$empname."\nLeave Days Requested : ".$leavedays."\nType of leave : ".$leavetype."\nStarting Date of Leave : ".$leavedate."\n\n\nThank You,\nwebadmin,Leave Management System.";
											
											$status = mailer($to,$msg,$empname);
												if($status == true)
													echo "Request Has Been Sucessfully Submitted.<br/>Please Check Your email for your leave request<br/>";
											}
											else
											{
											echo "Error: " . $sql . "<br>" . mysqli_error($conn);
											}
										}
									else
									{
									header('location:request_leave.php?err='.urlencode("You cannot ask for earn leaves more than that of your account !"));
									}
								}
								if($leavetype === "Casual Leave")
								{
									if(($leavedays <= $row["CasualLeave"]) || $leavedays < 0)
										{
										$empname = $row["EmpName"];
										$to = $row["EmpEmail"];
										$sql2 = "INSERT INTO emp_leaves(EmpName,LeaveType,LeaveDays,StartDate,EndDate,Dept) VALUES('".$empname."','".$leavetype."','".$leavedays."','".$leavedate."','".$end."','".$row['Dept']."')";
											if (mysqli_query($conn, $sql2))
											{
											$msg = "The Leave Request generated by you is as follows : \nEmployee Name : ".$empname."\nLeave Days Requested : ".$leavedays."\nType of leave : ".$leavetype."\nStarting Date of Leave : ".$leavedate."\n\n\nThank You,\nwebadmin,Leave Management System.";
								
											$status = mailer($to,$msg,$empname);
												if($status == true)
													echo "Request Has Been Sucessfully Submitted.<br/>Please Check Your email for your leave request<br/>";
											}
											else
											{
											echo "Error: " . $sql . "<br>" . mysqli_error($conn);
											}
										}
									else
									{
									header('location:request_leave.php?err='.urlencode("You cannot ask for casual leaves more than that of your account !"));
									}
								}
								if($leavetype === "Maternity Leave")
								{
									if(($leavedays <= $row["MaternityLeave"]) || $leavedays < 0)
										{
										$empname = $row["EmpName"];
										$to = $row["EmpEmail"];
										$sql2 = "INSERT INTO emp_leaves(EmpName,LeaveType,LeaveDays,StartDate,EndDate,Dept) VALUES('".$empname."','".$leavetype."','".$leavedays."','".$leavedate."','".$end."','".$row['Dept']."')";
											if (mysqli_query($conn, $sql2))
											{
											$msg = "The Leave Request generated by you is as follows : \nEmployee Name : ".$empname."\nLeave Days Requested : ".$leavedays."\nType of leave : ".$leavetype."\nStarting Date of Leave : ".$leavedate."\n\n\nThank You,\nwebadmin,Leave Management System.";
								
											$status = mailer($to,$msg,$empname);
												if($status == true)
													echo "Request Has Been Sucessfully Submitted.<br/>Please Check Your email for your leave request<br/>";
											}
											else
											{
											echo "Error: " . $sql . "<br>" . mysqli_error($conn);
											}
										}
									else
									{
									header('location:request_leave.php?err='.urlencode("You cannot ask for casual leaves more than that of your account !"));
									}
								}
								if($leavetype === "Paternity Leave")
								{
									if(($leavedays <= $row["PaternityLeave"]) || $leavedays < 0)
										{
										$empname = $row["EmpName"];
										$to = $row["EmpEmail"];
										$sql2 = "INSERT INTO emp_leaves(EmpName,LeaveType,LeaveDays,StartDate,EndDate,Dept) VALUES('".$empname."','".$leavetype."','".$leavedays."','".$leavedate."','".$end."','".$row['Dept']."')";
											if (mysqli_query($conn, $sql2))
											{
											$msg = "The Leave Request generated by you is as follows : \nEmployee Name : ".$empname."\nLeave Days Requested : ".$leavedays."\nType of leave : ".$leavetype."\nStarting Date of Leave : ".$leavedate."\n\n\nThank You,\nwebadmin,Leave Management System.";
								
											$status = mailer($to,$msg,$empname);
												if($status == true)
													echo "Request Has Been Sucessfully Submitted.<br/>Please Check Your email for your leave request<br/>";
											}
											else
											{
											echo "Error: " . $sql . "<br>" . mysqli_error($conn);
											}
										}
									else
									{
									header('location:request_leave.php?err='.urlencode("You cannot ask for casual leaves more than that of your account !"));
									}
								}
								if($leavetype === "Annual Leave")
								{
									if(($leavedays <= $row["AnnualLeave"]) || $leavedays < 0)
										{
										$empname = $row["EmpName"];
										$to = $row["EmpEmail"];
										$sql2 = "INSERT INTO emp_leaves(EmpName,LeaveType,LeaveDays,StartDate,EndDate,Dept) VALUES('".$empname."','".$leavetype."','".$leavedays."','".$leavedate."','".$end."','".$row['Dept']."')";
											if (mysqli_query($conn, $sql2))
											{
											$msg = "The Leave Request generated by you is as follows : \nEmployee Name : ".$empname."\nLeave Days Requested : ".$leavedays."\nType of leave : ".$leavetype."\nStarting Date of Leave : ".$leavedate."\n\n\nThank You,\nwebadmin,Leave Management System.";
								
											$status = mailer($to,$msg,$empname);
												if($status == true)
													echo "Request Has Been Sucessfully Submitted.<br/>Please Check Your email for your leave request<br/>";
											}
											else
											{
											echo "Error: " . $sql . "<br>" . mysqli_error($conn);
											}
										}
									else
									{
									header('location:request_leave.php?err='.urlencode("You cannot ask for casual leaves more than that of your account !"));
									}
								}
								
							}
						}
					}
error_reporting(0);
require_once ('dompdf_config.inc.php');
$pdf_content='
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			</head>
		
			<style type="text/css">							
				#pdf_header, #pdf_container{ border: 1px solid #CCCCCC; padding:10px; }				
				#pdf_header{ margin:10px auto 0px; border-bottom:none; }				
				table{ width:580px; }				
				#pdf_container{margin:0px auto; }
				.rpt_title{ background:#99CCFF; }															
			</style>
							
			<body>
			<div id="pdf_header" >
			<table border="0" cellspacing="1" cellpadding="2">
			<tr id="hdRow">
				<td width="20%"><img src="ddu_nadiad.jpg" height = 50 width = 50></td>				
				<td width="30%" align="center">DHARMSINH DESAI UNIVERSITY (State University)<br/>College Road, Nadiad-387001</td>
				</tr>
			</table>
			</div>
			<div id="pdf_container" >
			<table border="0" cellspacing="1" cellpadding="2">
			<tr bgcolor="#006" style="color:#FFF"><td colspan="3" align="left">Leave Request Copy Of : '.$empname.'</td></tr>
	 		</table>
			<table>
			<tr><th>Employee Name : </th><td>'.$empname.'</td></tr>
			<tr><th>Employee Designation : </th><td>'.$designation.'</td></tr>
			<tr><th>Employment Type : </th><td>'.$emptype.'</td></tr>
			<tr><th>Employee Department : </th><td>'.$dept.'</td></tr>
			<tr><th>Employee Fee Structure : </th><td>'.$empfee.'</td></tr>
			<tr><th>Starting Date Of Leave (yyyy-mm-dd): </th><td>'.$leavedate.'</td></tr>
			<tr><th>No. Of Leave Days : </th><td>'.$leavedays.'</td></tr>
			<tr><th>Reason For Leave : </th><td>'.$leavereason.'</td></tr>
			<tr><th>Type Of Leave : </th><td>'.$leavetype.'</td></tr>
				<table>
					<tr><th>Date </th>
					<th>Time</th>		
					<th>Semester</th>
					<th>Division/Batch</th>
					<th>Room No.</th>
					<th>Subject</th>
					<th>Staff  Member Who Will Engage Class</th></tr>
					<tr>
					<td>'.$value1.'</td>
					<td>'.$value2.'</td>
					<td>'.$value3.'</td>
					<td>'.$value4.'</td>
					<td>'.$value5.'</td>
					<td>'.$value6.'</td>
					<td>'.$value7.'</td>
					</tr>
					<tr>
					<td>'.$value8.'</td>
					<td>'.$value9.'</td>
					<td>'.$value10.'</td>
					<td>'.$value11.'</td>
					<td>'.$value12.'</td>
					<td>'.$value13.'</td>
					<td>'.$value14.'</td>
					</tr>
					<tr>
					<td>'.$value15.'</td>
					<td>'.$value16.'</td>
					<td>'.$value17.'</td>
					<td>'.$value18.'</td>
					<td>'.$value19.'</td>
					<td>'.$value20.'</td>
					<td>'.$value21.'</td>
					</tr>
				</table>
			</table></div></body></html>'
			;
			$name = $user.$leavedate.$leavetype.$end.'.pdf';
			$reportPDF = createPDF($pdf_content, $name);
				}
				else
					{
					header('location:request_leave.php?err='.urlencode('Start Date is invalid !'));
					}
			}
		
		else
			{
			header('location:request_leave.php?err='.urlencode('Pl. Enter some details !'));
			}
	}
	else
	{
	header('location:index.php?err='.urlencode('Please Login first to access this page'));
	}
echo "</center>";
echo "</div>";
$conn->close();
function createPDF($pdf_content, $filename){
	
	$path='leaves/';
	$dompdf=new DOMPDF();
	$dompdf->load_html($pdf_content);
	$dompdf->render();
	$output = $dompdf->output();
	file_put_contents($path.$filename, $output);
	return $filename;		
	}
?>

<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>
</head>
</html>