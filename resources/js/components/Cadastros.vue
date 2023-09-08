<template>
    <div class="container ajustar">
        <div class="row">
            <div class="col-lg-6" >
                <a href="/clientes" style="text-decoration: none;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-person-circle img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Clientes</b></h4>
                                    <h6 class="label"><b>Cadastro e Consultas</b></h6>
                                </div>
                            </div>                  
                        </div>          
                    </div>
                 </a>               
            </div>

            <div class="col-lg-6">
                <a href="/produtos" style="text-decoration: none;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-upc-scan img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Produtos</b></h4>
                                    <h6 class="label"><b>Cadastro e Consultas</b></h6>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
            
            
            
        </div>
        <div class="row">

            <div class="col-lg-6">
                <a href="/fornecedores/todos" style="text-decoration: none;">
                    <div class="card" >
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-person img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Fornecedores</b></h4>
                                    <h6 class="label"><b>Cadastro e Consultas</b></h6>
                                </div>
                            </div>
                        </div>  
                    </div>
                </a>     
            </div>

            <div class="col-lg-6">
                <a href="/vendedores" style="text-decoration: none;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-person-bounding-box img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Vendedores</b></h4>
                                    <h6 class="label"><b>Cadastro e Consultas</b></h6>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
        <div class="row">
            
            <div class="col-lg-6">
                <a href="/usuario" style="text-decoration: none;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-person-badge img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Usuários</b></h4>
                                    <h6 class="label"><b>Cadastro e Consultas</b></h6>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>

            <!-- <div class="col-lg-6">
                <a href="/movimentacoes/despesas" style="text-decoration: none;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-arrow-down-square img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Despesas</b></h4>
                                    <h6 class="label"><b>Cadastro e Consultas</b></h6>
                                </div>
                            </div>   
                        </div>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
</template>
<!-- <template>
    <div class="container ajustar">
        <div class="row">
            <div class="col-xl-2 col-sm-6">
                <a href="/venda" class="btn"><button type="button" class="btn btn-light tamanhoBotao" 
                    style="border-color: blueviolet;
                    border-radius: 50px;
                    background: linear-gradient(20deg,pink,purple);
                    color:aliceblue ">VENDAS</button></a>
            </div>
            
            <div class="col-xl-2 col-sm-6">
                <a href="/produtos" class="btn "><button type="button" class="btn btn-light tamanhoBotao " style="border-color: blueviolet;
                    border-radius: 50px;
                    background: linear-gradient(20deg,pink,purple);
                    color:aliceblue ">PRODUTOS</button></a>
            </div>

            <div class="col-xl-2 col-sm-6">
                <a href="/clientes" class="btn"><button type="button" class="btn btn-light tamanhoBotao" style="border-color: blueviolet;
                    border-radius: 50px;
                    background: linear-gradient(20deg,pink,purple);
                    color:aliceblue ">CLIENTES</button></a>
            </div>

            <div class="col-xl-2 col-sm-6">
                <a href="#" class="btn"><button type="button" class="btn btn-light tamanhoBotao" style="border-color: blueviolet;
                    border-radius: 50px;
                    background: linear-gradient(20deg,pink,purple);
                    color:aliceblue ">CAIXA</button></a>
            </div>

            <div class="col-xl-2 col-sm-6">
                <a href="/movimentacoes/despesas" class="btn"><button type="button" class="btn btn-light tamanhoBotao" style="border-color: blueviolet;
                    border-radius: 50px;
                    background: linear-gradient(20deg,pink,purple);
                    color:aliceblue ">DESPESAS</button></a>
            </div>

            <div class="col-xl-2 col-sm-6">
                <a href="/movEstoque" class="btn"><button type="button" class="btn btn-light tamanhoBotao" style="border-color: blueviolet;
                    border-radius: 50px;
                    background: linear-gradient(20deg,pink,purple);
                    color:aliceblue ">MOV. ESTOQUE </button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-sm-6">
                <a href="/fornecedor" class="btn"><button type="button" class="btn btn-light tamanhoBotao" style="border-color: blueviolet;
                    border-radius: 50px;
                    background: linear-gradient(20deg,pink,purple);
                    color:aliceblue ">FORNECEDORES</button></a>
            </div>
        </div>
    </div>
</template> -->

<script>
export default {
    mounted() {
        console.log('Component mounted.')
        this.dafdkfdk();
    },
    methods: {
        dafdkfdk() {
            console.log('Hello world.');
        },
    }
}
</script>

<style scoped>

.card{
   
    /* width: 350px;
    height: 120px; */
    margin-bottom: 30px;
    border: 1px solid rgb(202, 128, 202);
    border-radius: 10px;
    background: white;
    box-shadow: 10px 10px 0px 0px black;
}


i{
    padding-top: 15px;
    padding-bottom: 10px;
    font-size: 70px;
    color: rgb(202, 128, 202);
}

.img{
    display: flex;
    justify-content: center;
}

.label{

    align-items: center ;
    text-align: right;
    color: gray;
}

.espaco{
    margin-right: 2px;
}


</style>