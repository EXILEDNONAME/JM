@extends('layouts.backend.__templates.index', ['page' => 'datatable-index-sheet', 'active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Access Points')

@section('table-header')
<th> Status </th>
<th> IP Address </th>
<th> Location </th>
<th> Device </th>
<th> MAC Address </th>
<th> Office </th>
@endsection

@section('table-body')
{ data: 'status_device', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_1', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_2', 'className': 'align-middle text-nowrap' },
{ data: 'col_3', 'className': 'align-middle text-nowrap', 'width': '1'  },
{ data: 'col_4', 'className': 'align-middle text-nowrap' },
{ data: 'col_5', 'className': 'align-middle text-nowrap text-center', 'width': '1' },
@endsection
