<?php


class Cart
{
    private $products;

    /**
     * Cart constructor.
     */
    function __construct()
    {
        $this->products = Cookie::get('books') == null ? array():unserialize(Cookie::get('books'));
    }

    /**
     * @return array|mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function addProduct($id)
    {
        $id = (int)$id;

        if (in_array($id, $this->products)) {
            Session::setFlash('Книгa уже добавлена в корзину!');

    }
        else{
            array_push($this->products, $id);
            Session::setFlash('Книга успешно добавлена в корзину!');
        }
        Cookie::set('books', serialize($this->products));

    }

        public
        function deleteProduct($id)
        {
            $id = (int)$id;

            $key = array_search($id, $this->products);
            if ($key !== false) {
                unset($this->products[$key]);
            }
        }

        public function clear()
        {
            Cookie::remove('books');
        }

    public function isEmpty()
    {
        return !$this->products;
    }



}