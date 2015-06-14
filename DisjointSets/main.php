<?php

include_once 'DSet.php';

$DSet = new DSet();

$num = 4;
$DSet->addElements($num);

echo 'initializing ' . $num . ' Disjoint Sets:<br/>';
print $DSet;
echo '<br/>';

$DSet->unionBySize(1,0);
echo '<br/>';
print $DSet;
echo '<br/>';

$DSet->unionBySize(2,3);
echo '<br/>';
print $DSet;
echo '<br/>';

$one = $DSet->find(3); //3
$two = $DSet->find(1); //0

$DSet->unionBySize($one, $two);
echo '<br/>';
print $DSet;
echo '<br/>';

?>