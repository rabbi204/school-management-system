@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Update Your Password</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('profile.password.update') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <h5>Current Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="current_password" name="old_password" class="form-control" required />
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>New Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="password" name="password" class="form-control" required />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Confirm Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required />
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    {{-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> --}}
                                    <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
</div>
@endsection
