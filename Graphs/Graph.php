<?php

/**
 * Implementing a graph as an adjacency list
 * Graph ADT
 */

include_once "../StacksQueues/Queue.php";

class Graph{

    protected $adjList;
    protected $vertLabel = array();
    protected $edgeLabel = array();
    
    /*
	 * ctor to initialize an adjacency list
	 */
    public function __construct(){
        $this->adjList = array();
    }
    
    /*
	 * function to insert vertex into adjacency list
	 */
    public function insertVertex($v){
        $this->adjList[$v] = array(); //create an empty adjacent array for given vertex
    }
    
    /*
	 * function to insert edge into adjacency list
	 */
    public function insertEdge($v, $w){
        $this->adjList[$v][] = $w;
        $this->adjList[$w][] = $v;
    }
    
    /*
	 * function to remove vertex from adjacency list
	 */
    public function removeVertex($v){
        unset($this->adjList[$v]);
        
        $count = 0;
        
        foreach ($this->adjList as $vert => $adjverts){
            foreach ($adjverts as $key => $adjvert){
                if($adjvert === $v)
                {
                    unset($this->adjList[$vert][$key]);
                    $count++;
                }
            }
        }
        
        if($count < 1)
        {
            echo "Vertex {$v} does not exist!<br/><br/>";
        }
    }
    
    /*
	 * function to remove edge into adjacency list
	 */
    public function removeEdge($v, $w){
        $count = 0;
    
        foreach ($this->adjList as $vert => $adjverts){
            if($vert === $v || $vert === $w)
            {
                foreach ($adjverts as $key => $adjvert){
                    if($adjvert === $v || $adjvert === $w)
                    {
                        unset($this->adjList[$vert][$key]);
                        $count++;
                    }
                }
            }
        }
        
        if($count < 1)
        {
            echo "Edge {$v} - {$w} does not exist! <br/><br/>";
        }
    }
    
    /*
	 * function to check if two vertices are adjacent
	 */
    public function areAdjacent($v, $w){
        foreach ($this->adjList as $vert => $adjverts){
            if($vert === $v || $vert === $w)
            {
                foreach ($adjverts as $key => $adjvert){
                    if($adjvert === $v || $adjvert === $w)
                    {
                        return true;
                    }
                }
            }
        }
        return false;
    }
    
    /*
	 * function to return list of incident edges to given vertex
	 */
    public function incidentEdges($v){
        $edges = array();
    
        foreach ($this->adjList as $vert => $adjverts){
            if($vert === $v)
            {
                foreach ($adjverts as $key => $adjvert){
                    array_push($edges, $adjvert);
                }
            }
        }
        
        return $edges;
    }
    
    /*
	 * function when print Adjacency List is called
	 */
    public function toPrint(){
        foreach ($this->adjList as $vert => $adjverts){
            echo "{$vert}: ";
            
            foreach ($adjverts as $adjvert){
                 echo " {$adjvert} |";
            }
            
            echo '<br/>';
        }
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
        $this->edgeLabel["{$v}-{$w}"] = $label;
        $this->edgeLabel["{$w}-{$v}"] = $label;
    }
    /**
     * Helper function to label vertex as visited or unvisited
     */
    private function getEdgeLabel($v, $w){
        return $this->edgeLabel["{$v}-{$w}"];
    }

    /**
     * Function for a depth first search traversal
     */
    public function DFS(){
        //initialize all the vertices and edges as unvisited and unexplored
        foreach ($this->adjList as $vert => $adj) {
          $this->setVertexLabel($vert, "UNVISITED");
          
            foreach ($adj as $key => $adjvert) {
                $this->setEdgeLabel($vert, $adjvert, "UNEXPLORED");
            }
                
        }
        
        foreach ($this->adjList as $verts => $adj) {
            //echo $verts;
            if($this->getVertexLabel($verts) === "UNVISITED")
            {
                $this->DFSearch($verts);
            }
        }
        
        print_r($this->vertLabel);
        echo '<br/><br/>';
        print_r($this->edgeLabel);
        
    }
    
    /**
     * Helper function for a depth first search traversal
     */
    public function DFSearch($v){
        $this->setVertexLabel($v, "VISITED");
        $adjVerts = $this->incidentEdges($v);
        
        //print_r($adjVerts);
        
        foreach($adjVerts as $verts) {
            if($this->getVertexLabel($verts) === "UNVISITED")
            {
                $this->setEdgeLabel($v, $verts, "DISCOVERED");
                $this->DFSearch($verts); //recursively go to next vertex
            }
            else if($this->getEdgeLabel($v, $verts) === "UNEXPLORED")
            {
                $this->setEdgeLabel($v, $verts, "BACK");
            }
        }
    }
    
    /**
     * Function for a breadth first search traversal
     */
    public function BFS(){
        //initialize all the vertices and edges as unvisited and unexplored
        foreach ($this->adjList as $vert => $adj) {
          $this->setVertexLabel($vert, "UNVISITED");
          
            foreach ($adj as $key => $adjvert) {
                $this->setEdgeLabel($vert, $adjvert, "UNEXPLORED");
            }
                
        }
        
        print_r($this->vertLabel);
        echo '<br/><br/>';
        print_r($this->edgeLabel);
        echo '<br/><br/><br/><br/>';
        
        foreach ($this->adjList as $verts => $adj) {
            if($this->getVertexLabel($verts) === "UNVISITED")
            {
                $this->BFSearch($verts);
            }
        }
        
        print_r($this->vertLabel);
        echo '<br/><br/>';
        print_r($this->edgeLabel);
        
    }
    
    /**
     * Helper function for a breadth first search traversal
     */
    public function BFSearch($v){
        
        $queue = new Queue();
        
        $this->setVertexLabel($v, "VISITED");
        $queue->enqueue($v);
        
        while(!($queue->isEmpty()))
        {   
            $vert = $queue->dequeue();
            $adjVerts = $this->incidentEdges($vert);
            
            foreach ($adjVerts as $w) {
                if($this->getVertexLabel($w) === "UNVISITED")
                {
                    $this->setEdgeLabel($vert, $w, "DISCOVERED");
                    $this->setVertexLabel($w, "VISITED");
                    
                    $queue->enqueue($w);
                }
                
                else if($this->getEdgeLabel($vert, $w) === "UNEXPLORED")
                {
                    $this->setEdgeLabel($vert, $w, "CROSS");
                }
            }
        }
    }
}
?>