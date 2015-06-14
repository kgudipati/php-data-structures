<?php
class ListNode {
	
	protected $data;
	protected $next = null;
	protected $prev = null;

    /*
	 * ctor to initialize the List Node
	 */
	public function __construct($key){
		//initialize the node
		$this->data = $key;
	}
	
	/*
	 * Functions to set and get next pointer
	 */
	public function setNext(&$nxt = null){
	    $this->next = $nxt; 
	}
	
    public function &getNext(){
        return $this->next; 
    }
    
    /*
	 * Functions to set and get previous pointer
	 */
    public function setPrev(&$prv = null){
	    $this->prev = $prv; 
	}
	
    public function &getPrev(){
        return $this->prev; 
    }
    
    /*
	 * Functions to set and get nthe node data
	 */
    public function setData($key = null){
        $this->data = $key;
    }
    
    public function getData() {
        return $this->data;
    }
    
    /*
	 * destructor to clear the List Node
	 */
	public function __destruct(){
		//initialize the node
		$this->setData();
		$this->setNext();
		$this->setPrev();
	}
}

class LList {
    protected $head;
    protected $tail;
    protected $list;
    protected $length;
    
    /*
	 * ctor to create a new list
	 */
    public function __construct(){
        //initialize a list
        $this->length = 0;
        $this->head = null;
        $this->tail = null;
    }
    
    /*
	 * Functions to get head pointer
	 */
    public function &getHead(){
        return $this->head; 
    }
    
    /*
	 * Functions to get tail pointer
	 */
    public function &getTail(){
        return $this->tail; 
    }
    
    /*
	 * get the size of current list
	 */
    public function getSize(){
        return $this->length;
    }
    
    /*
	 * insert to the end of the list
	 */
    public function insertBack($data) {
        $newNode = new ListNode($data);
        
        if($this->head == null)
        {
            $this->head = $newNode;
            $this->tail = $newNode;
        }
        else
        {
            $this->tail->setNext($newNode);
            $newNode->setPrev($this->tail);
            $this->tail = $newNode;
            $newNode->setNext();
        }
        
        $this->length++;
    }
    
    /*
	 * insert to the front of the list
	 */
    public function insertFront($data) {
        $newNode = new ListNode($data);
         
        if($this->head == null)
        {
            $this->head = $newNode;
            $this->tail = $newNode;
        }
        else
        {
            $newNode->setNext($this->head);
            $this->head->setPrev($newNode);
            $this->head = $newNode;
        }
        
        $this->length++;
    }
    
    /*
	 * remove node from the back of the list
	 */
    public function removeBack() {
        if($this->head == null)
        {
            echo "The list is empty!";
        }
        else if($this->length == 1)
        {
            $temp = $this->head;
            $this->head = null;
            $this->tail = null;
            $temp = null;
        }
        else
        {
            $temp = $this->tail;
            $this->tail = $this->tail->getPrev();
            $this->tail->setNext();
            $temp = null;
        }
        
        $this->length--;
    }
    
    /*
	 * remove node from the front of the list
	 */
    public function removeFront() {
        if($this->head == null)
        {
            echo "The list is empty!";
        }
        else if($this->length == 1)
        {
            $temp = $this->head;
            $this->head = null;
            $this->tail = null;
            $temp = null;
        }
        else
        {
            $temp = $this->head;
            $this->head = $this->head->getNext();
            $this->head->setPrev(); 
            $temp = null;
        }
        
        $this->length--;
    }
    
     /*
	 * check whether the list is empty
	 */
    public function isEmpty() {
        if($this->length == 0)
        {
            return true;
        }
        else return false;
    }
    
     /*
	 * return the front/head of the list
	 */
	 public function retFront(){
	    $tHead = &$this->getHead();
	    return $tHead;
	 }
	 
	 /*
	 * return the end/tail of the list
	 */
	 public function retEnd(){
	    $tTail = &$this->getTail();
	    return $tTail;
	 }
    
    /*
	 * function when print List is called
	 */
    public function __toString(){
        $current = $this->head;
        $output = '';
 
        while ($current) {
            $output .= $current->getData() . "\n";
            $current = $current->getNext();
        }
 
        return $output;
    }
}
?>