@extends('layouts.app')

@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{route('admin.home')}}" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new Player</p>

                <form action="{{route('admin.home')}}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div><div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Middle Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div><div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Last Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRounded0">Branch</label>
                        <select class="form-control">
                            <option>branch 1</option>
                            <option>branch 2</option>
                            <option>branch 3</option>
                            <option>branch 4</option>
                            <option>branch 5</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="tel" class="form-control" placeholder="Phone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                            <button type="button" class="btn btn-block btn-success">check</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                            <button type="button" class="btn btn-block btn-success">check</button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" placeholder="date of birth">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRounded0">Health concerns / Issues</label>
                        <textarea class="form-control" rows="3" name="health_concerns"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRounded0">ID Picture</label>
                        <input type="file" class="form-control" name="health_concerns">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{route('login')}}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
