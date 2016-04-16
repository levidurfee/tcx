# tcx to kml converter

## why i wrote this

> I was using an app to keep track of my walks/runs/rides. The app would also
> create a map that you could share with friends. The map was heavily branded and
> I didn't want that. I noticed I could download a TCX file, then I wrote this
> to convert the TCX into a KML file that Google maps could read. Now I can easily
> share my maps with friends.

## Basic usage

### sample code

```php
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
```

### running the script

```bash
php run.php
```

## changes

0.1.0 - [Initial Commit] [It works]
