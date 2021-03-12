@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-md-8 offset-md-2 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">{{$user->name}}'s Profiles</h4>
                </div>
            </div>
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form action="{{route('upload_user_photo')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive p-1">
                <table class="table table-striped table-bordered dt-responsive nowrap text-center" style="max-width: 100%;">
                    <tr><td colspan="2"><img src="{{asset('admin/assets/images/avatar.png')}}" alt="" id="blah" alt="your image" width="400" height="400"></td> </tr>
                    <tr><td>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </td></tr>
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <tr><td>
                        <button type="submit" class="btn btn-block my-btn-submit">Update Photo</button>
                    </td></tr>
                </table>
            </div>
          </form>

        </div>
    </div>
</section>
<!--Content End-->
@endsection
