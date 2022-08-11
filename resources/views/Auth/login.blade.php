@extends('Layouts.guest')

@section('tab_tittle')
  S-POS | Login
@endsection

@section('guest-content')
    @livewire('auth.login-form-component')
@endsection
