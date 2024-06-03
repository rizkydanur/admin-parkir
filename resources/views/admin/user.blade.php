@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-4">User Management</h1>
                <br>
                    @livewire('users-table')
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .modal-dialog {
            margin: 1.75rem auto;
        }
        .modal-body form .form-label {
            font-size: 0.9rem;
        }
        .modal-body form .form-control {
            font-size: 0.9rem;
        }
        .btn {
            font-size: 0.9rem;
        }
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch; /* Enables momentum scrolling on iOS */
    }
    .table thead th {
        white-space: nowrap;
    }
    @media (max-width: 390px) {
        .table thead th, .table tbody td {
            font-size: 0.8rem;
            padding: 0.25rem;
        }
        .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }
    }
</style>

@endsection
