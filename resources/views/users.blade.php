@extends('layouts.main')

@section('content')
<div class="container">
    <h3>Maltego Users </h3>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  
     <!-- Button trigger modal -->

  <!-- Modal -->
        <form method="post" action="{{route('usercomment.post')}}"> 
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title username" id="exampleModalLabel" style="color: blue;">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <label for="comment">Comment:</label>
                            <textarea id="comment" name="comment" rows="4" cols="50">
                                
                            </textarea>
                    </div>
                    <input type="hidden" class="user_id" name="user_id" value="">
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Say Thank You</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
 
</div>
<script type="text/javascript">
    $(function () {
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('users.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
    $('#exampleModal').on('show.bs.modal', function (event) {
               var button = $(event.relatedTarget) // Button that triggered the modal
               var email = button.data('name'); // Extract info from data-* attributes
               var id = button.data('id'); 
               console.log(id);
               $('.username').text('Thank You:'+email);
               $('.user_id').val(id);

           });
  </script>   
@endsection
