@extends('admin.master')
@section('content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">

                @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">School Edit Form</h4>
                    </div>
                </div>

                <form action="{{ route('update_school') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="school_name" class="col-form-label col-sm-3 text-right">School Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ $School->school_name }}" id="school_name" placeholder="Enter School Name" required>
                                            @error('school_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <input type="hidden" name="school_id" value="{{$School->id}}">

                            <tr><td><button type="submit" class="btn btn-block my-btn-submit">Update</button></td></tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection
