<?php
$tanggal=date("Y-m-d");
$banner = '
  __         .__   pisub v.0.1             
_/  |_  ____ |  | ___.__.__ __ 
\   __\/ __ \|  |<   |  |  |  \
 |  | \  ___/|  |_\___  |  |  /
 |__|  \___  >____/ ____|____/ 
           \/     \/         2020   
=================================';
echo $banner;
$jumlah=0;
echo "\nDomain :";
$ndomain = trim(fgets(STDIN));
$cdomain= count(explode('.',$ndomain));
// echo $cdomain;
echo "List subdomain :";
$fileop = trim(fgets(STDIN));
$myfile = fopen("$fileop", "r") or die("Unable to open file!");
$carisubdo = explode('.', $ndomain);
mkdir($tanggal); mkdir("$tanggal/$ndomain"); mkdir("$tanggal/$ndomain/subsub");
while(! feof($myfile)){$jumlah+=1;
  $path ="$tanggal/$ndomain/subdomain.txt"; $path2 ="$tanggal/$ndomain/subsubdomain.txt"; $path3="$tanggal/$ndomain/oot.txt";
  $fh = fopen($path,"a+"); $fh2 = fopen($path2,"a+"); $fh3 = fopen($path3, "a+");
  $namasubdo=trim(fgets($myfile));
  $psubdo=explode('.', $namasubdo);
  if(preg_match("/http/i", $psubdo[0])){
    $subdossl=explode('//',$psubdo[0]);
  }else {$subdossl[1]=$psubdo[0];}
  switch (count($psubdo)) {
    case $cdomain+1:
      $hasil= "$subdossl[1].$ndomain \n";
      echo "[\033[93mSubDom\033[0m]$subdossl[1].$ndomain \n";
      fwrite($fh,$hasil); 
			fclose($fh);
      break;
    case $cdomain+2:
      $lokpath ="$tanggal/$ndomain/subsub/sub.$psubdo[1].txt"; $fh4=fopen($lokpath, "a+");
      $hasil= "$subdossl[1].$psubdo[1].$ndomain \n";
      echo "[\033[92mSSDomn\033[0m]$subdossl[1].$psubdo[1].$ndomain \n";
      fwrite($fh4,$hasil); 
			fclose($fh4);
      break;
    default:
      $hasil= "$namasubdo \n";
      echo "[\033[91mOOT\033[0m]$namasubdo \n";
      fwrite($fh3,$hasil); 
			fclose($fh3);
      break;
  }
}
?>