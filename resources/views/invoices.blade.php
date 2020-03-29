@extends('layouts.app')

@section('content')
    @foreach($result as $res)
        <img src="img/Invoices/{$res->invoice_photo}">
    @endforeach

@endsection
