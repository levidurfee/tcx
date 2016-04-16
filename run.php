<?php
require_once('tcx.php');
$tcx = new Wappr\tcx;
$tcx->filename = 'run.tcx';
$tcx->readFile();
$tcx->loadTcx();
echo trim($tcx->tcx->Activities->Activity->Id) . "\r\n";
echo 'Start time: ' . $tcx->tcx->Activities->Activity->Lap['StartTime'] . "\r\n";
echo 'Total time: ' . $tcx->getTotalTime() . "\r\n";
echo 'Total minutes: ' . $tcx->getTotalMinutes() . "\r\n";
$tcx->createKml();
$tcx->writeKml();
#var_dump($tcx->kml);