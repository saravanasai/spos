@extends('Layouts.master')

@section('tab_tittle')
POS | Sale
@endsection

@section('master-tittle')
POS
@endsection


@section('content')
 @livewire('pos.pos-component')
@endsection
