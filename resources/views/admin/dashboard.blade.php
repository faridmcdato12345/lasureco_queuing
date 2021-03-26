@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            <h1>WELCOME!</h1><span>{{Auth::user()->name}}</span>
        </div>
    </div>
</div>
@endsection
