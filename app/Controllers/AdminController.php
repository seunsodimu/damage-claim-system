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
        $data['action'] = 'list';
        return view('users', $data);
    }

    public function editUser($id)
    {
        // Display user edit form
        $model = new UserModel();
        $data['user'] = $model->where('id', $id)->first();
        $data['users'] = $model->orderBy('id', 'DESC')->findAll();
        $data['title'] = 'Edit ' . $data['user']['first_name'] . ' ' . $data['user']['last_name'];
        $data['action'] = 'edit';
        return view('users', $data);
    }

    public function updateUser($id)
    {
        // Update user
        $userModel = new UserModel();
        $user = $userModel->where('id', $id)->first();
        //validate input and ensure unique username
        $rules = [
            'Username' => 'required|is_unique[users.username,id,' . $id . ']',
            'Role' => 'required',
        ];
        //check if password is updated
        $password = $this->request->getVar('Password');
        if ($password) {
            $rules['Password'] = 'required|min_length[8]';
        }
        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['user'] = $user;
            $data['title'] = 'Edit ' . $data['user']['first_name'] . ' ' . $data['user']['last_name'];
            $data['action'] = 'edit';
            $page = 'admin/users/edit/' . $user['id'];
            return view($page, $data);
        }
        $data = [
            'first_name' => $this->request->getVar('FirstName'),
            'last_name'  => $this->request->getVar('LastName'),
            'username'  => $this->request->getVar('Username'),
            'role_id'  => $this->request->getVar('Role'),
        ];
        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $userModel->update($id, $data);
        return redirect()->to(base_url('admin/users/edit/'. $user['id']))->with('success', 'User updated successfully');
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
