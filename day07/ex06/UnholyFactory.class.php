<?php

class UnholyFactory
{
    private $_soldiers  = array();

    public function absorb($warr)
    {
        if($warr instanceof Fighter)
        {
            if (!$this->check_dupl($warr->getClass()))
            {
                $this->_soldiers[] = $warr->getClass();
                echo "(Factory absorbed a fighter of type " . $warr->getClass() . ")\n";
            }
            else
                echo "(Factory already absorbed a fighter of type " . $warr->getClass() .  ")\n";
        }
        else
            echo "(Factory can't absorb this, it's not a fighter)\n";
    }

    public function fabricate($warr)
    {
        foreach ($this->_soldiers as $key => $value)
        {
            if ($warr == $value)
            {
                $this->_soldiers[] = $warr;
                echo "(Factory fabricates a fighter of type " . $warr . ")\n";
                if ($warr == "foot soldier")
                    return new Footsoldier();
                if ($warr == "archer")
                    return new Archer();
                if ($warr == "assassin")
                    return new Assassin();
            }
        }
        echo "(Factory hasn't absorbed any fighter of type " . $warr . ")\n";
        return NULL;
    }

    public function check_dupl($warr)
    {
        foreach ($this->_soldiers as $key => $value)
        {
            if ($value == $warr)
                return true;
        }
        return false;
    }

    public function fight($target)
    {
        echo "ALLO\n";
        Fighter::__construct($this->_warrior_class);
    }
}



?>