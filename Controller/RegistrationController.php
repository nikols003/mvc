<?php

/**
 * Created by PhpStorm.
 * User: Максим
 * Date: 27.03.2016
 * Time: 12:56
 */
class RegistrationController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = new RegistrationForm($request);

        if ($request->isPost()) {
            if ($form->isValid()) {
                (new RegistrationModel())->save(array(
                    'email' => $form->email,
                    'name' => $form->name,
                    'password' => ((new Password($form->password))),
                    'created' => (new datetime())->format('Y-m-d H:i:s'),
                ));


                Session::setFlash('Юзер мать его креєйтед!');
                Router::redirect('/registration');
            }
            Session::setFlash('Fill the fields');
        }

        Metahelper::setTitle('Register');
        $args = compact('form');

        return $this->render('index', $args);
    }


}