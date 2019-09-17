<?php

namespace Modules\Admin\Models;

use Modules\Admin\Models\Model as AdminModel;

class User extends AdminModel
{
    protected $table = 'users';

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;
}
