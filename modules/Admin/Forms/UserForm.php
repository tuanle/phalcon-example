<?php

namespace Modules\Admin\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class UserForm extends Form
{
    /**
     * This method returns the default value for field 'csrf'
     */
    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($entity = null, $options = [])
    {
        $id = isset($options['edit']) ? new Hidden('id') : new Text('id');
        $this->add($id);

        $name = new Text('name');
        $name->addValidators([
            new PresenceOf(['message' => 'The name is required'])
        ]);
        $this->add($name);

        $email = new Text('email');
        $email->addValidators([
            new PresenceOf(['message' => 'The email is required'])
        ]);
        $email->addValidators([
            new Email(['message' => 'The e-mail is not valid'])
        ]);
        $this->add($email);

        // Add a text element to put a hidden CSRF
        $this->add(new Hidden('csrf'));
    }
}
