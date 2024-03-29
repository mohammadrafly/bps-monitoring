<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Progres as ProgresModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Tanaman;

class Progres extends BaseController
{
    private function createResponse($status, $icon, $title, $text)
    {
        return $this->response->setJSON([
            'status' => $status,
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
        ]);
    }
    
    public function index()
    {
        $model = new ProgresModel();
        $modelTanaman = new Tanaman();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_ks' => $this->request->getVar('nama_ks'),
                'id_operator' => session()->get('id'),
                'target' => 100,
                'realisasi' => $this->request->getVar('realisasi'),
                'total_absolut' => $this->request->getVar('total_absolut'),
            ];
    
            if ($model->insert($data) && session()->get('role') === 'operator') {
                return $this->createResponse(true, 'success', 'Success', 'berhasil membuat progres.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'gagal membuat progres.');
            }
        }

        $isAdmin = session()->get('role');
        return view('pages/dashboard/progres/index', [
        //dd([
            'data' => $isAdmin === 'admin' ? $model->getAllData() : $model->getDataById(session()->get('id')),
            'title' => 'Data Progres',
            'dataTanaman' => $modelTanaman->findAll(),
        ]);
    }

    public function edit($id)
    {
        $model = new ProgresModel();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_ks' => $this->request->getVar('nama_ks'),
                'target' => 100,
                'realisasi' => $this->request->getVar('realisasi'),
                'total_absolut' => $this->request->getVar('total_absolut'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
    
            if ($model->update($id, $data) && session()->get('id') === $this->request->getVar('id_operator')) {
                return $this->createResponse(true, 'success', 'Success', 'Progres telah diupdate.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'Progres gagal diupdate.');
            }
        }

        return $this->response->setJSON([
            'data' => $model->where('id', $id)->first(),
        ]);
    }

    public function delete($id)
    {
        $model = new ProgresModel();
        if (! $model->where('id', $id)->delete($id)) {
            return $this->createResponse(true, 'error', 'Failed', 'gagal menghapus progres.');
        } 
        return $this->createResponse(true, 'success', 'Success', 'berhasil menghapus progres.');
    }

    public function export()
    {
        $model = new ProgresModel();

        $start = date('Y-m-d', strtotime($this->request->getVar('start')));
        $end = date('Y-m-d', strtotime($this->request->getVar('end')));        
        
        $data = $model->getDataByRangeDate($start, $end);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $header = array_keys($data[0]);
        $sheet->fromArray([$header], null, 'A1');

        $sheet->fromArray($data, null, 'A2');

        $response = $this->response->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        $filename = 'export_' . date('YmdHis') . '.xlsx';
        $response->setHeader('Content-Disposition', 'attachment;filename="' . $filename . '"');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
