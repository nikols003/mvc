<?php


class CartController extends Controller
{
    public function addAction(Request $request)
    {
        $id = $request->get('id');
        $cart = new Cart();
        $cart->addProduct($id);

//        Session::setFlash('Книга добавлена в корзину');
        Router::redirect("/book-{$id}.html");
    }

    public function indexAction(Request $request)
    {
        $cart = new Cart();

        $bookIds = $cart->getProducts();

        $model = new BookModel();
        $books = $model->findByIdArray($bookIds);

        return $this->render('index', compact('books'));
    }

    public function clearAction(Request $request)
    {
        (new Cart())->clear();
        
        Router::redirect("/cart");
    }
}