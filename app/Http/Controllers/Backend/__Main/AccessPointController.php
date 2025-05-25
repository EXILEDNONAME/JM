<?php

namespace App\Http\Controllers\Backend\__Main;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Shuchkin\SimpleXLSX;

use App\Models\Backend\__Main\AccessPoint;
use App\Imports\Backend\__Main\AccessPoint\ImportSheet;

class AccessPointController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'role:master-administrator']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\AccessPoint';
    $this->path = 'pages.backend.__main.access-point.';
    $this->url = '/dashboard/access-points';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get()->skip(1); }
    else { $this->data = $this->model::get()->skip(1); }
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->editColumn('status_device', function($order) {
        if(!$socket = @fsockopen($order->col_1, 80, $errNo, $errStr, 0.01)) { return '<span class="label label-danger label-inline"> OFFLINE </span>'; }
        else { return '<span class="label label-success label-inline"> ONLINE </span>'; fclose($socket); }
      })
      ->rawColumns(['description', 'status_device'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return SYNC
  **************************************************
  **/

  public function synchronization() {
    $sheet_filename = env('SHEET_FILENAME_ACCESS_POINT');
    $sheet_key = env('SHEET_KEY_ACCESS_POINT');
    $sheet_gid = env('SHEET_GID_ACCESS_POINT');
    $sheet_link = 'https://docs.google.com/spreadsheets/d/' . $sheet_key . '/export?gid=' . $sheet_gid . '&format=csv';
    Storage::disk('public')->put($sheet_filename . '.csv', file_get_contents($sheet_link));
    AccessPoint::truncate();
    $sheet_file = Storage::disk('public')->path($sheet_filename . '.csv');
    Excel::import(new ImportSheet, $sheet_file);
  }

}
