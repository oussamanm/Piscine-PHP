<?php
    class A
    {
        function ft_a()
        {
            static::ft_b();
        }
        function ft_b()
        {
            print("This is A \n");
        }
    }
    class B extends A
    {
        function ft_b()
        {
            print("This is B \n");
        }
    }

    $object_A = new A();
    $object_B = new B();

    $object_A->ft_a();
    $object_B->ft_a();

?>