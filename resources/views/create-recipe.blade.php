@extends('layouts.app')

@section('content')
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material"  method="POST" action="/store/recipe" enctype="multipart/form-data">
                    <h3 class="box-title m-b-20">Create Recipe</h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="name" required placeholder="Name">
                            <input type="text" name="api_token" value="bee8a957360cc6a1bfbad0563398cc6079a8add9">
                        </div>
                        <div class="col-xs-12">
                            <input class="form-control" type="file" name="image"  placeholder="Image">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection