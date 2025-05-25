@extends('layouts.backend.__templates.index', ['page' => 'datatable-index-sheet', 'active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Users')

@section('table-header')
<th> Progress </th>
<th> Name </th>
<th> NPP </th>
<th> Department </th>
<th> MAC Address </th>
<th> Device </th>
<th> Laptop Tag </th>
<th> Laptop SN </th>
<th> Printer </th>
<th> Status Printer </th>
@endsection

@section('table-body')
{ data: 'progress', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_1', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_2', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_3' },
{ data: 'col_4', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_5', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_6', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_7', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_8', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_9', 'className': 'align-middle text-nowrap text-center', 'width': '1' },
@endsection

@push('widget')
<div class="row">

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center">
          {{ \DB::table('main_users')->where('col_11', 'AKTIF')->where('col_8', '!=', '-')->get()->count(); }}
        </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> Printer </center></span>
      </div>
    </div>
  </div>

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center">
          {{ \DB::table('main_users')->where('col_11', 'AKTIF')->get()->count(); }}
         </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> Total Users </center></span>
      </div>
    </div>
  </div>

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center">
          {{ \DB::table('main_users')->where('col_11', 'AKTIF')->where('col_5', 'Laptop Pusat')->get()->count(); }}
        </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> Laptop Pusat </center></span>
      </div>
    </div>
  </div>

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center">
          {{ \DB::table('main_users')->where('col_11', 'AKTIF')->where('col_5', '!=', 'Laptop Pusat')->get()->count(); }}
        </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> PC Lainnya </center></span>
      </div>
    </div>
  </div>


</div>
@endpush
