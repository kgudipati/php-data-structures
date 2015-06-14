<?php

include_once "Graph.php";

/**
 * Graph Algoritms for traversals functions
 */

class GraphTraversal{
    
    protected $graph;
    protected $vertLabel = array();
    protected $edgeLabel = array();
    
    
    public function __construct($graph) {
        $this->graph = $graph;
    }
    
    /**
     * Helper function to set and get label vertex as visited or unvisited
     */
    private function setVertexLabel($v, $label){
        $this->vertLabel[$v] = $label;
    }
    private function getVertexLabel($v){
        return $this->vertLabel[$v];
    }

    /**
     * Helper function to set and get label edge as explored or unexplored
     */
    private function setEdgeLabel($v, $w, $label){
        $this->edgeLabel[$v.'-'.$w] = $label;
        $this->edgeLabel[$w.'-'.$v] = $label;
    }
    /**
     * Helper function to label vertex as visited or unvisited
     */
    private function getEdgeLabel($v, $w){
        return $this->edgeLabel[$v][$w];
    }

    /**
     * Function for a depth first search traversal
     */
    public function DFS(){
        print_r($this->graph);
        
        foreach ($graph as $vertex=>$adj) {
            echo 'test';
        }
        
        //initialize all the vertices and edges as unvisited and unexplored
        foreach ($this->graph as $vertex => $adj) {
            echo 'test';
          $this->setVertexLabel($vertex, 'UNVISITED');
          
            foreach ($adj as $key => $adjvert) {
                $this->setEdgeLabel($vertex, $key, 'UNEXPLORED');
            }
                
        }
        
        /*print_r($this->vertLabel);
        echo '<br/>';
        
        print_r($this->edgeLabel);
        
        /*foreach ($this->graph as $vertex => $adj) {
            if($this->getVertexLabel($vertex) === 'UNVISITED')
            {
                $this->DFSearch($vertex);
            }
        }*/
    }
    
    /**
     * Helper function for a depth first search traversal
     */
    public function DFSearch($v){
        $this->setVertexLabel($v, 'VISITED');
            
        foreach($v as $adj) {
            //echo $adj;
            /*if($this->getVertexLabel($adj) === 'UNVISITED')
            {
                $this->setEdgeLabel($v, $adj, 'EXPLORED');
                $this->DFSearch($adj); //recursively go to next vertex
            }
            else if($this->getEdgeLabel($v, $adj) === 'UNEXPLORED')
            {
                $this->setEdgeLabel($v, $adj, 'BACK');
            }*/
        }
    }
}
?>