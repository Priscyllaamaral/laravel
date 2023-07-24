<template>
    <div class="container">
        <div class="card border-primary " >
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>

                    <form>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-outline">
                                    <label class="form-label" >Nome</label>
                                    <input type="text" name="email" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-outline mb-4">
                                    <label class="form-label" >Senha</label>
                                    <input type="password" name="password" class="form-control" />   
                                </div>
                            </div>
                        </div>

                        <div class="row text-center">    
                            <div class="col mb-4">
                                <a href="#" class="btn btn-light"><button type="button" class="btn btn-light">Register</button></a>
                            </div>
                        </div>
            
                        <div class="row d-flex justify-content-center"> 
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                        
                    </form>

                </div>
        </div>
    </div>
</template>