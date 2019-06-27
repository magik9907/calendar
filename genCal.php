<?php

function errorPage($e){
  header("location:error.php?error=".$e);
  return false;
}

function dataBaseLogIn(){
  $user = "root";
  $password = "";
  $db = "app";
  $host = "localhost";

  $conn = new mysqli($host,$user,$password,$db);

  if(!$conn){
    errorPage(mysqli_connect_error());
  }

  return $conn;
}

function query($day,$selectedYear, $selectedMonth,$id){
	$conn = dataBaseLogIn();

  $day = ($day<10)?"0".$day:$day;
  $docFra = "";
	$sql = "Select `id` ,`title` from de_event where `id_user`='$id' and `date`='".$selectedYear."-".$selectedMonth."-".$day."' and `isDeleted`= '0'";
	$result =$conn->query($sql);
	if ($result) {
			while($row = $result->fetch_assoc()) {
					$docFra =$docFra.'<p class="event" data-id="'. $row["id"] .'">'.$row["title"].'</p>';
      }
	}
	mysqli_close($conn);
	return $docFra;
}



$id = $_GET["id"];

$selectedYear = $_GET['year'];
$selectedMonth = $_GET["month"];
$timeFirstDayOfMonth = strtotime("01-".$selectedMonth."-".$selectedYear);
$monthDate = date("m",$timeFirstDayOfMonth);
$yearDate = date("y",$timeFirstDayOfMonth);
$dayName = date("N",$timeFirstDayOfMonth);

$table = "<table border=\"1\" class=\"calendar-table\">";

$daysName = [
	"Sunday"=>7,
	"Monday"=>1,
	"Tuesday"=>2,
	"Wednesday"=>3,
	"Thursday"=>4,
	"Friday"=>5,
	"Saturday"=>6,
];

$daysNumber = [
	1=>"Monday",
	2=>"Tuesday",
	3=>"Wednesday",
	4=>"Thursday",
	5=>"Friday",
	6=>"Saturday",
	7=>"Sunday",
];


$daysInMonth = [
	"01"=> 31,
	"02"=> 28,
	"03"=> 31,
	"04"=> 30,
	"05"=> 31,
	"06"=> 30,
	"07"=> 31,
	"08"=> 31,
	"09"=> 30,
	"10"=> 31,
	"11"=> 30,
	"12"=> 31,
];

if ((($selectedYear % 4) == 0) && ((($selectedYear % 100) != 0) || (($selectedYear % 400) == 0))) {
	$daysInMonth["02"] = 29;
}

if ($_GET["type"]=="calendar") {

  $counter = 0;
  $endCounter = $daysInMonth[$monthDate];
  $endweek=$dayName;

  if($dayName != "1"){
      $table = $table."<td colspan=\"". ($dayName - 1) ."\"></td>";
  }

  do{
    if($endweek==8){
      $endweek=1;
      $table=$table."</tr><tr>";
    }
		$result = query(($counter+1), $selectedYear, $selectedMonth,$id);

    $table = $table."<td><p class=\"cell-bcg\">".($counter+1)."</p>".$result."</td>";
    $endweek++;
  	$counter++;
  }while($counter<$endCounter);
    $endweek--;
  if(7 != $endweek){
    $endweek = 7-$endweek;
    $table = $table."<td colspan=\"". $endweek ."\"></td>";
  }
  $table = $table."</tr>";
}else if ($_GET["type"]=="list") {
  $conn = dataBaseLogIn();

  $docFra = "";
	$sql = "Select `id` ,`title` from de_event where `id_user`='$id' and `isDeleted`= '0' and `date` BETWEEN \"".$selectedYear."-".$selectedMonth."-01\" AND \"".$selectedYear."-".$selectedMonth."-".$daysInMonth[$monthDate]."\" group by `date` asc";
	$result =$conn->query($sql);
	if ($result) {
			while($row = $result->fetch_assoc()) {
					$table =$table.'<tr ><td class="event list" data-id="'. $row["id"] .'">'.$row["title"].'</td></tr>';
      }
	}
	mysqli_close($conn);
}

$table = $table."</table>";
echo $table;
?>
