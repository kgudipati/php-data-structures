<?php
include_once "../StacksQueues/Queue.php";

class BSTNode{
    
    protected $data;
	protected $left;
	protected $right;

    /*
	 * ctor to initialize the Binary Search Tree Node
	 */
	public function __construct($key){
		//initialize the node
		$this->data = $key;
		$this->left = null;
		$this->right = null;
	}
	
	/*
	 * destructor to destroy the Binary Search Tree Node
	 */
	public function __destruct(){
		//initialize the node
		$this->data = null;
		$this->left = null;
		$this->right = null;
	}
	
	/*
	 * Functions to set and get the left and right children
	 */
	public function setLeft(&$node){
        $this->left = $node; 
    }
    public function &getLeft(){
        return $this->left; 
    }
	
	public function setRight(&$node){
        $this->right = $node; 
    }
    public function &getRight(){
        return $this->right; 
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
    
}

class BST{
    protected $root; //the root node of the tree
    
    /*
	 * ctor to build an initial empty tree
	 */
    public function __construct(){
        $this->root = null;
    }
    
    /*
	 * Functions to check whether a tree is empty
	 */
    public function isEmpty(){
        return $this->root === null;
    }
    
    /*
	 * Functions to insert node intothe tree
	 */
    public function insert($item){
        $node = new BSTNode($item);
        
        if($this->isEmpty())
        {
            $this->root = $node;
        }
        else
        {
            //use helper function to insert the node into BST
            $this->_insert($node, $this->root);
        }
    }
    
    /*
	 * Helper functions to insert the node into BST
	 */
    private function _insert(&$node, &$subRoot){
        if($subRoot === null)
        {
            $subRoot = $node;
        }
        else if($node->getData() <= $subRoot->getData())
        {
            $this->_insert($node, $subRoot->getleft());
        }
        else
        {
            $this->_insert($node, $subRoot->getRight());
        }
    }
    
    /*
	 * Functions to remove node from the tree
	 */
    public function remove($item){
        
        if($this->isEmpty())
        {
            echo 'There are no nodes in the tree to remove! Empty Tree!';
        }
        else
        {
            //use helper function to remove the node from BST
            $this->_remove($item, $this->root);
        }
    }
    
    /*
	 * Helper functions to remove the node into BST
	 */
    private function _remove(&$key, &$subRoot){
        if($subRoot->getData() === $key)
        {
            _doRemoval($subRoot);
            
        }
        else if($key < $subRoot->getData())
        {
            $this->_remove($key, $subRoot->getleft());
        }
        else
        {
            $this->_remove($key, $subRoot->getRight());
        }
    }
    
    /*
	 * Helper functions to decide which remove to use
	 */
    private function _doRemoval(&$Root){
        if(($Root->getLeft() === null) && ($Root->getRight() === null))
        {
            //if subRoot is a leaf
            _noChildRemove($Root);
            return;
        }
        else if($Root->getLeft() && $Root->getRight())
        {
            //if subRoot has two children
            _twoChildRemove($Root);
            return;
        }
        else
        {
            //if subRoot has one child
            _oneChildRemove($Root); 
            return;   
        }
    }
    
     /*
	 * Helper functions to remove a leaf
	 */
    private function _noChildRemove(&$subRoot){
            $subRoot = null;
            return;
    }
    
    /*
	 * Helper functions to remove a node with one child
	 */
    private function _oneChildRemove(&$subRoot){
            $temp = $subRoot;
            
            if($subRoot->getLeft())
            {
                $subRoot = $subRoot->getLeft();
            }
            else
            {
                $subRoot = $subRoot->getRight();
            }
            
            $temp = null;
    }
    
    /*
	 * Helper functions to remove a node with two children
	 */
    private function _twoChildRemove(&$subRoot){
            $iop = $subRoot->getRight();
            $temp = $iop->getData();
            $subRoot->setData($temp);
            _doRemoval($iop);
    }

    
    /*
	 * Functions to traverse 3 ways through the tree
	 */
    public function traverse($method){
        
        switch($method){
            
            case 'preorder':
                $this->_preorder($this->root);
                break;
            case 'inorder':
                $this->_inorder($this->root);
                break;
            case 'postorder':
                $this->_postorder($this->root);
                break;
            case 'levelorder':
                $this->_levelorder($this->root);
                break;
            default:
                break;
        }
        
    }
    
    private function _preorder($subRoot){
        echo $subRoot->getData() . ' ';
        
        if($subRoot->getleft())
        {
            //traverse left of tree
            $this->_preorder($subRoot->getleft());
        }
        
        if($subRoot->getRight())
        {
            //traverse right of tree
            $this->_preorder($subRoot->getRight());
        }
    }
    
    private function _inorder($subRoot){
        
        if($subRoot->getleft())
        {
            //traverse left of tree
            $this->_inorder($subRoot->getleft());
        }
        
        echo $subRoot->getData() . ' ';
        
        if($subRoot->getRight())
        {
            //traverse right of tree
            $this->_inorder($subRoot->getRight());
        }
    }
    
    private function _postorder($subRoot){
        
        if($subRoot->getleft())
        {
            //traverse left of tree
            $this->_postorder($subRoot->getleft());
        }
        
        if($subRoot->getRight())
        {
            //traverse right of tree
            $this->_postorder($subRoot->getRight());
        }
        
        echo $subRoot->getData() . ' ';
    }
    
    private function _levelorder($subRoot){
        //initialize a queue
        $queue = new Queue();
        
        if($this->root)
        {
            $queue->enqueue($subRoot);
        }

        while(!($queue->isEmpty()))
        {
            $val = $queue->front();
            $queue->dequeue();
            
            //get the left and right children of current node
            $lChild = &$val->getData()->getLeft();
            $rChild = &$val->getData()->getRight();
            
            echo $val->getData()->getData() . ' ';
            
            if($lChild)
            {
                $queue->enqueue($lChild);
            }
            if($rChild)
            {
                $queue->enqueue($rChild);
            }
        }
    }
    
    public function search($item){
            _search($item, $this->root);
    }
    
    private function _search($key, &$subRoot){
        
        if($key === $subRoot->getData())
        {
            echo 'The key given was found in the tree!';
        }
        else if($key < $subRoot->getData())
        {
            return _search($key, $subRoot->getLeft());
        }
        else if($key > $subRoot->getData())
        {
            return _search($key, $subRoot->getRight());
        }
        else echo 'The key given was not found in the tree!';
    }
}
?>