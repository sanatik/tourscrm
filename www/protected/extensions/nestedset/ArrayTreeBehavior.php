<?php


class ArrayTreeBehavior extends CActiveRecordBehavior {
    /**
     * The name of the column which is used to store the unique identifier
     */
    public $_idCol = "id";

    /**
     * The name of the column which is used to store left tree value
     */
    public $_lftCol = "lft";

    /**
     * The name of the column which is used to store right tree value
     */
    public $_rgtCol = "rgt";

    /**
     * The name of the column which is used to store depth of the node
     */
    public $_lvlCol = "level";

    /**
     * Static array that keeps track of all models with TreeBehaviour attacked
     */
    protected static $_registered = array();

    public function getCMenuArray($param = array()) {

        if (isset($param['rootaslink'])) {
            $rootaslink = $param['rootaslink'];
        } else {
            $rootaslink = false;
        }

        if (isset($param['returnrootnode'])) {
            $returnrootnode = $param['returnrootnode'];
        } else {
            $returnrootnode = false;
        }
        if (isset($param['keyfield'])) {
            $keyfield = $param['keyfield'];
        } else {
            $keyfield = 'id';
        }

        if (isset($param['condition'])) {
            $condition = $param['condition'];
        } else {
            $condition = '';
        }

        if (isset($param['url'])) {
            $url = $param['url'];
        } else {
            $url = '/';
        }

// Fetch the flat tree
        $rawtree = $this->getTree($returnrootnode, $condition);

// Init variables needed for the array conversion
        $tree = array();
        $node =& $tree;
        $position = array();
        $lastitem = '';
        $depth = $this->getLevelValue();

        foreach ($rawtree as $rawitem) {

// If its a deeper item, then make it subitems of the current item
            if ($rawitem->getLevelValue() > $depth) {
                $position[] =& $node; //$lastitem;
                $depth = $rawitem->getLevelValue();
                $node =& $node[$lastitem]['items'];
            } // If its less deep item, then return to a level up
            else {
                while ($rawitem->getLevelValue() < $depth) {
                    end($position);
                    $node =& $position[key($position)];
                    array_pop($position);
                    $depth = $node[key($node)]['node']->getLevelValue();
                }
            }

// Add the item to the final array
            $node[$rawitem->$keyfield]['node'] = $rawitem;
            if (!$rawitem->hasChildNodes() || $rootaslink) {
                if ($rawitem->owner->url == '') {
                    $node[$rawitem->$keyfield]['url'] = Yii::app()->createUrl($url, array('sefname' => $rawitem->owner->sefname));
                } else {
                    $node[$rawitem->$keyfield]['url'] = $rawitem->owner->url;
                }

                if ($rawitem->owner->new_window == 1) {
                    $node[$rawitem->$keyfield]['htmlOptions'] = array('target' => '_blank');
                }
            }
            //array($rawitem->owner->sefname);
            $node[$rawitem->$keyfield]['label'] = $rawitem->owner->title;
// save the last items' name
            $lastitem = $rawitem->$keyfield;
        }
// we don't care about the root node
        if (!$returnrootnode) {
            reset($tree);
            $tree = $tree[key($tree)]['items'];
//array_shift($tree);
        }


        return $tree;
    }

    /**
     * Returns the tree in an flat array
     * @param boolean $returnrootnode true = return an array including the root node.
     */
    public function getTree($returnrootnode = true, $condition = '') {
        Yii::trace(get_class($this) . '.getTree()', 'extensions.nestedset.treebehavior.TreeBehavior');

        $condition .= ' ';
        $condition .= $this->_lftCol . " >= ? AND " . $this->_rgtCol . " <= ? AND active=1 AND root=?";
        $params = array($this->getLeftValue(), $this->getRightValue(), $this->owner->root);
        $builder = $this->Owner->getCommandBuilder();
        $criteria = $builder->createCriteria($condition, $params);

        $criteria->order = $this->_lftCol . " ASC";
        $command = $builder->createFindCommand($this->Owner->getTableSchema(), $criteria);

        $nodes = $this->Owner->populateRecords($command->queryAll());

        if (!$returnrootnode) {
            array_shift($nodes);
        }

        return $nodes;
    }

    /**
     *  Get the value stored in the "lft" column for this node.
     *  This value is usually null when the node is not yet stored using the append* or insert* functions.
     * @return The left value for this node, or null when unknown.
     */
    public function getLeftValue() {
        return $this->Owner->attributes[$this->_lftCol];
    }

    /**
     *  Get the value stored in the "rgt" column for this node.
     *  This value is usually null when the node is not yet stored using the append* or insert* functions.
     * @return The right value for this node, or null when unknown.
     */
    public function getRightValue() {
        return $this->Owner->attributes[$this->_rgtCol];
    }

    /**
     *  Get the value stored in the "level" column for this node.
     *  This value is usually null when the node is not yet stored using the append* or insert* functions.
     * @return The level value for this node, or null when unknown.
     */
    protected function getLevelValue() {
        return $this->Owner->attributes[$this->_lvlCol];
    }

    /**
     * Returns false when the node is a leaf node (i.e. has no child nodes)
     * @return boolean True when the node has childe nodes, false when the node is a leaf.
     */
    public function hasChildNodes() {
        return $this->getLeftValue() != ($this->getRightValue() - 1);
    }

}