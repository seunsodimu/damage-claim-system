<?php namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        // Display login view
        $data = [];
       // helper(['form']);
        // echo view('templates/header', $data);
        echo view('auth/login');
        // echo view('templates/footer');
    }

    public function attemptLogin()
    {
        // Get the request object
        $request = \Config\Services::request();
    
        // Get input data
        $username = $request->getPost('Username');
        $password = $request->getPost('Password');
    
        // Load the user model
        $userModel = new UserModel();
    
        // Check if the user exists
        $user = $userModel->where('username', $username)->first();
    
        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session data
                $session = session();
                $session->set('isLoggedIn', true);
                $session->set('userData', $user);
    
                // Redirect to a dashboard or home page
                return redirect()->to(base_url('dashboard'));
            } else {
                // Password is incorrect
                return redirect()->to(base_url('login'))->with('error', 'Incorrect password.');
            }
        } else {
            // User does not exist
            return redirect()->to(base_url('login'))->with('error', 'User not found.');
        }
    }
    

    public function register()
    {
        // Display registration view
    }

    public function attemptRegister()
    {
        // Get the request object
        $request = \Config\Services::request();
    
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'Username' => 'required|is_unique[users.username]',
            'Password' => 'required|min_length[8]',
            'Password_confirm' => 'required|matches[Password]'
        ]);
    
        if (!$validation->withRequest($request)->run()) {
            // Validation failed
            return redirect()->to(base_url('admin/users'))->withInput()->with('errors', $validation->getErrors());
        }
    
        // Hash the password
        $hashedPassword = password_hash($request->getPost('Password'), PASSWORD_DEFAULT);
    
        // Store user data
        $userModel = new UserModel();
        $userModel->save([
            'username' => $request->getPost('Username'),
            'first_name' => $request->getPost('FirstName'),
            'last_name' => $request->getPost('LastName'),
            'role_id' => $request->getPost('Role'),
            'password' => $hashedPassword
        ]);
    
    
        // Redirect to a success page or login page
        return redirect()->to(base_url('admin/users#list'))->with('success', 'New user succesfully created!');
    }

    public function logout()
{
    // Destroy the session data
    session()->destroy();

    // Redirect to the login page or another appropriate page
    return redirect()->to(base_url('login'))->with('success', 'You have been logged out successfully.');
}

}
