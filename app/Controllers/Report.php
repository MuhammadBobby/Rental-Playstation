<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\InventarisModel;
use App\Models\MemberModel;
use App\Models\StaffModel;
use \Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends BaseController
{
    protected $bookingModel;
    protected $inventarisModel;
    protected $memberModel;
    protected $staffModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        $this->inventarisModel = new InventarisModel();
        $this->memberModel = new MemberModel();
        $this->staffModel = new StaffModel();
    }

    public function booking()
    {
        if (session()->get('level') == 1) {
            $dompdf = new Dompdf();
            $data = [
                'title' => 'Booking Reports',
                'booking' => $this->bookingModel->getBooking(),
            ];

            $html =  view('report/booking', $data);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->loadHtml($html);
            $dompdf->render();
            $dompdf->stream('Booking Reports.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function inventaris()
    {
        if (session()->get('level') == 1) {
            $dompdf = new Dompdf();
            $data = [
                'title' => 'Inventaris Reports',
                'inventaris' => $this->inventarisModel->getInventaris()
            ];

            $html =  view('report/inventaris', $data);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->loadHtml($html);
            $dompdf->render();
            $dompdf->stream('Inventaris Reports.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function member()
    {
        if (session()->get('level') == 1) {
            $dompdf = new Dompdf();
            $data = [
                'title' => 'Member Reports',
                'members' => $this->memberModel->getMember()
            ];

            $html =  view('report/member', $data);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->loadHtml($html);
            $dompdf->render();
            $dompdf->stream('Member Reports.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function staff()
    {
        if (session()->get('level') == 1) {
            $dompdf = new Dompdf();
            $data = [
                'title' => 'Staff Reports',
                'staffs' => $this->staffModel->getStaff()
            ];

            $html =  view('report/staff', $data);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->loadHtml($html);
            $dompdf->render();
            $dompdf->stream('Staff Reports.pdf', ['Attachment' => 0]);
        } else {
            return redirect()->to('/dashboard');
        }
    }


    // report excel
    public function reportExcel()
    {
        if (session()->get('level') != 1) {
            return redirect()->to('/dashboard');
        }

        $info = $this->bookingModel->getBooking();
        $fileName = 'Booking.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Member');
        $sheet->setCellValue('C1', 'Staff');
        $sheet->setCellValue('D1', 'Duration');
        $sheet->setCellValue('E1', 'Type Playstation');
        $sheet->setCellValue('F1', 'Booking Date Time');
        $sheet->setCellValue('G1', 'Finish Date Time');
        $sheet->setCellValue('H1', 'Total Price');

        $rows = 2;
        foreach ($info as $a) {
            $sheet->setCellValue('B' . $rows, $a['NamaMember']);
            $sheet->setCellValue('C' . $rows, $a['NamaStaff']);
            $sheet->setCellValue('D' . $rows, $a['Durasi']);
            $sheet->setCellValue('E' . $rows, $a['NamaBarang']);
            $sheet->setCellValue('F' . $rows, $a['TanggalPemesanan']);
            $sheet->setCellValue('G' . $rows, $a['WaktuBerakhir']);
            $sheet->setCellValue('H' . $rows, $a['TotalBiaya']);
            $rows++;
        }

        header('Content-Type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;fileName=' . $fileName);
        // header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
