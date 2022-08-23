@extends('Layouts.master')

@section('tab_tittle')
Sales | Management
@endsection

@section('master-tittle')
Sales Management
@endsection


@section('content')
 @livewire('orders.orders-component')

@endsection
