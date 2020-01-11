<?php

class House
{
    public function __construct()
    {
        echo $this->introduce();
        return ;
    }

    public function introduce()
    {
        return ("House" . $this->getHouseName(). " of " .
        $this->getHouseSeat() . " : \"" . $this->getHouseMotto() . "\"\n");
    }
}

?>