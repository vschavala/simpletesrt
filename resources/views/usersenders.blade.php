@extends('layouts.main')

@section('content')
    <div class="container">
        <h3>Thanks Senders List</h3>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- Modal Example Start-->
        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria- labelledby="demoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Modal Example -
                            Websolutionstuff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Welcome, Websolutionstuff !!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data- dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Example End-->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <form method="post" action="{{ route('usercomment.post') }}">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('thanks.senders') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'username',
                        name: 'username.name',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'useremail',
                        name: 'useremail.name',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });

    </script>
@endsection
