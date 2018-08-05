<?php

use Phalcon\Forms\Element\Hidden;

/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 5.8.2018 г.
 * Time: 14:54 ч.
 */
namespace App\Forms;
use App\Models\Users;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;

class UsersForm extends Form
{
    public function initialize(Users $user = null, $options = null)
    {
        $this->setEntity($user);

        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        $this->add($id);

        $this->add(
            new Text(
                "username"
            )
        );

        $this->add(
            new Password(
                "password"
            )
        );
    }
}
