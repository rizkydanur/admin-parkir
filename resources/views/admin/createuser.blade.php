@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-4">Create User</h1>
                <br>
                    @include('livewire.create-user')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
