@extends('layouts.backend.__templates.index', ['page' => 'datatable-index-sheet', 'active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Intercomes')

@section('table-header')
<th> Department </th>
<th> Location </th>
<th> No. Intercome </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'col_1' },
{ data: 'col_2' },
{ data: 'col_3' },
{ data: 'col_4' },
@endsection
