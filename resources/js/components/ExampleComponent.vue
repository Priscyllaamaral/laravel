<template>
    <div class="container ajustar">
        <div class="row">
            <div class="col-lg-6">
                <a href="/menuCadastro" style="text-decoration: none;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-receipt-cutoff img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Cadastros</b></h4>
                                    <h6 class="label"><b>Fornecedores, Clientes, Produtos, Funcionários, Vendedores</b></h6>
                                </div>
                            </div>
                        </div>  
                    </div>
                </a>     
            </div>
            <div class="col-lg-6" >
                <a href="/menuMovimentacoes" style="text-decoration: none;">
                    <div class="card" >
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-arrow-down-up img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Movimentações</b></h4>
                                    <h6 class="label"><b>Caixa, Estoque, Despesas</b></h6>
                                </div>
                            </div>                  
                        </div>          
                    </div>
                 </a>               
            </div>
            <!-- <div class="col-lg-6" >
                <a href="/venda" style="text-decoration: none;">
                    <div class="card" >
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-cart-check img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Vendas</b></h4>
                                    <h6 class="label"><b>Consultas e Relatórios</b></h6>
                                </div>
                            </div>                  
                        </div>          
                    </div>
                 </a>               
            </div> -->
        </div>
        <!-- <div class="row">
            <div class="col-lg-6">
                <a href="/caixa" style="text-decoration: none;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-calculator img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Caixa</b></h4>
                                    <h6 class="label"><b>Recebimentos, Consultas e Relatórios</b></h6>
                                </div>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="/movEstoque/listar" style="text-decoration: none;">
                    <div class="card" >
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-12"><i class="bi bi-box-seam img"></i></div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-12">
                                <div class="row espaco">
                                    <h4 class="label"><b>Movimento Estoque</b></h4>
                                    <h6 class="label"><b>Entrada de Produtos</b></h6>
                                </div>
                            </div>   
                        </div>
                    </div>
                </a>
            </div>
        </div> -->
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
    border: 1px solid purple;
    border-radius: 10px;
    background: white;
    box-shadow: 10px 10px 0px 0px black;
}


i{
    padding-top: 20px;
    padding-bottom: 10px;
    font-size: 70px;
    color: purple;
}

.img{
    display: flex;
    justify-content: center;
}
.estilo{
    margin-top: 0px;
    padding-top: 0px;
    margin-left: 20px;
    margin-bottom: 30px;
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