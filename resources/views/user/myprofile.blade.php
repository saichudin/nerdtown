@extends('front-base')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <h1>My Profile</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    @if ($user->hasMedia('avatar'))
                                        <img src="{{ $user->getFirstMedia('avatar')->getUrl() }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    @else
                                        <img src="http://placehold.it/150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    @endif
                                </div>

                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{ $user->username }}</h2>
                                    <h6 class="d-block">{{ count($followers) }} Followers</h6>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                <form action="{{ route('user.avatar') }}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Change Avatar</label>
                                        <div class="col-sm-12">
                                            <input type="file" id="avatar" name="avatar">
                                        </div>
                                    </div>

                                    <div class="form-group" id="avatarBtn" style="">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn-sm btn-primary" id="saveBtn" class="saveBtn" >Save Avatar</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <hr />

                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">First Name</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        {{ $user->first_name }}
                                    </div>
                                </div>
                                <hr />

                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Last Name</label>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        {{ $user->last_name }}
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <a href="javascript:void(0)" id="editProfile" class="btn-sm btn-primary">Edit My Profile</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="modal fade" id="editModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Edit My Profile</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.update') }}" method="post" id="userForm" name="userForm" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-sm-5 control-label">First Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->first_name }}" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Last Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->last_name }}" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" > Save </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $('#editProfile').click(function () {
            $('#editModel').modal('show');
        });

        // document.getElementById('customFile').onchange = function() {
        //     document.getElementById("avatarBtn").style.display = "block";
        // };
    </script>
@endsection
