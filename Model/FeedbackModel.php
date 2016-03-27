<?php


class FeedbackModel
{
    public function save(array $message)
    {
         //TODO: проверить что бы все было четко!

        $db = DbConnection::getInstance()->getPdo();

        $sth = $db->prepare('INSERT INTO feedback VALUES
                              (NULL, :username, :email, :message, :created, :ip)');
        $sth->execute($message);
        



    }
}