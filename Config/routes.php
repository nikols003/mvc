<?php
return  array(
    // some default routes
    'default' => new Route('/', 'Index', 'index'),
    'index_php' => new Route('/index.php', 'Index', 'index'),
    // others
    'books_list' => new Route('/books', 'Book', 'index'),
    'news' => new Route('/news', 'News', 'index'),
    'news_page' => new Route('/news-{id}', 'News', 'show', array('id' => '[0-9]+') ),
    'author' => new Route('/author-{id}', 'Author', 'index', array('id' => '[0-9]+') ),
    'book_page' => new Route('/book-{id}\.html', 'Book', 'show', array('id' => '[0-9]+') ),
    'contact_us' => new Route('/contact-us', 'Index', 'contact'),
    'cart_add' => new Route('/add/{id}', 'Cart', 'add', array('id' => '[0-9]+') ),
    'cart_list' => new Route('/cart', 'Cart', 'index'),
    'cart_clear' => new Route('/cart/clear', 'Cart', 'clear'),
    'registry' => new Route('/registration', 'registration', 'index'),
    'login' => new Route('/login', 'Security', 'login'),
    'logout' => new Route('/logout', 'Security', 'logout'),
    'admin_test' => new Route('/admin', 'Security', 'admin'),
//     'devionity_style' => new Route('/_Book/_index', 'Book', 'index')
);