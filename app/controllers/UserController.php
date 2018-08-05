<?php

use App\Forms\UsersForm;
use App\Models\Users;

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function logoutAction()
    {
        $sessions = $this->getDI()->getShared('session');
        $sessions->remove('user_id');
        $sessions->remove('username');
        $this->response->redirect('');
    }

    public function loginAction()
    {
        $sessions = $this->getDI()->getShared("session");

        $form = new UsersForm();
        if($this->request->isPost()){
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = Users::findFirst([
                'conditions' => 'username = ?0',
                'bind' => [
                    0 => $username,
                ]
            ]);


            if(!$this->security->checkHash($password, $user->password)){
                echo 'Invalid Credentials!';
            } else {
                $sessions->set('user_id', $user->id);
                $sessions->set('username', $user->username);
                $this->response->redirect('');
            }
        }
        $this->view->form = $form;
    }

    public function registerAction()
    {
        $user = new Users();
        $form = new UsersForm($user);
        if($this->request->isPost()){
            $form->bind($this->request->getPost(),$user);

            // Getting Password from the request.
            $password = $user->password;

            // Hashing the password and bind it to the new user.
            $user->password = $this->security->hash($password);
            $success = $user->save();

            // Check for operation success and handling errors.
            if ($success) {
                echo 'Thanks you for register in out site!';
                $this->response->redirect('user/login');
            } else {
                echo 'Oops, Something Went Wrong';
                $messages = $user->getMessages();

                foreach ($messages as $message) {
                    echo $message->getMessage();
                }
            }
        }

        $this->view->form = $form;
        $this->view->pick('user/register');
    }
}

