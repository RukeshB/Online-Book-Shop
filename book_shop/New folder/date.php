<?php 
$d=date("Y/m/d");
$pd= date('Y/m/d',strtotime("-5 days"));
/*$pd=explode("/",$d);
$pd[2]=$pd[2]-1;
$pd= implode("/",$pd);*/
echo $d. "<br>";
echo $pd; ?>