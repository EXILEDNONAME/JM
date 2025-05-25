<?php

namespace App\Imports\Backend\__Main\Intercome;

use App\Models\Backend\__Main\Intercome;
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
      return new Intercome([
        "col_1" => $row[1],
        "col_2" => $row[2],
        "col_3" => $row[3],
        "col_4" => $row[4],
      ]);
    }
}
