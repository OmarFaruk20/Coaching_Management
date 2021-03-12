<thead>
    <tr>
        <th>Sl.</th>
        <th>Batch Name</th>
        <th>Student Capacity</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @php($i = 1)
    @foreach ($batches as $batch)
    <tr>
        <td>{{ $i++ }}</td>
        <td>{{$batch->batch_name}}</td>
        <td>{{$batch->student_capacity}}</td>
        <td>
            @if($batch->status == 1)
            <button onclick='unpublished("{{ $batch->id }}", "{{ $batch->class_id }}")' class="btn btn-success btn-sm fa fa-arrow-alt-circle-up" id="unpublish" title="unpublish"></button>
            @else
            <button onclick='published("{{ $batch->id }}", "{{ $batch->class_id }}")' class="btn btn-warning btn-sm fa fa-arrow-alt-circle-down" id="publish" title="publish"></button>
            @endif
            <a target="_blank" href="{{route('edit_batch',['id'=>$batch->id])}}" class="btn btn-sm btn-info" title="Edit"><span class="fa fa-edit"></span></a>
            <button onclick='delete_batch("{{ $batch->id }}", "{{ $batch->class_id }}")' class="btn btn-sm btn-danger" title="Delete"><span class="fa fa-trash"></span></button>
        </td>
    </tr>
    @endforeach
</tbody>

<script>
    function unpublished(batchId,classId){
             var check = confirm('If you want to un-publish this item, press OK');
             if(check){
                $.get("{{ route('batch_unpublished') }}", {batch_id:batchId,class_id:classId}, function(data){
                    $("#batchList").html(data);
                })
             }
     }
     function published(batchId,classId){
             var check = confirm('If you want to Publish this item, press OK');
             if(check){
                $.get("{{ route('batch_published') }}", {batch_id:batchId,class_id:classId}, function(data){
                    $("#batchList").html(data);
                })
             }
     }
     function delete_batch(batchId,classId){
             var check = confirm('If you want to Delete this item, press OK');
             if(check){
                $.get("{{ route('batch_delete') }}", {batch_id:batchId,class_id:classId}, function(data){
                    $("#batchList").html(data);
                })
             }
     }
</script>
