<?php

namespace Modules\Admin\Models;

use Phalcon\Mvc\Model as PhalconMvcModel;

class Model extends PhalconMvcModel
{
    //
    public function initialize()
    {
        $this->setSource($this->table);
    }
}
