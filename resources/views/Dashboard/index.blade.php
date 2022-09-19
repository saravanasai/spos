@extends('Layouts.master')

@section('tab_tittle')
    S-POS | Dashboard
@endsection

@section('master-tittle')
    Dashboard
@endsection

@section('content')
    @if (auth('web')->user())
        <div>Wellcome you store admin</div>
    @else
        @livewire('dashboards.manager-dashboard-component')
    @endif
@endsection
