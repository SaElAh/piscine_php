<?php

class NightsWatch
{
    private $_soldiers = array();

    public function recruit($var)
    {
        $this->_soldiers[] = $var;
    }

    public function fight()
    {
        foreach ($this->_soldiers as $warrior)
        {
            if ($warrior instanceof IFighter)
                $warrior->fight();
        }
    }
}

?>