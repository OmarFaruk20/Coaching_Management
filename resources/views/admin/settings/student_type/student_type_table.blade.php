    @if(count($studentTypes)>0)

        @php
            $i = 1;
        @endphp

            @foreach ($studentTypes as $studentType)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$studentType->class_name}}</td>
                <td>{{$studentType->student_type}}</td>
                <td>{{$studentType->status == 1 ? 'Active' : 'Inactive'}}</td>
                <td>
                    @if($studentType->status == 1)
                    <a href="{{route('unpublished_school',['id'=>$studentType->id])}}" class="btn btn-success btn-sm fa fa-arrow-alt-circle-up" title="Unpublish"></a>
                    @else
                    <a href="{{route('published_school',['id'=>$studentType->id])}}" class="btn btn-warning btn-sm fa fa-arrow-alt-circle-down" title="Publish"></a>
                    @endif
                    <a href="{{route('edit_school',['id'=>$studentType->id])}}" class="btn btn-sm btn-info" title="Edit"><span class="fa fa-edit"></span></a>
                    <a href="{{route('delete_school',['id'=>$studentType->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('If you want to delete this item press ok')" title="Delete"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
            @endforeach

            @else
                <tr class="text-danger">
                    <td colspan="5">Student Type not Found!</td>
                </tr>
            @endif
