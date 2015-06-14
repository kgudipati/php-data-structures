<?php
include "Stack.php";
include "Queue.php";

$tStack = new Stack();
$tQueue = new Queue();

$tStack->push('This');
$tStack->push('is');
$tStack->push('a');
$tStack->push('test');
$tStack->push('stack');
$tStack->push('I');
$tStack->push('implemented');

while(!($tStack->isEmpty()))
{
    $val = $tStack->pop();
    echo $val . '<br/>';
}

echo '<br/><br/><br/>';

$tQueue->enqueue('This ');
$tQueue->enqueue('is ');
$tQueue->enqueue('a ');
$tQueue->enqueue('test ');
$tQueue->enqueue('queue ');
$tQueue->enqueue('I ');
$tQueue->enqueue('implemented.');

while(!($tQueue->isEmpty()))
{
    $val = $tQueue->dequeue();
    echo $val;
}
?>