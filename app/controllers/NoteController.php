<?php


use App\Forms\NotesForm;
use App\Models\Notes;
use App\Models\Users;

class NoteController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function createAction()
    {
        $note = new Notes();
        $form = new NotesForm($note);

        if ($this->request->isPost()) {
            $form->bind($this->request->getPost(),$note);
            $sessions = $this->getDI()->getShared('session');

            $username = $sessions->get('username');
            /** @var Users $user */
            $user = Users::findFirst([
                'conditions' => 'username = ?0',
                'bind' => [
                    0 => $username,
                ]
            ]);

            $note->Owner = $user;
            $result = $note->save();

            if ($result) {
                $this->response->redirect('');
            } else {
                echo 'Oops, Error!';
                var_dump($note->getMessages());
                die;
            }
        }
        $this->view->form = $form;
    }

    public function editAction(){
        $noteID = $this->dispatcher->getParam(0);
        $note = Notes::findFirst([
            'id = ?0',
            'bind' => [
                0 => $noteID
            ]
        ]);
        $form = new NotesForm($note, ['edit' => true]);

        if($this->request->isPost()){
            $form->bind($this->request->getPost(),$note);
            $note->update();
            $this->response->redirect('');
        }
        $this->view->form = $form;
    }


    public function deleteAction(){
        $noteID = $this->dispatcher->getParam(0);
        $note = Notes::findFirst([
            'id = ?0',
            'bind' => [
                0 => $noteID
            ]
        ]);
        $note->delete();
        $this->response->redirect('');
    }
}

