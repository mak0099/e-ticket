@extends('site.layout')
@section('content')
<div class="site wrapper-content">
    <div class="home-content" role="main">
        <div class="container two-column-respon padding-top-6x padding-bottom-6x">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="form-wrap" style="margin-top: 100px;">
                        <form method="post" action="{{route('confirm_booking_site')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputuname_1">Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" class="form-control" id="exampleInputuname_1" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" class="form-control" id="exampleInputEmail_1" placeholder="Enter email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputpwd_1">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="tel" class="form-control" id="exampleInputpwd_1" placeholder="Enter phone" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">gender</label>
                                <div>
                                    <div>
                                        <input id="male" type="radio" class="input-radio" name="gender" value="1">
                                        <label for="male">
                                            Male </label>
                                    </div> 
                                    <div>
                                        <input id="female" type="radio" class="input-radio" name="gender" value="0">
                                        <label for="female">
                                            Female </label>
                                    </div> 
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-10">Submit</button>
                            <a href="#" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection





