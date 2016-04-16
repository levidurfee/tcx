<?php namespace Wappr;

class Tcx {
	public $filename;
	public $tcx;
	public $tcxData;
	public $kml;
	public $kmlData;
	public $latlong;
	public $alt;
	
	public function __construct() {
		
	}
	
	public function getTotalTime() {
		return trim($this->tcx->Activities->Activity->Lap->TotalTimeSeconds);
	}
	
	public function getTotalMinutes() {
		$minutes = trim($this->tcx->Activities->Activity->Lap->TotalTimeSeconds) / 60;
		return $minutes;
	}
	
	public function createKml() {
		$temp = '';
		$temp .= file_get_contents('kml.head');
		$numPoints = count($this->tcx->Activities->Activity->Lap->Track->Trackpoint);
		$points = $this->tcx->Activities->Activity->Lap->Track->Trackpoint;
		for($i=0;$i<$numPoints;$i++) {
			$this->latlong[$i]['lat'] = round(trim($points->$i->Position->LatitudeDegrees), 6);
			$this->latlong[$i]['long'] = round(trim($points->$i->Position->LongitudeDegrees), 6);
			$this->alt[$i] = trim($points->$i->AltitudeMeters);
			$temp .= $this->latlong[$i]['long'] . ',' . $this->latlong[$i]['lat'] .
				',' . $this->alt[$i] . " ";
		}
		$temp .= file_get_contents('kml.foot');
		$this->kml = new \SimpleXMLElement($temp);
	}
	
	public function writeKml($filename = 'default.kml') {
		$this->kml->asXML($filename);
	}
	
	public function loadTcx() {
		$this->tcx = new \SimpleXMLElement($this->tcxData);
	}
	
	public function readFile() {
		$this->tcxData = file_get_contents($this->filename);
	}
}