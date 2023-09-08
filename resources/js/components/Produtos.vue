<template>
    
    <div class="container ajustar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="color: aliceblue;">Produtos
                        <a href="/produtos/index"><button class="btn btn-secondary btn-lg" type="button" style="border-radius: 20px; float:right" >+</button></a>
                    </h1>
                </div>
            </div>
        </div>
        <hr/>
        <div class="scroll" >
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor á Vista</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info" v-for="(item, index) in dados" :key="index">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.codigo }}</td>
                    <td>{{ item.nome }}</td>
                    <td>{{ item.valor_vista | valorBR }}</td>
                    <td>
                        <button class="btn btn-secondary" type="button"><i class="bi bi-pencil-square" @click="editar(item.id)"></i></button>
                        <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#confirmar" @click="excluir(item.id)"><i class="bi bi-trash"></i></button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo deletar este Produto?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" @click="confirmar" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
   </div>
</template>

<script>
import axios from 'axios';
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);


    export default{
        data(){
            return{
                dados: '',
                idExcluir : -1
            }
        },


        mounted(){
            this.carregar();
        },

        methods:{
            confirmar: function () {
                this.deletar(this.idExcluir);
            },

            deletar: function (id) {
                try{
                    axios.post(Config.baseURL + `/produtos/destroy/${id}`)
                    .then(response => {
                        let i = this.dados.map(data => data.id).indexOf(id);
                        this.dados.slice(i, 1);
                    });
                    
                }catch(error){
                    console.log(error);
                }finally{
                    window.location.href = Config.baseURL + '/produtos';
                }
            },

            async carregar(){
                try{
                    let response = await axios.get(Config.baseURL + '/produtos/listar/');
                    this.dados = response.data;
                }catch(erro){
                    console.log(erro);
                }

            },
            editar(id){
                window.location.href = Config.baseURL + '/produtos/editar?id='+id;
            },

            excluir(id){
                this.idExcluir = parseInt(id);
            }
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