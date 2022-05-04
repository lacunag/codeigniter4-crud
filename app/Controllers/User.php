<?php

namespace App\Controllers;
use App\Models\UserModel;


class User extends BaseController
{

    public function __construct()
	{
        // LOAD MODEL
		$this->UserModel 	= new UserModel();
		helper(['url', 'form']);
	}

    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id_users', 'DESC')->findAll();

        echo view('template/header');
		echo view('list_users', $data);
		echo view('template/footer');
    }         
	
	public function create()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
			'name' 		=> 'required|min_length[3]|max_length[40]|alpha',
			'last_name'	=> 'required|min_length[3]|max_length[40]|alpha',
			'mail'	=> 'required|valid_email',
			'phone'	=> 'required|numeric',
		])) {
			$resp = $this->UserModel->save([
				'name' 		=> $this->request->getPost('name'),
				'last_name'	=> $this->request->getPost('last_name'),
				'mail'  	=> $this->request->getPost('mail'),
                'phone'  	=> $this->request->getPost('phone'),
			]);


			if (!$resp) {
				return redirect()->to('/user/create')->with('item', 'Intente nuevamente');
			} else {
				return redirect()->to('/user')->with('item', 'Procedimiento realizado con éxito');
			}

			
		} else {
			//$data['title'] = 'Crear Usuario';
			echo view('template/header');
			echo view('create_user');
			echo view('template/footer');
		}
    
    }

}
