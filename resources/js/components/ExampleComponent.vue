<template>
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
</template>

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

<style>






</style>