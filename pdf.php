<?php
require_once 'include/head.php';
// include autoloader
require_once 'dompdf/autoload.inc.php';

$list_users = userListData();   
if (!empty($list_users)) {
  foreach ($list_users as $key => $user) {


$html = '<html><head><style>body { font-family: DejaVu Sans }</style>'.
        '<body>
       		<div class="col-md-12 text-center" style="text-align: center">
       			<h2>ОТЧЕТ ЗА ИЗПЪЛНЕНИЕ НА ПОСТАВЕНИТЕ ЗАДАЧИ</h2>
       			<h4>на стажанта '.$user['name'].', факултетен номер '.$user['fac_num'].'</h4>
       		</div>';
 	}
}

$list_report = report();   
if (!empty($list_report)) {
  foreach ($list_report as $key => $report) {


$html.= '<style>body { font-family: DejaVu Sans }</style>
       		<div class="col-md-12" style="text-align: left">
       			<h4>Седмица I.</h4>
       			<p>'.$report['first_week'].'</p>
       		</div>
       		<div class="col-md-12" style="text-align: left">
       			<h4>Седмица II.</h4>
       			<p>'.$report['second_week'].'</p>
       		</div>
        ';
 	}
}

$list_mentors = reportMentor();   
if (!empty($list_mentors)) {
  foreach ($list_mentors as $key => $mentor) {


$html.= '<style>body { font-family: DejaVu Sans }</style>
       		<div class="col-md-12 text-center" style="text-align: left; padding-top: 30px">
       			<p>Отговарящ за стажанта в приемащия отдел в '.$mentor['name'].'</p>
       			<div class="col-md-12" style="text-align: center">
       				<p>'.$mentor['firm_mentor'].'</p>
       				<small>/Име и подпис/</small>
       			</div>
       			<p>Отговарящ за стажанта в ТУ - София: </p>
       			<div class="col-md-12" style="text-align: center">
       				<p>'.$mentor['uni_mentor'].'</p>
       				<small>/Име и подпис/</small>
       			</div>
       		</div></body>'.
        '</head></html>';
 	}
}

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->load_html($html, 'UTF-8');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
ob_end_clean();
$dompdf->stream("report",array("Attachment"=>0));
?>
</body>
</html>

