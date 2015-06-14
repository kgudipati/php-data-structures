<?php

include_once 'AVL.php';

$tree = new AVL();

$tree->insertAVL(30);
$tree->insertAVL(23);
$tree->insertAVL(12);
$tree->insertAVL(57);
$tree->insertAVL(89);
$tree->insertAVL(27);
$tree->insertAVL(4);
$tree->insertAVL(41);
$tree->insertAVL(47);

echo 'The tree traversed with preorder: ';
$tree->traverse('preorder');
echo '<br/> The tree traversed with inorder: ';
$tree->traverse('inorder');
echo '<br/> The tree traversed with postorder: ';
$tree->traverse('postorder');
echo '<br/> The tree traversed with levelorder: ';
$tree->traverse('levelorder');
?>