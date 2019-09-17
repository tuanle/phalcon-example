<?php

namespace Modules\Admin\Controllers;

use Modules\Admin\Controllers\Controller as AdminController;
use Modules\Admin\Services\Interfaces\UserServiceInterface;
use Modules\Admin\Forms\UserForm;
use Modules\Admin\Models\User;

class UsersController extends AdminController
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * Build the services that will be used in this controller
     */
    protected function onConstruct()
    {
        $this->userService = $this->getDi()->get(UserServiceInterface::class);
    }

    public function indexAction()
    {
        $users = $this->userService->search();

        $this->view->setVars(compact('users'));
        return $this->view->pick('users/index');
    }

    public function createAction()
    {
        $form = new UserForm();

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flashSession->message($message->getField(), $message->getMessage());
                }
            } else {
                $user = new User($this->request->getPost());
                if ($user->save()) {
                    return $this->response->redirect(['for' => 'admin.users.index']);
                } else {
                    dd($user->getMessages());
                }
            }
        }

        $this->view->setVars(compact('form'));
        return $this->view->pick('users/create');
    }

    public function editAction($id)
    {
        $user = User::findFirstById($id);
        $form = new UserForm($user, ['edit' => true]);

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flashSession->message($message->getField(), $message->getMessage());
                }
            } else {
                $user->assign($this->request->getPost());
                if ($user->save()) {
                    return $this->response->redirect(['for' => 'admin.users.index']);
                } else {
                    dd($user->getMessages());
                }
            }
        }

        $this->view->setVars(compact('user', 'form'));
        return $this->view->pick('users/edit');
    }
}
