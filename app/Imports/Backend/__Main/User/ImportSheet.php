<?php

namespace App\Imports\Backend\__Main\User;

use App\Models\Backend\__Main\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSheet implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      return new User([
        "col_1" => $row[1],
        "col_2" => $row[2],
        "col_3" => $row[3],
        "col_4" => $row[4],
        "col_5" => $row[5],
        "col_6" => $row[6],
        "col_7" => $row[7],
        "col_8" => $row[8],
        "col_9" => $row[9],
        "col_10" => $row[10],
        "col_11" => $row[11],
        "col_12" => $row[12],
      ]);
    }
}
