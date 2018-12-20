@extends('admin.layout')
@section('title','User')
@section('style')
<link href="{{asset('public/admin/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default userd-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">User</h6>
                </div>
                <div class="pull-right">
                    <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    @include('admin.partials.messages')
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Counter</th>
                                        <th>Action</th>
                                    </tr> 
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Counter</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->get_counter_name()}}</td>
                                        <td class="text-nowrap">
                                            <form action="{{route('user.destroy', ['id'=> $user->id])}}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <a href="{{route('user.show', ['id'=> $user->id])}}" class="mr-25" data-toggle="tooltip" data-original-title="Show"> <i class="fa fa-eye text-inverse m-r-10"></i> </a> 
                                                <a href="{{route('user.edit', ['id'=> $user->id])}}" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> 
                                                <button type="submit" data-toggle="tooltip" data-original-title="Delete" class="btn-link" onclick="return confirm('Are you sure to delete this?')"> <i class="fa fa-close text-danger"></i> </button> 
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<!-- /Row -->
@endsection
@section('script')
<!-- Data table JavaScript -->
<script src="{{asset('public/admin/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script>
$(document).ready(function () {
    $('#datable_1').DataTable();
});
</script>
@endsection