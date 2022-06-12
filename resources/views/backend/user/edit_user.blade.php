@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add User</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('user.update', $edit_data->id) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="user_type" id="select" required="" class="form-control" aria-invalid="false">
                                                            <option value="" selected disabled>Select Role</option>
                                                            <option value="Admin" {{ ($edit_data->user_type == 'Admin') ? 'selected' : '' }} >Admin</option>
                                                            <option value="User" {{ ($edit_data->user_type == 'User') ? 'selected' : '' }}>User</option>
                                                        </select>
                                                    <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{ $edit_data->name }}" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--End Row-->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" value="{{ $edit_data->email }}" class="form-control" required  />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--End Row-->
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
