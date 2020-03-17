@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Account Settings - Profile</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form role="form" method="post" action="{{action('ProfileController@store')}}">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$user->id}}" name="user_id" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="{{ isset($profile) ? $profile->firstname :  $user->name}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="{{ isset($profile) ? $profile->lastname : ''  }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ isset($profile) ? $profile->mobile : ''  }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="{{ isset($profile) ? $profile->address : ''  }}">
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="role">Role</label>
                                <select id="role" class="form-control" name="role_id">
                                    <option selected>Choose...</option>
                                    <option value="1" @if( isset($profile) && $profile->role_id == 1) {{'selected'}} @endif >Admin</option>
                                    <option value="2" @if( isset($profile) && $profile->role_id == 2) {{'selected'}} @endif >Agent</option>
                                    <option value="3" @if( isset($profile) && $profile->role_id == 3) {{'selected'}} @endif >Customer</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option selected value="1">Active</option>
                                    <option value="0">InActive</option>
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


@section('javascripts')
<script>
    $(document).ready(function() {
        console.log('sadfsdf');
        setTimeout(function() {
            $('.alert-success').fadeOut('fast');
        }, 30000);
    })
</script>
@endsection
