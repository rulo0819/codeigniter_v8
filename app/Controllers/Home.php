<?php

namespace App\Controllers;

use CodeIgniter\Database\Exceptions\DatabaseException;
use Config\Database;

class Home extends BaseController
{
    public function index()
    {
        try {
            $db = Database::connect();
            $db->initialize();
            
            if (session()->get('logged_in')) {
                return redirect()->to('/lt3/dashboard');
            }
            
            return redirect()->to('/login');
            
        } catch (DatabaseException $e) {
            return view('welcome_message');
        }
    }
}
