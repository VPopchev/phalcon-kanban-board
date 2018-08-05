<?php

use App\Models\Notes;
use App\Models\Users;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $sessions = $this->getDI()->getShared('session');
        $username = $sessions->get('username');

        $this->view->loggedUser = false;
        if (null !== $username) {
            $this->view->loggedUser = true;
            $user = Users::findFirst([
                'conditions' => 'username = ?0',
                'bind' => [
                    0 => $sessions->get('username'),
                ]
            ]);

            $this->view->username = $username;
            $this->view->sessions = $sessions;
            $this->view->openNotes = Notes::find([
                "status = 'open' AND user_id = ?0",
                "bind" => [
                    0 => $user->id
                ]
            ]);

            $this->view->inProgressNotes = Notes::find([
                "status = 'inProgress' AND user_id = ?0",
                "bind" => [
                    0 => $user->id
                ]
            ]);

            $this->view->finishedNotes = Notes::find([
                "status = 'finished' AND user_id = ?0",
                "bind" => [
                    0 => $user->id
                ]
            ]);
        }
        $this->view->pick('index/index');
    }

}

