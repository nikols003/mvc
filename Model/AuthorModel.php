<?php


class AuthorModel
{
    public function ShowAllHisBook($id)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT b.title as title, a.name as author_name, b.id as id FROM book b JOIN book_author ba ON b.id = ba.book_id JOIN author a ON ba.author_id = a.id WHERE a.id = :a_id ');
        $params = array('a_id'=>$id);
        $sth->execute($params);

        $author = $sth->fetchAll(PDO::FETCH_ASSOC);


        if (!$author) {
            throw new NotFoundException("author #{$id} not found");
        }

        return $author;
    }
}