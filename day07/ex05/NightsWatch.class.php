<?php
    class NightsWatch implements IFighter
    {
        public $array_fighters = array();
    
        function recruit($para)
        {
            if ($para instanceof IFighter)
                $this->array_fighters[] = $para;
        }
        function fight()
        {
            if (count($this->array_fighters) != 0)
            {
                foreach ($this->array_fighters as $arg)
                {
                    $arg->fight();
                }
            }
        }
    }
?>