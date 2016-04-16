<?php
require_once('tcx.php');
$tcx = new Wappr\tcx;
$tcx->filename = 'runs/tcx/4-16-16.tcx';
$tcx->readFile();
$tcx->loadTcx();
echo trim($tcx->tcx->Activities->Activity->Id) . "\r\n";
echo 'Start time: ' . $tcx->tcx->Activities->Activity->Lap['StartTime'] . "\r\n";
echo 'Total time: ' . $tcx->getTotalTime() . "\r\n";
echo 'Total minutes: ' . $tcx->getTotalMinutes() . "\r\n";
$tcx->createKml();
$tcx->writeKml('runs/kml/4-16-16.kml');
#var_dump($tcx->kml);
