<?php
    class Tyrion
    {
        function sleepWith($param)
        {
            if (get_class($param) == "Cersei")
                print("Not even if I'm drunk !\n");
            else if (get_class($param) == "Jaime")
                print("Not even if I'm drunk !\n");
            else if (get_class($param) == "Sansa")
                print("Let's do this.\n");
        }
    }
?>