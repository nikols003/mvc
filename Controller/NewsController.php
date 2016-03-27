<?php


class NewsController extends controller
{
    public function indexAction(Request $request)
    {

        Metahelper::setTitle('Fresh news');
        $model = new NewsModel();
        $news = $model->findAll();



        $model = new NewsModel();
        $news = $model->findAll();


        $args = compact('news');
        return $this->render('index', $args);

    }

    public function showAction(Request $request)
    {
        $id = $request->get('id');
        $news = (new NewsModel())->findById($id);

        
        Metahelper::setTitle($news['title']);



        $args = compact('news');
        return $this->render('show', $args);
    }
}
