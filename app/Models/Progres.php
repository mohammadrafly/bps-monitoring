<?php

namespace App\Models;

use CodeIgniter\Model;

class Progres extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'progres';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_ks',
        'id_operator',
        'target',
        'realisasi',
        'total_absolut',
        'created_at',
        'created_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    private function lastWeek($datetime) {
        $date = new \DateTime($datetime);
        $currentDay = $date->format('w');
        $daysAgo = ($currentDay == 0) ? 6 : ($currentDay - 1);
        $date->modify('-' . $daysAgo . ' days');
        return $date->format("Y-m-d H:i:s");
    }

    private function getWeekStartDate($datetime) {
        $dateObj = new \DateTime($datetime);
        $currentDay = $dateObj->format('w');
        $daysToMonday = ($currentDay == 0) ? 6 : ($currentDay - 1);
        $dateObj->modify('-' . $daysToMonday . ' days')->setTime(0, 0, 0);
        return $dateObj->format("Y-m-d H:i:s");
    }

    function getTotalLastWeek() {
        $currentDateTime = new \DateTime();
        $formattedDateTime = $currentDateTime->format("Y-m-d H:i:s");

        $lastWeekDate = $this->lastWeek($formattedDateTime);

        $totalLastWeek = $this->db->table('progres')->where('created_at <=', $lastWeekDate)->countAllResults();
        return $totalLastWeek;
    }

    function getTotalThisWeek() {
        $currentDateTime = new \DateTime();
        $formattedDateTime = $currentDateTime->format("Y-m-d H:i:s");
    
        $thisWeekStartDate = $this->getWeekStartDate($formattedDateTime);

        $totalThisWeek = $this->db->table('progres')->where('created_at >=', $thisWeekStartDate)->countAllResults();
        return $totalThisWeek;
    }

    function getDataThisWeek() {
        $currentDateTime = new \DateTime();
        $formattedDateTime = $currentDateTime->format("Y-m-d H:i:s");
    
        $thisWeekStartDate = $this->getWeekStartDate($formattedDateTime);

        $totalThisWeek = $this->db->table('progres')
            ->select('
                progres.*,
                user.name as name
            ')
            ->join('user', 'progres.id_operator = user.id')
            ->where('progres.created_at >=', $thisWeekStartDate);
        return $totalThisWeek;
    }
    
    function getPercentageSurplus() {
        $totalLastWeek = $this->getTotalLastWeek();
        $totalThisWeek = $this->getTotalThisWeek();

        if ($totalLastWeek == 0) {
            return 0;
        }

        $surplus = $totalThisWeek - $totalLastWeek;
        $percentageSurplus = ($surplus / $totalLastWeek) * 100;

        return $percentageSurplus;
    }

    public function getDataForLast7Days() {
        $currentDateTime = new \DateTime();
        $formattedDateTime = $currentDateTime->format("Y-m-d H:i:s");

        $lastWeekDate = $this->lastWeek($formattedDateTime);

        $result = $this->db->table('progres')
            ->select('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at >=', $lastWeekDate)
            ->groupBy('DATE(created_at)')
            ->get()
            ->getResultArray();

        $chartData = [];
        $dates = [];

        foreach ($result as $row) {
            $dates[] = $row['date'];
            $chartData[] = $row['total'];
        }

        return ['dates' => $dates, 'chartData' => $chartData];
    }

    public function getDataByRangeDate($start, $end) {
        return $this->db->table('progres')
            ->where('DATE(created_at) >=', $start)
            ->where('DATE(created_at) <=', $end)
            ->get()
            ->getResultArray();
    }    

    public function getAllData() {
        return $this->db->table('progres')
            ->select('
                tanaman.nama_tanaman,
                progres.*,
                user.*
            ')
            ->join('tanaman', 'progres.nama_ks = tanaman.id')
            ->join('user', 'progres.id_operator = user.id')
            ->orderBy('progres.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getDataById($id) {
        return $this->db->table('progres')
            ->select('
                tanaman.nama_tanaman,
                progres.*,
                user.name as name
            ')
            ->join('tanaman', 'progres.nama_ks = tanaman.id')
            ->join('user', 'progres.id_operator = user.id')
            ->where('id_operator', $id)
            ->orderBy('progres.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}
