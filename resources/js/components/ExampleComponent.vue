<template>
    <div class="container ajustar">
        <div class="row">
            <div class="col-lg-6">
                <a href="/menuCadastro">
                    <div class="card" style="float:right">
                        <div class="row">
                            <div class="col-lg-4 col-3"><i class="bi bi-receipt-cutoff img"></i></div>
                            <div class="col-lg-8 col-9">
                                <div class="row espaco">
                                    <h4 class="label"><b>Cadastros</b></h4>
                                    <h6 class="label"><b>Fornecedores, Despesas, Clientes, Produtos</b></h6>
                                </div>
                            </div>
                        </div>  
                    </div>
                </a>     
            </div>
            <div class="col-lg-6" >
                <a href="/venda">
                    <div class="card" style="float:left">
                        <div class="row">
                            <div class="col-lg-4 col-3"><i class="bi bi-cart-check img"></i></div>
                            <div class="col-lg-8 col-9">
                                <div class="row espaco">
                                    <h4 class="label"><b>Vendas</b></h4>
                                    <h6 class="label"><b>Consultas e Relatórios</b></h6>
                                </div>
                            </div>                  
                        </div>          
                    </div>
                 </a>               
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <a href="https://www.google.com">
                    <div class="card" style="float:right">
                        <div class="row">
                            <div class="col-lg-4 col-3"><i class="bi bi-calculator img"></i></div>
                            <div class="col-lg-8 col-9">
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
                <a href="/movEstoque/listar">
                    <div class="card" style="float:left">
                        <div class="row">
                            <div class="col-lg-4 col-3"><i class="bi bi-box-seam img"></i></div>
                            <div class="col-lg-8 col-9">
                                <div class="row espaco">
                                    <h4 class="label"><b>Movimento Estoque</b></h4>
                                    <h6 class="label"><b>Entrada de Produtos</b></h6>
                                </div>
                            </div>   
                        </div>
                    </div>
                </a>
            </div>
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
   
    width: 350px;
    height: 120px;
    margin-bottom: 30px;
    border: 1px solid purple;
    border-radius: 10px;
    background: white;
    box-shadow: 10px 10px 0px 0px black;
}


i{
    padding-left: 20px;
    padding-top: 20px;
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