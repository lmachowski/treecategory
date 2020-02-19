<?php

class TreeCategoryHelper{

    private $tree;
    private $list;

    /**
     * @return mixed
     */
    public function getTree()
    {
        return $this->tree;
    }

    /**
     * @param mixed $tree
     */
    public function setTree($tree): void
    {
        $this->tree = $tree;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param mixed $list
     */
    public function setList($list): void
    {
        $this->list = $list;
    }

    private function _getNameCategoryById(int $idCategory): string {
        $list = $this->getList();
        $index = array_search($idCategory , array_column($list, 'category_id'));
        if ($index === false){
            return '';
        }elseif (isset($list[$index])){
            return $list[$index]->translations->pl_PL->name;
        }
    }

    public function processCategory():void {
        array_walk_recursive($this->tree, 'self::_categoryWalk');
    }

    private function _categoryWalk($category):void {
        $category->name = $this->_getNameCategoryById($category->id);

        if (count($category->children) > 0){
            array_walk_recursive($category->children, 'self::_categoryWalk');
        }
    }

}