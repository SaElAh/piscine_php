<?php

abstract class Fighter
{
    private $_warrior_class;

    public function getClass()
    {
        return $this->_warrior_class;
    }

    public function __construct($var)
    {
       $this->_warrior_class = $var;
    }

    abstract function fight($target);
}

?>