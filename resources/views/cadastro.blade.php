@extends('layouts.padrao')
@section('content')

<div class="container centralizar">
    
    <div class="col-lg-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 corH5">
                    <h2><b> Registrar </b></h2>
                </div>
            </div>
        </div>
        <form action="{{ route('cadastrar') }}" method="POST">
            @csrf
            <div class="card border-primary" >
            
                <div class="card-body border">
              
        
             
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" >Nome</label>
                                <input type="text" name="nome" class="form-control inputSize" />
                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" >E-mail</label>
                                <input type="text" name="email" class="form-control inputSize" />
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="form-label" >Senha</label>
                                <input type="password" name="password" class="form-control inputSize" />
                            
                            </div>
                        </div>
                    </div>
        
                    <div class="row d-flex justify-content-center"> 
                
                        <button type="submit" class="btn btn-primary">Register</button>
            
                    </div>
        
                </div>
          
            </div>
        </form>
    </div>  
</div>

@endsection
   