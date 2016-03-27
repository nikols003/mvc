<?php


class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $form = new LoginForm($request);


        if ($request->isPost()){
            if($form->isValid()){
                $model = new UserModel();
                $password = new Password($form->password);
                $email = $form->email;
                if($user = $model->find($email, $password)){
                    if($user['status'] == 1){
                        Session::set('user', $user['name'] );
                        Session::setFlash('Loged');
                        Router::redirect('/admin');
                    }
                    Session::setFlash("User {$user['name']} was banned!");
                    Router::redirect('/login');
                }
//                if($user['status'] = 0){
//                    Session::setFlash("User {$user['name']} was banned!");
//                    Router::redirect('/login');
//                }
                Session::setFlash('This user not found');
                Router::redirect('/login');
            }
            Session::setFlash('Fill the fields');
        }

        return $this->render('login', compact('form'));

    }

    public function adminAction(Request $request)
    {
        if(!Session::has('user')){
            Router::redirect('/');
        }
        return $this->render('admin', compact('form'));
    }

    public function logoutAction(Request $request)
    {
        Session::remove('user');
        Router::redirect('/');
    }
}