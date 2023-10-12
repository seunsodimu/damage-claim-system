<?php namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function users()
    {
        // List all users
        $model = new UserModel();
        $data['users'] = $model->orderBy('id', 'DESC')->findAll();
        $data['title'] = 'Users';
        return view('users', $data);
    }

    public function editUser($id)
    {
        // Display user edit form
    }

    public function updateUser($id)
    {
        // Update user
    }

    public function deleteUser()
    {
        //delete user
        $id = $this->request->getVar('user_id');
        $userModel = new UserModel();
        $userModel->delete($id);
        if ($userModel) {
            echo json_encode("success");
        } else {
           echo json_encode("error");
        }

    }
}
