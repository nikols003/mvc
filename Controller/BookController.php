<?php


class BookController extends Controller
{
    public function indexAction(Request $request)
    {
        $model = new BookModel();
        $books = $model->findAll();


        Metahelper::setTitle('Books');



        $args = compact('books');
        return $this->render('index', $args);
    }

    public function showAction(Request $request)
    {
    $id = $request->get('id');
    $book = (new BookModel())->findById($id);


    Metahelper::addTitle($book[0]['title']);


    $args = compact('book');
    return $this->render('show', $args);
    }
}