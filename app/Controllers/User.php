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

}
