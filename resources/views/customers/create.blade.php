@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customers Area - Create New Customer</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form role="form" method="post" action="{{action('CustomerController@store')}}">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address_street">Address</label>
                            <input type="text" class="form-control" id="address_street" name="address" placeholder="1234 Main St">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state">State</label>
                                <select id="state" class="form-control" name="state">
                                    <option selected>Choose...</option>
                                    <option value="Alabama">Alabama</option>
                                    <option value="Arizon">Arizon</option>
                                    <option value="Arkansas">Arkansas</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="country">Country</label>
                                <select id="country" class="form-control" name="country">
                                    <option selected>Choose...</option>
                                    <option value="USA">USA</option>
                                    <option value="UK">UK</option>
                                    <option value="AUS">Australia</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

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
            ajax: "{{ route('customers.index') }}",
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
