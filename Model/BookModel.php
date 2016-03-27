<?php


class BookModel
{
    public function findById($id)
    {

        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT b.description, a.id as author, b.id, b.price as price, b.title as title, a.name as author_name FROM book b JOIN book_author ba ON b.id = ba.book_id JOIN author a ON ba.author_id = a.id WHERE b.id = :book_id');
        $params = array('book_id'=>$id);
        $sth->execute($params);

        $book = $sth->fetchall(PDO::FETCH_ASSOC);


        if (!$book) {
            throw new NotFoundException("book #{$id} not found");
        }

        return $book;
    }

    public function findAll()
    {
        $db = DbConnection::getInstance()->getPdo();
//        $sth = $db->query('SELECT b.price as price, a.id as author, b.id as id, b.title as title, a.name as author_name FROM book b JOIN book_author ba ON b.id = ba.book_id JOIN author a ON ba.author_id = a.id ORDER BY b.title');


        $sth = $db->query('SELECT b.price as price, a.id as author, b.id as id, b.title as title, GROUP_CONCAT(a.name) as author_name FROM book b JOIN book_author ba ON b.id = ba.book_id JOIN author a ON ba.author_id = a.id GROUP BY b.title ORDER BY `b`.`title` ASC');
        $sth->execute();

        $book = $sth->fetchAll(PDO::FETCH_ASSOC);




        if (!$book) {
            throw new NotFoundException('Books not found');
        }

        return $book;
    }


    public function findByIdArray(array $ids)
    {
        if (!$ids) {
            return array();
        }

        $params = array();

        foreach ($ids as $v) {
               $params[] = '?';
            }

        $params = implode(',', $params);

        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare("SELECT * FROM book WHERE id IN ({$params}) ORDER BY price");
        $sth->execute($ids);

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

//    public function showAuthors()
//    {
//        $db = DbConnection::getInstance()->getPdo();
//        $sth = $db->query('SELECT a.name as author_name
//                      FROM book b JOIN book_author ba ON b.id = ba.book_id
//                      JOIN author a ON ba.author_id = a.id WHERE b.id = :book_id');
//        $params = array('book_id'=>$id);
//        $sth->execute($params);
//
//        $authors = $sth->fetchAll(PDO::FETCH_ASSOC);
//
//
//        if (!$authors) {
//            throw new NotFoundException("book #{$id} not found");
//        }
//
//        return $authors;
//    }
}

