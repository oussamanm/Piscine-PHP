<?php
    class Fighter
    {
        protected $name;
        function __construct($para)
        {
            if ($para != "")
            {
                $this->name = $para;
            }
        }
        function get_name()
        {
            return ($this->name);
        }
    }
?>