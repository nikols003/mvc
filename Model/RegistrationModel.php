<?php


class RegistrationModel
{
    public function save(array $message)
    {
         //TODO: проверить что бы все было четко!

        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('INSERT INTO users VALUES
                              (null, :email, :name, :password, :created, 1)');
        $sth->execute($message);
        
    }
}