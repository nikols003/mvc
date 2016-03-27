<?php


class NewsModel
{
    public function findAll()
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT * FROM news ORDER BY news.date DESC');
        $sth->execute();

        $new = $sth->fetchAll(PDO::FETCH_ASSOC);
        if (!$new) {
            throw new NotFoundException('News not found');
        }

        return $new;

    }
    public function findById($id)
    {

        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT * FROM news WHERE news.id = :news_id');
        $params = array('news_id'=>$id);
        $sth->execute($params);

        $news = $sth->fetch(PDO::FETCH_ASSOC);


        if (!$news) {
            throw new NotFoundException("news #{$id} not found");
        }

        return $news;

    }

}