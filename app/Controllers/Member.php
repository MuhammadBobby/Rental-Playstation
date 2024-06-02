<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{

    protected $memberModel;

    // construct untuk db
    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        }

        $data = [
            'title' => "Dashboard | Member Data",
            'member' => $this->memberModel->getMember()
        ];
        return view('pages/member/index', $data);
    }

    // create
    public function create()
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        }
        $data = [
            'title' => "Dashboard | Create Data",
            'validation' => \Config\Services::validation()
        ];
        return view('pages/member/create', $data);
    }

    // save
    public function save()
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        }

        // validation
        $rules = [
            'Nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name of the member item must be filled in.',
                ]
            ],
            'Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Address of the member item must be filled in.',
                ]
            ],
            'Telepon' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Telephone of the member item must be filled in.',
                ]
            ],
            'Email' =>  [
                'rules' => 'valid_email|is_unique[member.Email]',
                'errors' => [
                    'required' => 'Sorry. That email has already been taken. Please choose another.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'Nama' => $this->request->getVar('Nama'),
            'Alamat' => $this->request->getVar('Alamat'),
            'Telepon' => $this->request->getVar('Telepon'),
            'Email' => $this->request->getVar('Email'),
        ];
        $this->memberModel->save($data);

        // flash data
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/member');
    }

    // edit
    public function edit($id)
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        }

        $data = [
            'title' => "Dashboard | Edit Data",
            'member' => $this->memberModel->getMember($id),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/member/edit', $data);
    }


    // update
    public function update($id)
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        }
        // validation
        $rules = [
            'Nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name of the member item must be filled in.',
                ]
            ],
            'Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Address of the member item must be filled in.',
                ]
            ],
            'Telepon' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Telephone of the member item must be filled in.',
                ]
            ],
            'Email' =>  [
                'rules' => 'valid_email|is_unique[member.Email]',
                'errors' => [
                    'required' => 'Sorry. That email has already been taken. Please choose another.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'MemberID' => $id,
            'Nama' => $this->request->getVar('Nama'),
            'Alamat' => $this->request->getVar('Alamat'),
            'Telepon' => $this->request->getVar('Telepon'),
            'Email' => $this->request->getVar('Email'),
        ];
        $this->memberModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/member');
    }

    // remove
    public function delete($id)
    {
        if (session()->get('login') != true) {
            return redirect()->to('/');
        }
        $this->memberModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/member');
    }
}
