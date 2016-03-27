<?php


class UserModel
{
    public function find($email, $password)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT * FROM users WHERE email = :email and password = :password');
        $sth->execute(compact('email', 'password'));
        return $user = $sth->fetch(PDO::FETCH_ASSOC);

    }
}