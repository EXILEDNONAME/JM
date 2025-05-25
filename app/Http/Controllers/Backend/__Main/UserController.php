<?php

namespace App\Http\Controllers\Backend\__Main;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Shuchkin\SimpleXLSX;

use App\Models\Backend\__Main\User;
use App\Imports\Backend\__Main\User\ImportSheet;

class UserController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\User';
    $this->path = 'pages.backend.__main.user.';
    $this->url = '/dashboard/users';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get()->skip(1); }
    else { $this->data = $this->model::where('col_11', 'AKTIF')->get(); }
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
      ->editColumn('progress', function ($order) {
        $progress = 0;
        if (!empty($order->col_1)) { $progress = $progress + 1; }
        if (!empty($order->col_2)) { $progress = $progress + 1; }
        if (!empty($order->col_3)) { $progress = $progress + 1; }
        if (!empty($order->col_4)) { $progress = $progress + 1; }
        if (!empty($order->col_5)) { $progress = $progress + 1; }
        if (!empty($order->col_6)) { $progress = $progress + 1; }
        if (!empty($order->col_7)) { $progress = $progress + 1; }
        if (!empty($order->col_8)) { $progress = $progress + 1; }
        if (!empty($order->col_9)) { $progress = $progress + 1; }
        $total = round(($progress/9) * 100, 2);

        if ($total < 50) { $background = 'bg-danger'; }
        else if ($total < 100) { $background = 'bg-warning'; }
        else if ($total == 100) { $background = 'bg-success'; }
        else { $background = 'bg-warning'; }
        return '
        <div class="progress">
        <div class="progress-bar ' . $background . '" role="progressbar" style="width:' . $total . '%;" aria-valuenow="'. $total . '" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        ';
      })
      ->rawColumns(['description', 'progress'])
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
    $sheet_filename = env('SHEET_FILENAME_USER');
    $sheet_key = env('SHEET_KEY_USER');
    $sheet_gid = env('SHEET_GID_USER');
    $sheet_link = 'https://docs.google.com/spreadsheets/d/' . $sheet_key . '/export?gid=' . $sheet_gid . '&format=csv';
    Storage::disk('public')->put($sheet_filename . '.csv', file_get_contents($sheet_link));
    User::truncate();
    $sheet_file = Storage::disk('public')->path($sheet_filename . '.csv');
    Excel::import(new ImportSheet, $sheet_file);
  }

}
