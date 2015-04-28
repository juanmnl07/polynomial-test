<?php // content="text/plain; charset=utf-8"
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_scatter.php');
require_once ('src/jpgraph_line.php');
require_once ('src/jpgraph_utils.inc.php');
 
// Create some "fake" regression data
$datay = array(90.5,30,25,15,6);
$datax = array(300,150,280,230,180);

$theme_class = new UniversalTheme;
$graph = new Graph(460, 585);

$graph->SetScale('linlin');
$graph->title->Set("Polynomial TrendLine");
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);

$reg = new PolynomialRegression(4);

foreach ($datax as $k => $v){
    $reg->addData($datax[$k], $datay[$k]);
}

//$this->session->set_userdata('graphEquation', $reg->GetEquation());
$reg1 = $reg;
list($xd1, $yd1) = $reg1->GetY(0, max($datax));

$graph1 = new Graph(460, 545);
$graph1->SetScale('linlin');
if(count($yd1) > 0) {
    if ($reg->getCoefficients()[1]) {
        $lplot1 = new LinePlot($yd1);
        $graph1->Add($lplot1);
    }
}

$graph1->Stroke('__handle');
list($xd, $yd) = $reg->GetY($graph1->xscale->scale[0], $graph1->xscale->scale[1]);

$sp1 = new ScatterPlot($datay, $datax);
$sp1->mark->SetType(MARK_FILLEDCIRCLE);
$sp1->mark->SetFillColor("#0000EE");
$sp1->SetLegend('Male Job ');
$graph->Add($sp1);
 
$lplot = new LinePlot($yd);
$lplot->SetWeight(2);
$lplot->SetColor('#CD0000');
$lplot->SetLegend('Regression Line');
$graph->Add($lplot);

// ... and stroke
$graph->Stroke();
 
?>