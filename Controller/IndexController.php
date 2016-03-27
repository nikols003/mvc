<?php


class IndexController extends Controller
{
    public function indexAction(Request $request)
    {

        $model = new PageModel();
        $page = $model->findByAlias('homepage');



        $args = array('page'=>$page,
                      'var2'=>'hello');
        return $this->render('index', $args);
    }



    public function contactAction(Request $request)
    {
        $form = new ContactForm($request);


        if ($request->isPost()){
            if ($form->isValid()){
                (new FeedbackModel())->save(array(
                    'username' => $form->username,
                    'email' => $form->email,
                    'message' => $form->message,
                    'created' => (new datetime())->format('Y-m-d H:i:s'),
                    'ip' => $request->getIpAddress()
                ));


            Session::setFlash('Message sent');
            Router::redirect('/contact-us');
            }
            Session::setFlash('Fill the fields');

        }

//        $args = array('form'=> $form, 'flash'=>$flash);



        Metahelper::setTitle('Contact Us');

        $args = compact('form', 'flash');

        return $this->render('contact', $args);
    }
}