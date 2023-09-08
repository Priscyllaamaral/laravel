<template>
    <div class="container ajustar">
        <div class="row">
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

            <div class="col-lg-6" >
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
            </div>
            
            
            
        </div>
        <div class="row">

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

            <div class="col-lg-6">
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
            </div>
        </div>
       
    </div>
</template>

<style scoped>

.card{
   
    /* width: 350px;
    height: 120px; */
    margin-bottom: 30px;
    border: 1px solid rgb(115, 172, 241);
    border-radius: 10px;
    background: white;
    box-shadow: 10px 10px 0px 0px black;
}


i{
    padding-top: 15px;
    padding-bottom: 10px;
    font-size: 70px;
    color: rgb(115, 172, 241);
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