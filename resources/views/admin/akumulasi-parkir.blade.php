@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-4">Data Parkir</h1>
                <br>
                     <livewire:akumulasi-parkir-livewire />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
