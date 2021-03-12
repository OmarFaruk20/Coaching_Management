@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Slider</h4>
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

            @if (Session::get('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Slide Image</th>
                        <th>Slide Title</th>
                        <th>Slide Description</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($manageslide as $V_slider)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            <img src="{{url('/slider/').'/'.$V_slider->slide_image }}" width="250" height="200">
                        </td>
                        <td>{{$V_slider->slide_title}}</td>
                        <td>{{$V_slider->slide_description}}</td>
                        <td>{{$V_slider->status == 1 ? 'publish' : 'Unpublish'}}</td>
                        <td>
                            @if($V_slider->status == 1)
                            <a href="{{route('slide_unpublish', ['id' =>$V_slider->id])}}" title="Deactive" class="btn btn-sm btn-info fa fa-arrow-alt-circle-up"></a>
                            @else
                            <a href="{{route('slide_publish', ['id'=>$V_slider->id])}}" title="Active" class="btn btn-sm btn-warning fa fa-arrow-alt-circle-down"></a>
                            @endif
                            <a href="{{route('slide_edit',['id'=>$V_slider->id])}}" class="btn btn-sm btn-info fa fa-edit"></a>
                            <a href="{{route('slide_delete',['id'=>$V_slider->id])}}" onclick="return confirm('If your wan to delete this item press OK')" class="btn btn-sm btn-danger fa fa-trash-alt"></a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<!--Content End-->
@endsection
