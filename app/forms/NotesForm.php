<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 5.8.2018 г.
 * Time: 15:57 ч.
 */

namespace App\Forms;


use App\Models\Notes;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;

class NotesForm extends Form
{
    public function initialize(Notes $note = null, $options = null)
    {
        $this->setEntity($note);

        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }
        $this->add($id);

        $this->add(
            new TextArea(
                "comment"
            )
        );

        $this->add(
            new Select('status', [
                'open'  => 'Open',
                'inProgress'  => 'In Progress',
                'finished' => 'Finished',
            ])
        );

    }
}