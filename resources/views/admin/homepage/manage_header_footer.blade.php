@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content registration-form">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Edit Header & Footer Form</h4>
                </div>
            </div>

            @php
                $Header = \App\HeaderFooter::all();
            @endphp

            <form method="POST" action="{{route('update_header_footer')}}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
                @csrf

                @foreach ($Header as $item)

                <div class="form-group col-12 mb-3">
                    <label for="title" class="col-sm-3 col-form-label text-right">Title</label>
                    <input id="title" type="text" class="col-sm-9 form-control @error('title') is-invalid @enderror" name="title" value="{{ $item->title }}" placeholder="Website Title" required autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="sub_title" class="col-sm-3 col-form-label text-right">Sub-Title</label>
                    <input id="sub_title" type="text" class="col-sm-9 form-control @error('sub_title') is-invalid @enderror" name="sub_title" value="{{ $item->sub_title }}" placeholder="Website Sub-Title" required autofocus>

                    @error('sub_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-right">Address</label>
                    <input id="address" type="text" class="col-sm-9 form-control @error('address') is-invalid @enderror" name="address" value="{{ $item->address }}" placeholder="Address" required autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                    <input id="mobile" type="text" class="col-sm-9 form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $item->mobile }}" placeholder="8801xxxxxxxxx" required>
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="copyright" class="col-sm-3 col-form-label text-right">Copyright</label>
                    <input id="copyright" type="text" class="col-sm-9 form-control @error('copyright') is-invalid @enderror" name="copyright" value="{{ $item->copyright }}" placeholder="Copyright" required>
                    @error('copyright')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @endforeach
                <input type="hidden" name="status" value="1">

                <input type="hidden" name='id' value="{{$item->id}}">

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Update</button>
                </div>


            </form>
        </div>
    </div>
</section>
<!--Content End-->
@endsection
