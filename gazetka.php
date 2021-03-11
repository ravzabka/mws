<?php 
						
						
	
function SaveClickToDB($kod=NULL, $ph=NULL) {
	try {
			$con = new PDO('mysql:host=51.77.61.204;dbname=lfformws', 'vds_mws', 'lubie#Bugi69aTy?', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$zap = $con->query('INSERT INTO `gazetka_klik` SET `kod`=\''.$kod.'\', `ph`=\''.$ph.'\', `ip`=\''.$_SERVER['REMOTE_ADDR'].'\'');
			return true;
	} catch(PDOException $e) {
			return false;
	}
}
	
function ReadCSV($fn=NULL) {
	if($fn==NULL) return false;
	$result = array();
	
	if(($handle = fopen($fn, "r"))!==FALSE) {
		while(($data = fgetcsv($handle, 0, ";"))!==FALSE) {
			$arr = array();
			$arr['kodp'] = trim($data[1]); 
			$arr['kodl'] = trim($data[2]);
			$arr['url'] = trim($data[4]);
			if(strpos($arr['url'],'http://')!==false) $arr['url'] = str_replace('http://','https://',$arr['url']);
			if(strpos($arr['url'],'https://')===false) $arr['url'] = 'https://'.$arr['url'];
			$result[] = $arr;
		}
		fclose($handle);
	}
	return $result;
}

$kod = $_GET['kod']; //czytany z URL
$ph = NULL;
if($pos = strpos($kod,'/')) {
		$ph = substr($kod,($pos+1));
		$kod = substr($kod,0,$pos);
}

$csv = ReadCSV(__DIR__ . '/linki_gazetka.csv');
foreach($csv as $row) {
	if($kod!=NULL && ($kod===$row['kodp'] || $kod===$row['kodl'])) {
		SaveClickToDB($kod,$ph);
		header("Location: ".$row['url']);
		die();
	}
}
//header("Location: https://mws.pl/404-2/");
header("Location: https://mws.pl/wp-content/uploads/2021/01/Oferta_specjalna_MWS_2021-02_2021-05.pdf");
						
				echo '<pre>'.print_r($_GET,true).'</pre>';	
				echo $kod.' ; '.$ph;
						
										
?>