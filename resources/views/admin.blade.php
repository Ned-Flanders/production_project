@extends('layouts.app')

@section('content')

    <div class="container">
        @if($message = Session::get('success'))
            <div class=" alert ªalert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-web" role="tab" aria-controls="nav-home" aria-selected="true">Flags</a>
            </div>
        </nav>


        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-web" role="tabpanel" aria-labelledby="nav-home-tab">
                <table class="table table-bordered">
                    <tr>
                        <th>Challenge Name</th>
                        <th>Flag</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                    @foreach($flags as $key=>$flag)
                        <tr>

                            <td>{{$flag->challenge_name}}</td>
                            <td>{{$flag->flag}}</td>
                            <td>{{$flag->course}}</td>
                            <th> <button data-flag_id="{{$flag->id}}" data-challenge_name="{{$flag->challenge_name}}" data-flag="{{$flag->flag}}" data-course="{{$flag->course}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter-edit">
                                   Edit
                                </button>
                                <button data-flag_id="{{$flag->id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-delete">
                                    Delete
                                </button>
                            </th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{$flags->links()}}
                </table>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Add new flag
                </button>

                <!-- Modal for adding new flag -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('admin.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Challenge Name</label>
                                    <input type="text" name="challenge_name" class="form-control" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label>Flag</label>
                                    <input type="text" name="flag" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Course</label>
                                    <input type="text" name="course" class="form-control" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <div class="form-group">
                                        <input type="submit" name="send" class="btn btn-info" value="Add" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!-- Modal for editing flag -->
            <div class="modal fade" id="exampleModalCenter-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('admin.update', 'flag_id')}}">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="form-group">
                                    <label>Challenge Name</label>
                                    <input type="text" name="challenge_name" id="challenge_name" class="form-control" value="" required />
                                </div>
                                <input type="hidden" id="flag_id" name="flag_id">
                                <div class="form-group">
                                    <label>Flag</label>
                                    <input type="text" name="flag" id="flag" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Course</label>
                                    <input type="text" name="course" id="course" class="form-control" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <div class="form-group">
                                        <input type="submit" name="send" class="btn btn-info" value="Update" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for deleting the flag -->
        <div class="modal fade" id="exampleModalCenter-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Are you sure you want to delete the flag?</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('admin.destroy', 'flag_id')}}">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <input type="hidden" id="flag_id" name="flag_id">

                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <div class="form-group">
                                    <input type="submit" name="send" class="btn btn-info" value="Delete Flag" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

            </div>
        </div>
    </div>
@endsection
