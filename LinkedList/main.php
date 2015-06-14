<?php
include "List.php";

$bList = new LList(); //initialize a bList
$fList = new LList(); //initialize a fList

echo "This is the numbers 1 to 10 with insert back: <br/>";
for ($i = 1; $i <= 10; $i++) {
    $bList->insertBack($i);
}
print $bList . "<br/>";
echo "This bList size is: " . $bList->getSize() . "<br/>";
$bList->removeFront();
echo "After removing the front, the list is now: ";
print $bList . "<br/>";
echo "This bList size is now: " . $bList->getSize() . "<br/>";
$bList->removeBack();
$bList->removeBack();
echo "After removing the back twice...the list is now: ";
print $bList . "<br/>";
echo "This bList size is now: " . $bList->getSize() . "<br/><br/><br/>";


echo "This is the numbers 1 to 10 with insert front: <br/>";
for ($i = 1; $i <= 10; $i++) {
    $fList->insertFront($i);
}
print $fList . "<br/>";
echo "This fList size is: " . $fList->getSize() . "<br/>";
$fList->removeFront();
echo "After removing the front, the list is now: ";
print $fList . "<br/>";
echo "This fList size is now: " . $fList->getSize() . "<br/>";
$fList->removeBack();
$fList->removeBack();
echo "After removing the back twice...the list is now: ";
print $fList . "<br/>";
echo "This bList size is now: " . $fList->getSize() . "<br/><br/><br/>";

?>
