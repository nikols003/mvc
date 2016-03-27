<?php


class PageModel
{
    public function findByAlias($alias)
    {
        return array(
            'alias'=>$alias,
            'title'=>'Welcome',
            'content'=>'This is our site'
        );
    }
}