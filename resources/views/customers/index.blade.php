@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard - Customers Area</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3">

                            <div class="card">
                                <a class="btn btn-primary" href="/customers/create">Create New</a>
                            </div>

                        </div>
                    </div>

                    <div class="table-responsive text-nowrap">
                        <!-- <h1>Laravel 5.8 Datatables Tutorial <br /> HDTuto.com</h1> -->
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Membership Type</th>
                                    <th>Charge Amount ($)</th>
                                    <th width="100px" style="text-align:center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer )
                                <tr>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->membership_type}}</td>
                                    <td>2.00</td>
                                    <td>
                                        <button class="btn btn-primary">View</button>
                                        <button class="btn btn-secondary">Cancel</button>
                                        <button class="btn btn-success">Refund</button>
                                        <button class="btn btn-danger">Void</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>
    $(document).ready(function() {
        console.log('asdf');
        alert('asdfsdf');
    });
</script>



<!-- <script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#msg').fadeOut('fast');
        }, 30000);
    });
</script> -->


@endsection
