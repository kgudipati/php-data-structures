<?php

    include_once "Heap.php";
    
    $minheap = new MinHeap();
    
    $minheap->insert(27);
    $minheap->insert(33);
    $minheap->insert(1);
    $minheap->insert(11);
    $minheap->insert(53);
    $minheap->insert(99);
    $minheap->insert(8);
    $minheap->insert(76);
    $minheap->insert(12);
    $minheap->insert(44);
    
    print $minheap;
    echo '<br/><br/>';
    
    //remove the minimum element or the root
    $min = $minheap->removeMin();
    
    echo 'The minimum element is: ' . $min . ' with size: ' . $minheap->getSize() . '<br/>';
    print $minheap;
    
    echo '<br/>';
    
    //remove the minimum element or the root
    $mini = $minheap->removeMin();
    
    echo 'The minimum element is: ' . $mini . ' with size: ' . $minheap->getSize() . '<br/>';
    print $minheap;
?>