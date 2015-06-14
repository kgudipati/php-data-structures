<?php

/*
 * Implementing a heap as binary tree -> array
 * maxHeaps and minHeaps
 * main Heap ADT
 */

class MinHeap{
    
    protected $minHeap;
    
    /*
	 * ctor to initialize the Heap as a dynamic array
	 */
    public function __construct(){
        $this->minHeap = array();
    }
    
    /*
	 * function to check whether array/heap is empty
	 */
    public function isEmpty(){
        return count($this->minHeap) == 0;
    }
    
    /*
	 * function returns heap size
	 */
    public function getSize(){
        return count($this->minHeap);
    }
    
     /*
	 * function insert element into heap
	 */
    public function setElem($idx, $item){
        return $this->minHeap[$idx] = $item;
    }
    
    /*
	 * function get element from heap
	 */
    public function getElem($idx){
        return $this->minHeap[$idx];
    }
    
    /*
	 * function to compare the two items
	 */
    public function compare($idx1, $idx2){
        
        $item1 = $this->getElem($idx1);
        $item2 = $this->getElem($idx2);
        
        if($item1 === $item2)
        {
            return 0;
        }
        
        return ($item1 < $item2 ? 1 : -1);
    }
    
    /*
	 * function to get the root of heap
	 */
    public function getRoot(){
        return $this->getElem(1);
    }
    
    /*
	 * function to set the root of heap
	 */
    public function setRoot($item){
        $this->setElem(1, $item);
    }
    
    /*
	 * function to get the last element of heap
	 */
    public function getLast(){
        return $this->getElem($this->getSize());
    }
    
    /*
	 * function to set the last element of heap
	 */
    public function setLast($item){
        $this->setElem($this->getSize(), $item);
    }
    
    /*
	 * function to find parent of current index
	 */
    public function getParent($currIdx){
        return floor($currIdx/2);
    }
    
    /*
	 * function to find if current index has a child
	 */
    public function hasChild($currIdx){
        return (2 * $currIdx) < $this->getSize();
    }
    
    /*
	 * function to find the index of left child of current index
	 */
    public function leftChild($currIdx){
        return 2 * $currIdx;
    }
    
    /*
	 * function to find the index of right child of current index
	 */
    public function rightChild($currIdx){
        return (2 * $currIdx) + 1;
    }
    
    /*
	 * function to swap the elements of two indexes in a heap
	 */
    public function swap($idx1, $idx2){
        $temp = $this->minHeap[$idx1];
        $this->minHeap[$idx1] = $this->minHeap[$idx2];
        $this->minHeap[$idx2] = $temp;
    }
    
    /*
	 * function to insert element into the heap-array
	 */
    public function insert($item){
        $Size = $this->getSize();
        $Size++;
        $this->setElem($Size, $item);
        $this->heapifyUp($Size);
    }
    
    /*
	 * function to heapify/adjust the heap for rule of child < parent
	 */
    private function heapifyUp($currIdx){
        
        if($currIdx === 1)
        {
            //base case - if you reached the root (index of 1)
            return;
        }
        
        $parentIdx = $this->getParent($currIdx); //get the parent index
        
        if($this->compare($currIdx, $parentIdx) === 1)
        {
            //if the current element is lower than its parent
            $this->swap($parentIdx, $currIdx);
            $this->heapifyUp($parentIdx);
        }
    }
    
    /*
	 * function to find which child has higher priority
	 */
    public function maxPriorityChild($currIdx){
        $left = $this->leftChild($currIdx);
        $right = $this->rightChild($currIdx);
        
        if($right < $this->getSize())
        {
            //if there is a right child
            if($this->compare($right, $left) == 1)
            {
                //if right child is smaller than left child
                return $right;
            }
            else return $left;
        }
        else return $left;
    }
    
    /*
	 * function to heapify/adjust the heap for rule of child < parent
	 */
    private function heapifyDown($currIdx){
        
        if($this->hasChild($currIdx))
        {
            //get the child index with the highest priority
            $childIdx = $this->maxPriorityChild($currIdx);
        
            if($this->compare($childIdx, $currIdx) === 1)
            {
                //if the child element is lower than the current
                $this->swap($currIdx, $childIdx);
                $this->heapifyDown($childIdx);
            }
        }
    }
    
    /*
	 * function to minimum element or element with highest priority
	 */
    public function removeMin(){
        $size = $this->getSize();
        if($this->isEmpty())
        {
            echo 'The Heap is empty!';
            return;
        }
        
        $retVal = $this->getRoot();
        $this->setRoot($this->getElem($size));
        //echo $this->getRoot();
        //echo $this->getRoot();
        unset($this->minHeap[$size]);
        
        //heapifyDown
        $this->heapifyDown(1); //at the root
        return $retVal;
    }
    
    /*
	 * function when print Heap is called
	 */
    public function __toString(){
        $output = '';
 
        foreach ($this->minHeap as $value) {
            $output .= $value . ' ';
        }
 
        return $output;
    }
}
?>