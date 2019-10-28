<?php
    $file_name = "../private/passwd";
    $name = $_POST['login'];
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];

    function modify_pass($content)
    {
        global $file_name, $name, $oldpw, $newpw;
        $oldpw = hash('whirlpool', $oldpw);
        $content = unserialize($content);
        foreach ($content as $key => $value)
        {
            if ($content[$key]['login'] === $name && $content[$key]['passwd'] === $oldpw)
            {
                $newpw = hash('whirlpool', $newpw);
                $content[$key] = ['login' => $name,'passwd' => $newpw];
                $USER_ACCOUNT = serialize($content);
                file_put_contents($file_name, $USER_ACCOUNT);
                echo "OK\n";
                return TRUE;
            }
        }
        return FALSE;
    }
    
    if ($_POST['submit'] === "OK" && $oldpw !== "" && $newpw !== "" && $name !== "")
    {
        $content = file_get_contents($file_name);
        if ($content != NULL)
        {
            if (modify_pass($content) == FALSE)
                echo "ERROR\n";
        }
    }
    else
        echo "ERROR\n";
?>