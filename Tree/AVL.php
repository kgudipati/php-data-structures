<?php

include_once 'BST.php';

class AVL extends BST{

    protected $height;
    
    public function getHeight(){
        return $this->height;
    }
    
    public function setHeight($h){
        $this->height = h;
    }
    
    /*
     *  Function to return the maximm of the given parameters
     */
    private function max($h1, $h2){
        return ($h1 < $h2) ? $h1 : $h2;
    }
    
    /*
     *  Function to return the maximm of the given parameters
     */
    private function maxSubtree(&$tree1, &$tree2){
        return $this->max($tree1, $tree2);
    }
    
    /*
     *  Function to return the height of given tree
     */
    private function height(&$subTree){
        if($subRoot == null)
        {
            return -1;
        }
        else
        {
            return 1 + $this->max($this->height($subRoot->getRight()), $this->height($subRoot->getLeft()));
        }
    }
    
    /*
     *  Function to rotate the node left
     */
    private function rotateLeft(&$node){
        $nodeLeft = &$node->getLeft();
    
        $newNode = &$node->getRight();
        
        //rotation
        $node->setRight($nodeLeft);
        $newNode->setLeft($node);
        $node = $newNode;

        //updating height
        $nodeLeft->setHeight(1 + $this->max($this->height($nodeLeft->getLeft()), $this->height($nodeLeft->getRight())));
        $newNode->setHeight(1 + $this->max($this->height($newNode->getLeft()), $this->height($newNode->getRight())));
    }
    
    /*
     *  Function to rotate the node right
     */
    private function rotateRight(&$node){
        $nodeRight = &$node->getRight();
    
        $newNode = &$node->getLeft();
        
        //rotation
        $node->setLeft($nodeRight);
        $newNode->setRight($node);
        $node = $newNode;

        //updating height
        $nodeRight->setHeight(1 + $this->max($this->height($nodeRight->getLeft()), $this->height($nodeRight->getRight())));
        $newNode->setHeight(1 + $this->max($this->height($newNode->getLeft()), $this->height($newNode->getRight())));
    }
    
    /*
     *  Function to rotate the node left-right
     */
    private function rotateLeftRight(&$node){
        $this->rotateLeft($node->getLeft());
	    $this->rotateRight($node);
    }
    
    /*
     *  Function to rotate the node right-left
     */
    private function rotateRightLeft(&$node){
        $this->rotateRight($node->getRight());
	    $this->rotateLeft($node);
    }
    
    /*
     *  Function to insert node into AVL tree
     */
    public function insertAVL($item){
        $node = new BSTNode($item);
        
        if($this->isEmpty())
        {
            $this->root = $node;
        }
        else
        {
            //use helper function to insert the node into BST
            $this->_insertAVL($node, $this->root);
        }
    }
    
     /*
     *  Function to insert node into AVL tree
     */
    public function _insertAVL($node, &$subRoot){
        //echo 'test';
        $rootLeft = &$subRoot->getLeft();
        $rootRight = &$subRoot->getRight();
        
        if($subRoot === null)
        {
            $subRoot = $node;
        }
        else if($node->getData() <= $subRoot->getData())
        {
            $this->_insertAVL($node, $rootLeft);
            
            $balance = $this->height($rootLeft) - $this->height($rootLeft);
            
            $leftBalance = $this->height($rootLeft->getLeft()) - $this->height($rootLeft->getRight());
            
            if($balance == 2)
            {
                if($leftBalance == 1)
                {
                    $this->rotateRight($subRoot);
                }
                else
                {
                    $this->rotateLeftRight($subRoot);
                }
            }
        }
        else
        {
            $this->_insertAVL($node, $rootRight);
            
            $balance = $this->height($rootLeft) - $this->height($rootRight);

            $rightBalance = $this->height($rootRight->getLeft()) - $height($rootRight->getRight());
        
            if($balance == -2)
            {
                if($rightBalance == -1)
                {
                    $this->rotateLeft($subRoot);
                }
                else
                {
                    $this->rotateRightLeft($subRoot);
                }	
            }
        }
    }
}

?>