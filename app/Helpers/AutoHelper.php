<?php

namespace App\Helpers;

/**
 * class for automatic calculation
 */
class AutoHelper
{
    private $monthIndo = array (
        1 =>   'Januari',
        'Pebruari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    public function getMonthIndo($index)
    {
        return $this->monthIndo[$index];
    }

    public function getAllMonth()
    {
        return $this->monthIndo;
    }

    public function formatDateIndo($date)
    {
        return $date->copy()->format('d')." ".$this->getMonthIndo($date->copy()->format('n'))." ".$date->copy()->format('Y');
    }
}