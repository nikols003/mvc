<?php


abstract class controller
{
    protected function render ($viewName, array $args = array()) {

        extract($args);
        $tpldir = str_replace('Controller', '', get_class($this));

        $file = VIEW_DIR . $tpldir . DS . $viewName . '.phtml';

        if (!file_exists($file)){
            throw new Exception("{$file} not found");
        }

        ob_start();
        require $file;
        $content = ob_get_clean();

        ob_start();
        require VIEW_DIR . 'default_layout.phtml';;
        return ob_get_clean();


        ob_start();
        $file = VIEW_DIR . $tpldir . DS . $viewName . '.phtml';
        if (!file_exists($file)){
            throw new Exception("{$file} not found");
        }
        require VIEW_DIR . $tpldir . DS . $viewName . '.phtml';
        return ob_get_clean();

    }

    public static function renderError($code, $message)
    {
        ob_start();
        require VIEW_DIR . 'error.phtml';

        $content = ob_get_clean();

        ob_start();
        require VIEW_DIR . 'default_layout.phtml';;

        return ob_get_clean();
    }
}