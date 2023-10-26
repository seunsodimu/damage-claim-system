<?php namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function userProfile()
    {
        // Display user profile
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('userData')['id'])->first();
        $data['title'] = 'User Profile';
        return view('my_profile', $data);
    }

    function updateProfile()
    {
        // Update user profile
        $request = \Config\Services::request();
        $id = session()->get('userData')['id'];
        $userModel = new UserModel();
        $user = $userModel->where('id', $id)->first();

        
        //check if password is updated
        $password = $this->request->getVar('Password');
        if ($password) {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'Password' => 'required|min_length[8]',
                'Password_confirm' => 'required|matches[Password]'
            ]);
        
            if (!$validation->withRequest($request)->run()) {
                // Validation failed
                return redirect()->to(base_url('my-profile'))->withInput()->with('errors', $validation->getErrors());
            }
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
        return redirect()->to(base_url('my-profile'))->with('success', 'Profile updated successfully');
    }
}
