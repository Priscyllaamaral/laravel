<template>
    <div class="container ajustar">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color:aliceblue">Usuários
                    <a href="/usuario/novo"><button class="btn btn-secondary btn-lg" type="button" style="border-radius: 20px; float:right" >+</button></a>
                </h1>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                
                    <div class="scroll">
                        <table class="table table-dark ">
                            <thead>
                                <tr>
                     
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ativo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in vendas" :key="index">
                                    <th> {{ item.name }} </th>
                                    <th> {{ item.email }} </th>
                                    <th> {{ item.ativo }} </th>
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
                    let resultado = await axios.get(Config.baseURL + '/usuario/buscar/');
                    this.vendas = resultado.data;
                }catch(erro){
                    console.log(erro)
                }
            },
            editar(id){
                window.location.href = Config.baseURL + '/usuario/editar?id='+id;
            },

            formatarData(data){
                let date = new Date(data);

                let formater = Intl.DateTimeFormat('pt-BR',{dateStyle:"short"});

                return formater.format(date);
            },

           async excluir(id){
                let resposta = confirm("Você deseja excluir este Funcionário?");
                if(resposta){
                    await axios.post(Config.baseURL + `/usuario/destroy/${id}`);
                    window.location.href = Config.baseURL + '/usuario';
                    
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