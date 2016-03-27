<?php


class AuthorController extends Controller
{
    public function indexAction(Request $request)
    {
        $id = $request->get('id');
        $author = (new AuthorModel())->ShowAllHisBook($id);

        $args = compact('author');
        return $this->render('index', $args);
    }
}