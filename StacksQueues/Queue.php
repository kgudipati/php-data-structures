<?php
include_once "../LinkedList/List.php";

class Queue{
    
    protected $queue;
    
    /*
	 * ctor to initialize the Queue
	 */
	public function __construct(){
		$this->queue = new LList();
	}
	
	/*
	 * function to enqueue element to end of the queue
	 */
	public function enqueue($item){
		$this->queue->insertFront($item);
	}
	
	/*
	 * function to dequeue element from front of the queue
	 */
	public function dequeue(){
		if($this->queue->isEmpty())
		{
		    echo 'Queue is empty! Cannot Pop!';
		    return;
		}
		else
		{
            $retVal = $this->queue->retEnd()->getData();
            $this->queue->removeBack();
            return $retVal;
		}
	}
	
	/*
	 * function to return the element at the front of the queue
	 */
	public function front(){
		if($this->queue->isEmpty())
		{
		    echo 'Queue is empty! No element to peek!';
		    return;
		}
		else return $this->queue->retEnd();
	}
	
	/*
	 * check whether the queue is empty
	 */
    public function isEmpty() {
       return $this->queue->isEmpty();
    }
}
?>