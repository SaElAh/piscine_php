<?php
    class Jaime
    {
        public $fuck = 2;
        public $class1 = '';
        public $class2 = '';

        public function __construct()
        {
            return ;
        }

        public function checksleepWith()
        {
            if ($this->fuck == 0)
                return ("With pleasure, but only in a tower in Winterfell, then.");
            else if ( $this->fuck == 1)
                return ("Let's do this.");
            else if ( $this->fuck == 2 )
                return ("Not even if I'm drunk !"); 
        }

        public function sleepWith($partner)
        {
            $class1 = get_called_class();
            if (($class2 = get_parent_class($partner)) == false)       
                $class2 = 'Jaime';

            if ($class1 == 'Jaime' && $class2 == 'Stark')
                $this->fuck = 1;
            else if ($class1 == 'Jaime' && $class2 == 'Lannister')
                $this->fuck = 0;
            else if ($class1 == 'Tyrion' && $class2 == 'Stark')
                $this->fuck = 1;
            else if ($class1 == 'Tyrion' && $class2 == 'Lannister')
                $this->fuck = 2;

            echo $this->checksleepWith(). "\n";
        }
    }

?>