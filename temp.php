<?php print "Hello World!\n\n";

$filename = './src/data/data.json';
if(!file_exists($filename)){
   $year = 'error';
} else {
   $str = file_get_contents($filename);
   $json = json_decode($str, true); // decode the JSON into an associative array
}

$year = '2017';

$data = array_filter($json['quizes'], function($v, $k) use($year) {
         return $v['year'] == $year;
     }, ARRAY_FILTER_USE_BOTH);

var_dump(array_values($data)[0]['description']);

$arr = array_reverse($json['quizes']);
$len = sizeof($arr);
for ($x=0; $x<sizeof($arr); $x+=3){

    
  print_r(($arr[$x])['year']);
  if ($x+1==$len) {continue;}

  print_r(($arr[$x+1])['year']);
  if ($x+2==$len) {continue;}

  print_r(($arr[$x+2])['year']);
  echo("\n");
}


?>