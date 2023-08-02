<?php

namespace App\Classes;

use App\Models\User;

class MyClass {
    public $time;

    public function __construct($date)
    {
        $this->time = strtotime($date);
    }

    public function genDate($lang = true): String
    {
        $y = $lang ? ' พ.ศ. ' : ' ค.ศ. ' ;
        $text = 'วันที่ %s เดือน%s ' . $y . '%s เวลา %s';
        $month_text = [
            1 => ['th' => 'มกราคม', 'en' => 'January'],
            2 => ['th' => 'กุมภาพันธ์', 'en' => 'Febuary'],
            3 => ['th' => 'มีนาคม', 'en' => 'March'],
            4 => ['th' => 'เมษายน', 'en' => 'April'],
            5 => ['th' => 'พฤษภาคม', 'en' => 'May'],
            6 => ['th' => 'มิถุนายน', 'en' => 'June'],
            7 => ['th' => 'กรกฎาคม', 'en' => 'July'],
            8 => ['th' => 'สิงหาคม', 'en' => 'August'],
            9 => ['th' => 'กันยายน', 'en' => 'September'],
            10 => ['th' => 'ตุลาคม', 'en' => 'October'],
            11 => ['th' => 'พฤศจิกายน', 'en' => 'November'],
            12 => ['th' => 'ธันวาคม', 'en' => 'December'],
        ];

        $year = date('Y', $this->time) + ($lang ? 543 : 0);
        $month = (Int) date('m',$this->time);
        $day = date('d',$this->time);
        $t = date('H:i',$this->time);

        return sprintf($text,$day,$month_text[$month][$lang ? 'th' : 'en'],$year,$t);
    }
}
