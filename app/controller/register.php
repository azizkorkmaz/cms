<?php

$meta = [
    "title" => "Kayıt Ol"
];

if (post("submit"))
{
    $user_name = post("user_name");
    $email = post("email");
    $password = post("password");
    $password_again = post("password_again");

    //kontorlleri yap
    if (!$user_name)
    {
        $error = "Lütfen kullanıcı adınızı yazın!";
    }
    elseif (!$email)
    {
        $error = "Lütfen e-posta adresini yazın.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error = "Lütfen geçerli bir e-posta adresi yazın.";
    }
    elseif (!$password || !$password_again)
    {
        $error = "Lütfen şifrenizi yazın.";
    }
    elseif ($password != $password_again)
    {
        $error = "Girdiğiniz şifreler birbiriyle uyuşmuyor.";
    }
    else
    {
        //üye var mı kontrol et
        $row = User::UserExist($user_name, $email);

        if ($row)
        {
            $error = "Bu kullanıcı adı ya da e-posta adresi zaten kullanılıyor. Lütfen bir şey deneyin!";
        }
        else
        {
            //üye ekle
            $result = User::Register([
                "user_name" => $user_name,
                "user_url" => permalink($user_name),
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);

            if ($result)
            {
                $success = "Üyeliğiniz başarıyla oluşturuldu, yönlendiriliyorsunuz.";
                User::Login([
                    "user_id" => $db->lastInsertId(),
                    "user_name" => $user_name
                ]);
                header("Refresh:2; url=" .site_url());
            }
            else
            {
                $error = "Bir sorun oluştu lütfen daha sonra tekrar deneyin!";
            }
        }

    }
}

require view("register");