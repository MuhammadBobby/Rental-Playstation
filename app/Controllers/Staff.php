<?php

namespace App\Controllers;

use App\Models\StaffModel;

class Staff extends BaseController
{

    protected $staffModel;

    // construct untuk db
    public function __construct()
    {
        $this->staffModel = new StaffModel();
    }

    public function index()
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        } else if (session()->get('level') != 1) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => "Dashboard | Staff Data",
            'staff' => $this->staffModel->getStaff()
        ];
        return view('pages/staff/index', $data);
    }

    // create
    public function create()
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        } else if (session()->get('level') != 1) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => "Dashboard | Create Data",
            'validation' => \Config\Services::validation()
        ];
        return view('pages/staff/create', $data);
    }

    // save
    public function save()
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        } else if (session()->get('level') != 1) {
            return redirect()->to('/dashboard');
        }
        // validation
        $rules = [
            'Nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name of the staff item must be filled in.',
                ]
            ],
            'username' => [
                'rules' => 'required', 'is_unique[staff.username]',
                'errors' => [
                    'required' => 'The Username of the staff item must be filled in.',
                    'is_unique' => 'The Username has already been taken.',
                ]
            ],
            'password' => [
                'rules' => 'required', 'matches[password2]',
                'errors' => [
                    'required' => 'The Name of the staff item must be filled in.',
                    'matches' => 'The password dont match.',
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Level of the staff item must be filled in.',
                ]
            ],
            'Shift' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Shift of the staff item must be filled in.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'Nama' => $this->request->getVar('Nama'),
            'Shift' => $this->request->getVar('Shift'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
        ];
        $this->staffModel->save($data);

        // flash data
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/staff');
    }

    // edit
    public function edit($id)
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        } else if (session()->get('level') != 1) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => "Dashboard | Edit Data",
            'staff' => $this->staffModel->getStaff($id),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/staff/edit', $data);
    }


    // update
    public function update($id)
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        } else if (session()->get('level') != 1) {
            return redirect()->to('/dashboard');
        }
        // validation
        $rules = [
            'Nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name of the staff item must be filled in.',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Username of the staff item must be filled in.',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name of the staff item must be filled in.',
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Level of the staff item must be filled in.',
                ]
            ],
            'Shift' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Shift of the staff item must be filled in.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'PenjagaID' => $id,
            'Nama' => $this->request->getVar('Nama'),
            'Shift' => $this->request->getVar('Shift'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
        ];
        $this->staffModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/staff');
    }

    // remove
    public function delete($id)
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        } else if (session()->get('level') != 1) {
            return redirect()->to('/dashboard');
        }
        $this->staffModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/staff');
    }
}
