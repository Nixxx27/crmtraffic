@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard - Daily Sales</div>

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
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Sale 1 Count</th>
                                    <th>Sale 1 Amount ($)</th>
                                    <th>Rebill Count</th>
                                    <th>Rebill Amount ($)</th>
                                    <th>Cancel Count</th>
                                    <th>Cancel Amount ($)</th>
                                    <th>Refund Count</th>
                                    <th>Refund Amount ($)</th>
                                    <th>CB Count</th>
                                    <th>CB Amount ($)</th>

                                    <th>Daily Total ($)</th>

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
            ajax: "{{ route('home.index') }}",
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
