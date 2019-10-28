<?php
    class person
    {
        public $nbr_prs = 0;
        public $name_prs = "";
        public $level_prs = 0;
        public $public_vrb = 42;
        private $_attr= 0;

        function __construct()
        {
            //print('Hello in class person'.PHP_EOL);
            $this->nbr_prs++;
            return;
        }

        function __destruct()
        {
           //print('End class person'.PHP_EOL);
           $this->vrb = -42;
           return;
        }

        public function getattr()
        {
            print('---- IN GET function'.PHP_EOL);
            return $this->$_attr;
        }
        
        public function setattr($para)
        {
            print('----- IN SET function'.PHP_EOL);

            if ($this->_attr >= 10)
            {
                print('your in max of _attr'.PHP_EOL);
                $this->_attr = 0;
            }
            else
                $this->_attr = $para;
        }

        /*public function __get($attr)
        {
            //print('-- IN __GET function with attr ='.$attr.PHP_EOL);
            return -42;
        }
        public function __set($attr,$value)
        {
            print('-- IN __GET function with attr ='.$attr.' and value='.$value.PHP_EOL);
            return;
        }*/
        

        public function funct1()
        {
            print('in method 1'.PHP_EOL);
            return;
        }
        private function funct2()
        {
            print('in method 2'.PHP_EOL);
            return;
        }

    }

    $objet_prs = new person();

    /*print('$objet_prs->nbr_prs = ' .$objet_prs->nbr_prs . PHP_EOL);
    $objet_prs->name_prs = "oussama";
    print('name  = ' .$objet_prs->name_prs . PHP_EOL);
    $objet_prs->funct1();*/

    print('test __get and __set  $foo =' .$objet_prs->$foo . PHP_EOL);
    //print('test __get and __set  $_attr =' .$objet_prs->$_attr . PHP_EOL);

    //$objet_prs->foo = 21;
    //$objet_prs->_attr = 84;

    /* Cannot access any varable private 
    print(' PRIVATE VARIABLE = '.$objet_prs->private_vrb . PHP_EOL);
    $objet_prs->private_vrb = 8;
    print(' PRIVATE VARIABLE = '.$objet_prs->private_vrb . PHP_EOL);
    $objet_prs->funct2();
    */


    
    /*
            class kids
        {
            public function __set($property, $value)
            {
                if ($value > 0)
                {
                    $this->property= 5000000;
                }
            }

            public function __get($property)
            {
                return "The child's height is " . $this->property . " inches tall".PHP_EOL;
            }
        }

        $kid1= new kids;

        $kid1->height= 45;
        $kid1->wtf = 8;
        $kid1->wtf2 = 80;
        $kid1->wtf3 = 800;
        //echo $kid1->height;

    */ 
?>