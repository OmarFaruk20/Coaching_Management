@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Class List</h4>
                </div>
            </div>

            @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Message : </strong> {{ Session::get('message') }}
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
                        <th>Class Name</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($class_list as $class)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$class->class_name}}</td>
                        <td>{{$class->status == 1 ? 'published' : 'Unpublish'}}</td>
                        <td>
                            @if($class->status == 1)
                            <a href="{{route('unpublished_class',['id'=>$class->id])}}" class="btn btn-success btn-sm fa fa-arrow-alt-circle-up" title="Unpublish"></a>
                            @else
                            <a href="{{route('published_class',['id'=>$class->id])}}" class="btn btn-warning btn-sm fa fa-arrow-alt-circle-down" title="Publish"></a>
                            @endif
                            <a href="{{route('edit_class',['id'=>$class->id])}}" class="btn btn-sm btn-info" title="Edit"><span class="fa fa-edit"></span></a>
                            <a href="{{route('delete_class',['id'=>$class->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('If you want to delete this item press ok')" title="Delete"><span class="fa fa-trash"></span></a>
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
