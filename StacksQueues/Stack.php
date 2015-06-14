<?php
include_once "../LinkedList/List.php";

class Stack{
    
    protected $stack;
    
    /*
	 * ctor to initialize the Stack
	 */
	public function __construct(){
		$this->stack = new LList();
	}
	
	/*
	 * function to push element to top of the stack
	 */
	public function push($item){
		$this->stack->insertFront($item);
	}
	
	/*
	 * function to pop element from top of stack
	 */
	public function pop(){
		if($this->stack->isEmpty())
		{
		    echo 'Stack is empty! Cannot Pop!';
		    return;
		}
		else
		{
            $retVal = $this->stack->retFront()->getData();
            $this->stack->removeFront();
            return $retVal;
		}
	}
	
	/*
	 * function to return the element at the top of the stack
	 */
	public function peek(){
		if($this->stack->isEmpty())
		{
		    echo 'Stack is empty! No element to peek!';
		    return;
		}
		else return $this->stack->retFront();
	}
	
	/*
	 * check whether the stack is empty
	 */
    public function isEmpty() {
       return $this->stack->isEmpty();
    }
}
?>