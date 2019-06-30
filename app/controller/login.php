<?php

$meta = [
    "title" => "Giriş Yap"
];

if (post("submit"))
{
    $user_name = post("user_name");
    $password = post("password");

    //kontorlleri yap
    if (!$user_name)
    {
        $error = "Lütfen kullanıcı adınızı yazın!";
    }
    elseif (!$password)
    {
        $error = "Lütfen şifrenizi yazın.";
    }
    else
    {
        //üye var mı kontrol et
        $row = User::UserExist($user_name);

        if ($row)
        {
           //parola kontrolu yap
            $password_verify = password_verify($password, $row["user_password"]);

            if ($password_verify)
            {
                $success = "Başarıyla giriş yaptınız, yönlendiriliyorsunuz.";
               User::Login($row);

                header("Refresh:2; url=" .site_url());
            }
            else
            {
                $error = "Kullanıcı adı veya şifre hatalı!";
            }
        }
        else
        {
            $error = "Böyle bir kullanıcı sistemde kayıtlı gözükmüyor!";
        }

    }
}

require view("login");