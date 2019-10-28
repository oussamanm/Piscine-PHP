<?php
    class Jaime
    {
        function sleepWith($param)
        {
            if (get_class($param) == "Cersei")
                print("With pleasure, but only in a tower in Winterfell, then.\n");
            else if (get_class($param) == "Tyrion")
                print("Not even if I'm drunk !\n");
            else if (get_class($param) == "Sansa")
                print("Let's do this.\n");
        }
    }
?>