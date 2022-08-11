@extends('Layouts.master')

@section('tab_tittle')
Setting | Change Password
@endsection

@section('master-tittle')
Change Password
@endsection


@section('content')
 @livewire('auth.change-password')
@endsection
