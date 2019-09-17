<?php

namespace Modules\Admin\Services;

use Modules\Admin\Services\Interfaces\UserServiceInterface;
use Modules\Admin\Services\Service as AdminService;
use Modules\Admin\Models\User;

class UserService extends AdminService implements UserServiceInterface
{
    public function search()
    {
        $users = User::query();
        return $users->execute();
    }
}
