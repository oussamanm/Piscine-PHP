<?php
    function auth($login, $passwd)
    {
        if ($login == "" || $passwd == "")
            return FALSE;
        $content = file_get_contents("../private/passwd");
        $array = unserialize($content);
        foreach ($array as $key => $value)
        {
            if ($array[$key]['login'] == $login)
            {
                $passwd = hash('whirlpool', $passwd);
                if ($array[$key]['passwd'] == $passwd)
                    return TRUE;
            }
        }
        return FALSE;
    }
?>