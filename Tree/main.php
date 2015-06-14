<?php

include_once 'BST.php';

$tree = new BST();

$tree->insert(30);
$tree->insert(23);
$tree->insert(12);
$tree->insert(57);
$tree->insert(89);
$tree->insert(27);
$tree->insert(4);
$tree->insert(41);
$tree->insert(47);

echo 'The tree traversed with preorder: ';
$tree->traverse('preorder');
echo '<br/> The tree traversed with inorder: ';
$tree->traverse('inorder');
echo '<br/> The tree traversed with postorder: ';
$tree->traverse('postorder');
echo '<br/> The tree traversed with levelorder: ';
$tree->traverse('levelorder');
?>