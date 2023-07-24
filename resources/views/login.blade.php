@extends('layouts.padrao')
@section('content')



<div class="container centralizar">
 
    <div class="col-lg-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 corH5">
                    <h2><b> Login  </b></h2>
                </div>
            </div>
        </div>
        <form action="{{ route('autorizar') }}" method="POST">
            @csrf
            <div class="card border-primary" >
                <div class="card-body">
                    

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="form-label"> Nome </label>
                                <input type="text" name="email" class="form-control inputSize" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="form-label"> Senha </label>
                                <input type="password" name="password" class="form-control inputSize" />
                            </div>
                        </div>
                    </div>

                    <div class="row text-center">    
                        <div class="col mb-4">
                            <a href="{{ route('novo') }}"><button type="button" class="btn btn-light"> Register </button></a>
                        </div>
                    </div>
        
                    <div class="row d-flex justify-content-center"> 
                        <button type="submit" class="btn btn-primary"> Sign in </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection