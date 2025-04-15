<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\App;
use App\Exceptions\UsuarioNoEncontradoException;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->select('id, name, email') -> findAll();
        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create.html');
    }
    
    public function store() 
    {
        $model = new UserModel();

        // Valid data from the form
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insert data into the database
        if ($model->insert($data)) {
            return redirect()->to('/')->with('success', 'Successfully created user.');
        } else {
            return redirect()->back()->with('error', 'Error creating a user.');
        }
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        if(!$data['user'])
        {
            // Use my custom exception
            throw UsuarioNoEncontradoException::forUsuarioNoEncontrado($id);
        }
        return view('users/edit.html', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/');
    }
}