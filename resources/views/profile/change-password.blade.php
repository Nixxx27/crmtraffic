@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Account Settings - Change Password</div>



                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form role="form" method="post" action="{{action('ProfileController@updatePassword')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputCurrentPassword">Current Password <br>
                                <small>You must supply your current password when updating your password</small>
                            </label>
                            <input type="password" class="form-control" id="inputCurrentPassword" name="inputCurrentPassword" placeholder="Current Password" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNewPassword">New Password</label>
                                <input type="password" class="form-control" id="inputNewPassword" name="inputNewPassword" placeholder="New Password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputConfirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password" required>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
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
