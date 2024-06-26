@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
        <div class="row">
            @if ($order_statuses->count())
                @foreach ($order_statuses as $order_status)
                    @include('user.order_statuses.components.status-card')
                @endforeach
            @endif
        </div>
    @endsection
