<template>
    <div class="container ajustar">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color:aliceblue">Lista Vendas
                    <a href="/vendas"><button class="btn btn-secondary btn-lg" type="button" style="border-radius: 20px; float:right" >+</button></a>
                </h1>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                
                    <div class="scroll">
                        <table class="table table-bordered table-dark ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in vendas" :key="index">
                                    <th> {{ item.id }} </th>
                                    <th v-if="item.cliente != null"> {{ item.cliente.nome }} </th>
                                    <th v-else> ? </th>
                                    <th>{{ item.status }}</th>
                                    <th>{{ item.data | dataBR }}</th>
                                    <th><button type="button" class="btn btn-secondary"  @click="editar(item.id)"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-secondary"  @click="excluir(item.id)"><i class="bi bi-trash"></i></button></th>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
            </div>
        </div>
    </div>



</template>

<script>
import axios from 'axios';
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

    export default{
        data(){
            return{

                vendas: '',
            }
        },

        mounted(){
            this.carregar();

        },


        methods:{
            async carregar(){
                try{
                    let resultado = await axios.get(Config.baseURL + '/vendas/buscar/');
                    this.vendas = resultado.data;
                }catch(erro){
                    console.log(erro)
                }
            },
            editar(id){
                window.location.href = Config.baseURL + '/vendas/editar?id='+id;
            },

            formatarData(data){
                let date = new Date(data);

                let formater = Intl.DateTimeFormat('pt-BR',{dateStyle:"short"});

                return formater.format(date);
            },

           async excluir(id){
                let resposta = confirm("Você deseja excluir essa Venda?");
                if(resposta){
                    await axios.post(Config.baseURL + `/vendas/destroy/${id}`);
                    window.location.href = Config.baseURL + '/venda';
                    
                }

                
            },
        }
    }




</script>

<style>
  .scroll {
    min-height: 100px;
    max-height: 500px;
    overflow-y: scroll;
  }
</style>