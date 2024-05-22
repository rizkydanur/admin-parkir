@extends('user.layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Parkir Masuk</h1>
                    @livewire('parkir-masuk-livewire')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
