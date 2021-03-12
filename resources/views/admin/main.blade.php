@extends('admin.master')
@section('content')

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

<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0">
            <div class="owl-carousel">

            @foreach ($slider as $v_slider)
            <div class="item">
                <img src="{{url('/slider/').'/'.$v_slider->slide_image }}" width="1400" height="570">
                <div class="text-block">
                    <h2>{{$v_slider->slide_title}}</h2>
                    <p>{{$v_slider->slide_description}}</p>
                  </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
