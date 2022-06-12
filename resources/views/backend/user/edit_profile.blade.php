@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Update Your Profile</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Full Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{ $edit_data->name }}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="email" value="{{ $edit_data->email }}" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!--End Row-->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Moblile No. <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone" value="{{ $edit_data->phone }}" class="form-control"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Gender<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="select" class="form-control" aria-invalid="false">
                                                            <option value="" selected disabled>Select Gender</option>
                                                            <option value="Male" {{ ($edit_data->gender == 'Male') ? 'selected' : '' }} >Male</option>
                                                            <option value="Female" {{ ($edit_data->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                        </div> <!--End Row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="address" id="" cols="30" rows="5" class="form-control">
                                                            {{ $edit_data->address }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" id="image" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" src="{{ (!empty($edit_data->image) ? asset($edit_data->image) : asset('upload/no_image.jpg')) }}" style="width:100px; border:1px solid #000" alt="">
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

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
