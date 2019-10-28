<?php
    function exist_user($content, $name, $file_name)
    {
        $content = unserialize($content);
        foreach ($content as $key => $value)
        {
            if ($content[$key]['login'] === $name)
                return (1);
        }
        /// add user to passwd file
        $passwd = hash('whirlpool', $passwd);
        $content[] = ['login' => $name,'passwd' => $passwd];
        $USER_ACCOUNT = serialize($content);
        file_put_contents($file_name, $USER_ACCOUNT);
        echo "OK\n";
    }
    $file_name = "../private/passwd";
    $name = $_POST['login'];
    $passwd = $_POST['passwd'];
    if ($_POST['submit'] === "OK" && $passwd !== "" && $name !== "")
    {
        if (!file_exists("../private"))
            mkdir("../private"); 
        if (file_exists($file_name))
            $content = file_get_contents($file_name);
        if ($content != NULL)
        {
            if (exist_user($content, $name, $file_name))
                echo "ERROR\n";   
        }
        else
        {
            $passwd = hash('whirlpool', $passwd);
            $USER_ACCOUNT[] = ['login' => $name,'passwd' => $passwd];
            $USER_ACCOUNT = serialize($USER_ACCOUNT);
            file_put_contents($file_name, $USER_ACCOUNT);
            echo "OK\n";
        }
    }
    else
        echo "ERROR\n";
?>
