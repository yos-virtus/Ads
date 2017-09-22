<?php 

require __DIR__ . '/vendor/autoload.php';

$id = $_GET['id'];
$retriveSource = $_GET['from'];
 
$logger = new Ads\FileLogger();
$adsService = new Ads\AdsService($retriveSource, $logger);
// $adsService->turnOffLogging();
$ad = $adsService->retrieveAd($id);

?>

<h1><?php echo  $ad->name ?></h1>
<p><?php echo $ad->text ?></p>
<p>стоимость: <?php echo $ad->convertPriceTo('RU') ?></p>