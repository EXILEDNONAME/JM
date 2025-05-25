<?php

namespace App\Http\Controllers\Backend\__Main;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Shuchkin\SimpleXLSX;

use App\Models\Backend\__Main\Intercome;
use App\Imports\Backend\__Main\Intercome\ImportSheet;

class IntercomeController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\Intercome';
    $this->path = 'pages.backend.__main.intercome.';
    $this->url = '/dashboard/intercomes';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get()->skip(1); }
    else { $this->data = $this->model::get(); }
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
      ->rawColumns(['description'])
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
    $sheet_filename = env('SHEET_FILENAME_INTERCOME');
    $sheet_key = env('SHEET_KEY_INTERCOME');
    $sheet_gid = env('SHEET_GID_INTERCOME');
    $sheet_link = 'https://docs.google.com/spreadsheets/d/' . $sheet_key . '/export?gid=' . $sheet_gid . '&format=csv';
    Storage::disk('public')->put($sheet_filename . '.csv', file_get_contents($sheet_link));
    Intercome::truncate();
    $sheet_file = Storage::disk('public')->path($sheet_filename . '.csv');
    Excel::import(new ImportSheet, $sheet_file);
  }

}
