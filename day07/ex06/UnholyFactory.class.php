<?php
    class UnholyFactory
    {
        public $arrays = array();

        function absorb($para)
        {
            if ($para instanceof Fighter)
            {
                $tmp_name = $para->get_name();
                if (in_array($para, $this->arrays))
                    print ("(Factory already absorbed a fighter of type ".$tmp_name.")\n");
                else
                {
                    print ("(Factory absorbed a fighter of type ".$tmp_name.")\n");
                    $this->arrays[] = $para;
                }
            }
            else
                print ("(Factory can't absorb this, it's not a fighter)\n");
        }

        function get_object($name)
        {
            foreach ($this->arrays as $arg)
            {
                if ($arg->get_name() === $name)
                    return ($arg);
            }
        }
        
        function fabricate($para)
        {
            if (($obj = $this->get_object($para)) != NULL)
            {
                print ("(Factory fabricates a fighter of type ".$para.")\n");
                return  clone $obj;
            }
            else
            {
                print ("(Factory hasn't absorbed any fighter of type ".$para.")\n");
                return NULL;
            }
        }
    }
?>