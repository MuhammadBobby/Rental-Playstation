<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Jakarta');

use App\Models\BookingModel;
use App\Models\InventarisModel;
use App\Models\MemberModel;
use App\Models\StaffModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use DateInterval;
use DateTime;


class Booking extends BaseController
{

    protected $bookingModel;
    protected $memberModel;
    protected $staffModel;
    protected $inventarisModel;

    // construct untuk db
    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        $this->memberModel = new MemberModel();
        $this->staffModel = new StaffModel();
        $this->inventarisModel = new InventarisModel();
    }

    public function index()
    {
        $data = [
            'title' => "Dashboard | Booking Transaction",
            'booking' => $this->bookingModel->getBooking()
        ];

        if (session()->get('login') == true) {
            return view('pages/booking/index', $data);
        } else {
            return redirect()->to('/');
        }
    }

    // create
    public function create()
    {
        $data = [
            'title' => "Dashboard | Create Data",
            'validation' => \Config\Services::validation(),
            'members' => $this->memberModel->getMember(),
            'staffs' => $this->staffModel->getStaff(),
            'inventaris' => $this->inventarisModel->getInventarisStatus()
        ];

        if (session()->get('login') == true) {
            return view('pages/booking/create', $data);
        } else {
            return redirect()->to('/');
        }
    }

    // save
    public function save()
    {
        if (session()->get('login') == true) {
            // validation
            $rules = [
                'MemberID' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The Member of the booking item must be filled in.',
                    ]
                ],
                'PenjagaID' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The Staff of the booking item must be filled in.',
                    ]
                ],
                'Durasi' =>  [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'The Duration of the booking item must be filled in.',
                        'numeric' => 'The Duration of the booking item must be numeric.',
                    ]
                ],
                'JenisPS' =>  [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The Type Playstation of the booking item must be filled in.',
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                $validation = \Config\Services::validation();
                return redirect()->back()->withInput()->with('validation', $validation);
            }

            // Memanggil fungsi uploadImage untuk mengelola upload gambar
            $gambar = $this->bookingModel->uploadImage();

            // perhitungan untuk biaya
            $Durasi = intval($this->request->getVar('Durasi'));
            $JenisPS = intval($this->request->getVar('JenisPS'));
            $TotalBiaya = $this->inventarisModel->countBiaya($Durasi, $JenisPS);

            // perhitungan tanggal berkakhir
            $dateTime = new DateTime(date('Y-m-d H:i:s'));
            $dateTime->add(new DateInterval("PT{$Durasi}H"));
            $waktuAkhir = $dateTime->format('Y-m-d H:i:s');
            // $waktuAkhir = new DateTime($waktuAkhir);

            $data = [
                'MemberID' => $this->request->getVar('MemberID'),
                'PenjagaID' => $this->request->getVar('PenjagaID'),
                'Durasi' => $Durasi,
                'JenisPS' => $JenisPS,
                'TanggalPemesanan' => date('Y-m-d H:i:s'),
                'WaktuBerakhir' => $waktuAkhir,
                'TotalBiaya' => $TotalBiaya,
                'Status' => 'Berjalan',
                'img' => $gambar
            ];
            $this->bookingModel->save($data);

            // update inventaris
            $this->inventarisModel->updateInventaris($JenisPS);

            // flash data
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to('/booking');
        } else {
            return redirect()->to('/');
        }
    }

    public function show($id)
    {
        $data = [
            'title' => "Dashboard | Show Data",
            'pemesanan' => $this->bookingModel->getBooking($id)
        ];

        if (session()->get('login') == true) {
            return view('pages/booking/detail', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function finish($id, $JenisPS)
    {
        if (session()->get('login') == true) {
            // update inventaris
            $this->inventarisModel->updateFinish($JenisPS);
            // update Status
            $this->bookingModel->updateStatus($id);
            session()->setFlashdata('pesan', 'Game Finished');
            return redirect()->to('/booking');
        } else {
            return redirect()->to('/');
        }
    }

    // remove
    public function delete($id)
    {
        if (session()->get('login') == true) {
            $this->bookingModel->delete($id);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
            return redirect()->to('/booking');
        } else {
            return redirect()->to('/');
        }
    }

    public function reportID($id)
    {
        if (session()->get('level') == 1) {
            $data = [
                'title' => "Report | " . $id,
                'pemesanan' => $this->bookingModel->getBooking($id)
            ];

            // $options = new Options();
            // $options->set('chroot', realpath(''));
            // $dompdf = new Dompdf($options);
            // $html =  view('report/bookingRecord', $data);
            // $dompdf->setPaper('A4', 'portrait');
            // $dompdf->loadHtml($html);
            // $dompdf->render();
            // $dompdf->stream('Reports-' . $id . '.pdf', ['Attachment' => 0]);

            return view('report/bookingRecord', $data);
        } else {
            return redirect()->to('/dashboard');
        }
    }
}
