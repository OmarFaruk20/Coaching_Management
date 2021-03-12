@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Student Type List
                        <button class="bg-success text-light" data-toggle="modal" data-target="#StudentTypeAddModal">Add New</button>
                    </h4>
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
                        <th>Calss Name</th>
                        <th>Student Type</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="StudentTypeTable">

                        @include('admin.settings.student_type.student_type_table')

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<!--Content End-->

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="StudentTypeAddModal" tabindex="-1" role="dialog" aria-labelledby="StudentTypeAddModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add New Student Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('student_type_add') }}" method="POST" id="SutdentTypeInsert">
            @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="classId" class="col-form-label col-sm-3 text-right">Class Name</label>
                <div class="col-sm-9">
                    <select name="class_id" class="form-control" @error('class_id') is-invalid @enderror" id="classId" required autofocus>
                        <option value="">--Select Class--</option>
                        @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                        @endforeach
                    </select>
                    @error('class_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <label for="student_type" class="col-form-label col-sm-3 text-right">Student Type</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('student_type') is-invalid @enderror" name="student_type" value="{{ old('batch_name') }}" id="student_type" placeholder="Enter Student Type" required>
                    @error('student_type')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-warning" data-dismiss="modal" id="reset">Reset</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>

      </div>
    </div>
  </div>
  <!--End Modal--->

<script>
    $('#SutdentTypeInsert').submit( function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        var method = $(this).attr('method');
        $('#StudentTypeAddModal #reset').click();
        $('#StudentTypeAddModal').modal('hide');

        $.ajax({
            data : data,
            type : method,
            url  : url,
            success : function() {
                $.get("{{ route('student_type_list') }}", function(data) {
                    $('#StudentTypeTable').empty().html(data);
                })
            }
        })
    })
</script>


@endsection
