<?php


class user
{
    //sessionları tut
    public static function Login($data)
    {
        $_SESSION["user_id"] = $data["user_id"];
        $_SESSION["user_name"] = $data["user_name"];
    }

    //kullanıcı var mı
    public static function UserExist($user_name, $email = "@@")
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users WHERE user_name = :user_name || user_email= :email");
        $query->execute([
            "user_name" => $user_name,
            "email" => $email
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function Register($data)
    {
        global $db;
        $query = $db->prepare("INSERT INTO users SET user_name= :user_name, user_url= :user_url, user_email= :email, user_password= :password");
        return $query->execute($data);
    }
}