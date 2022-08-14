@extends('Layouts.master')

@section('tab_tittle')
Products | Management
@endsection

@section('master-tittle')
Product Management
@endsection


@section('content')
 @livewire('products.product-management')
@endsection
