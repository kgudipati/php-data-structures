<?php

    include_once "Graph.php";
    
    $adjlist = new Graph();
    
    $adjlist->insertVertex('A');
    $adjlist->insertVertex('B');
    $adjlist->insertVertex('C');
    $adjlist->insertVertex('D');
    $adjlist->insertVertex('E');
    $adjlist->insertVertex('F');
    
    $adjlist->insertEdge('A', 'C');
    $adjlist->insertEdge('A', 'B');
    $adjlist->insertEdge('A', 'D');
    $adjlist->insertEdge('B', 'C');
    $adjlist->insertEdge('B', 'E');
    $adjlist->insertEdge('C', 'E');
    $adjlist->insertEdge('C', 'F');
    $adjlist->insertEdge('C', 'D');
    $adjlist->insertEdge('D', 'F');
    
    //$adjlist->removeVertex('G');
    //$adjlist->removeEdge('A', 'C');
    
    /*$bool = $adjlist->areAdjacent('A', 'F');
    echo $bool ? 'True<br/>' : 'False<br/>';*/
    
    /*$edgeList = $adjlist->incidentEdges('C');
    print_r($edgeList);
    echo '<br/>';*/
    
    $adjlist->toPrint($adjlist);
    
    echo '<br/><br/><br/><br/> Graph Traversal with DFS:<br/><br/>';

    $adjlist->DFS();
    
    echo '<br/><br/><br/><br/> Graph Traversal with BFS:<br/><br/>';

    $adjlist->BFS();

?>