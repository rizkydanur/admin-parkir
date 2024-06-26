@extends('admin.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-4">Parkir Keluar</h1>
                    @livewire('parkir-keluar-livewire-admin')
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')
@endsection
