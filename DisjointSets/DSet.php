<?php

/**
 * Implementing a disjoint as an array
 * Disjoint Set ADT
 */

class DSet{
    protected $DS;
    
    /*
	 * ctor to initialize a Disjoint Set as a dynamic array
	 */
    public function __construct(){
        $this->DS = array();
    }
    
    /*
	 * function to check whether array is empty
	 */
    public function isEmpty(){
        return count($this->DS) == 0;
    }
    
    /*
	 * function to get the specific element in array
	 */
    public function getElem($idx){
        return $this->DS[$idx];
    }
    
    /*
	 * function to set a specific element in array
	 */
    public function setElem($idx, $item){
        return $this->DS[$idx] = $item;
    }
    
    /*
	 * function to add num disjoint sets
	 */
    public function addElements($num){
        for($i = 0; $i < $num; $i++)
        {
            array_push($this->DS, -1);
        }
    }
    
    /*
	 * function to compress the path as well as find the rooted
	 * element within the same set
	 */
    public function find($elem){
        if($this->getElem($elem) < 0)
        {
            return $elem;
        }
        else
        {
            //compress the paths for faster access
            $this->setElem($elem, $this->find($this->getELem($elem)));
            return $this->find($this->getELem($elem));
        }
    }
    
     /*
	 * function to union by size two disjoint sets
	 */
    public function unionBySize($a, $b){
        
        $A = $this->find($a);
        $B = $this->find($b);
        
        $elemA = $this->getElem($A);
        $elemB = $this->getElem($B);
        
        if($elemB < $elemA)
        {
            $this->setElem($B, $A);
        }
        else
        {
            $this->setElem($A, $B);
        }
    }
    
    /*
	 * function when print Disjoint Sets is called
	 */
    public function __toString(){
        $output = '';
 
        foreach ($this->DS as $value) {
            $output .= $value . ' ';
        }
 
        return $output;
    }
}
?>