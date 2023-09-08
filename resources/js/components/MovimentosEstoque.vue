<template>
    <div class="container ajustar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 sclass="corTitulo">Movimentos de Estoque
                        <a href="/movEstoque"><button class="btn btn-secondary btn-lg" type="button" style="border-radius: 20px; float:right" >+</button></a>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                    <div class="scroll">
                        <table class="table table-dark ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Movimento</th>
                                    <th>Fornecedor</th>
                                    <th>Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in movimentos" :key="index">
                                    <th> {{ item.id }} </th>
                                    <th>{{ item.movimento }}</th>
                                    <th>{{ item.fornecedor.nome }}</th>
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

                movimentos: '',

                
            }
        },

        mounted(){
            this.carregar();

        },


        methods:{
            async carregar(){
                try{
                    let resultado = await axios.get(Config.baseURL + '/movEstoque/buscar/');
                    this.movimentos = resultado.data;
                }catch(erro){
                    console.log(erro)
                }
            },
            editar(id){
                window.location.href = Config.baseURL + '/movEstoque/editar?id='+id;
            },

            formatarData(data){
                let date = new Date(data);

                let formater = Intl.DateTimeFormat('pt-BR',{dateStyle:"short"});

                return formater.format(date);
            },

           async excluir(id){
                let resposta = confirm("Você deseja excluir esse Movimento?");
                if(resposta){
                    await axios.post(Config.baseURL + `/movEstoque/destroy/${id}`);
                    window.location.href = Config.baseURL + '/movEstoque/listar';
                    
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