@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard - Merchants Reports</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="table-responsive text-nowrap">
                        <!-- <h1>Laravel 5.8 Datatables Tutorial <br /> HDTuto.com</h1> -->
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Corp Name</th>
                                    <th>Bank Name</th>
                                    <th>Bank Site Listed</th>
                                    <th>Phone Number</th>
                                    <th>Total MID CAP ($)</th>
                                    <th>Total Sales Count</th>
                                    <th>Total Sales ($)</th>
                                    <th>Cancels</th>
                                    <th>Refunds</th>
                                    <th>Chargebacks</th>

                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('merchants.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>
