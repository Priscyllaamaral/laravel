<template>
    <div class="container ajustar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="color: aliceblue;">Clientes
                        <a href="/clientes/index"><button class="btn btn-secondary btn-lg" type="button" style="border-radius: 20px; float:right" >+</button></a>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-sm-9 ">
            <div class="row justify-content-center pb-5">
                <lista-view v-for= "(item, index) in dados" :key="index" :corBordaStart="cor">
                    <template #id-codigo> 
                        <h5 class="mt-1 mb-0">{{ item.id }}</h5>
                    </template>
                    <template #descricoes>
                      <h4 class="ml-5">{{ item.nome }}</h4>
                      <h5 class="ml-5">{{ item.cpf }}</h5>
                    </template>
                    <template #badges>
                      <span v-if=item.premium class="badge bg-success fw-bold">Premium</span>
                      <span v-if=!item.premium class="badge bg-default text-dark fw-bold">Comum</span>
                    </template>
                    <template #botoes-acoes1> 
                        <button class="btn" type="button" @click="editar(item.id)"><i class="bi bi-pencil-square"></i></button>
                    </template>
                    <template #botoes-acoes2>
                        <button class="btn" type="button" data-toggle="modal" data-target="#confirmar" @click="excluir(item.id)" ><i class="bi bi-trash"></i></button>
                    </template>
                </lista-view>
            </div>
          </div>
        </div>

        <div class="row justify-content-center" v-show="loadings.loading_mais">
          <div class="col-12 pt-3 pb-5 text-center">
            <div class="spinner-border " role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>

        <div class="row" v-show="exibirBotaoMais">
          <div class="col pt-4 pb-4 text-center" v-show="!loadings.loading_mais">
            <button type="button" class="btn btn-default text-white" @click="carregarMais">Mais</button>
          </div>
        </div>
            
             <!-- <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Email</th>
                    <th scope="col">CPF</th>
                    <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for= "(item, index) in dados" :key="index">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.nome }}</td>
                    <td>{{ item.celular }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.cpf }}</td>
                    <td>
                        <button class="btn btn-secondary" type="button" @click="editar(item.id)"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#confirmar" @click="excluir(item.id)" ><i class="bi bi-trash"></i></button>
                    </td>
                    </tr>
                </tbody>
            </table> -->




         <!-- Modal -->
         <div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo deletar este Cliente?</h5>
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

    <divider></divider>
    
    </div>
</template>


<script>
  import axios from 'axios';
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

    export default {
      name: 'Clientes',

        data(){
            return{
              loadings: {
                loading: false,
                loading_mais: false,
              },
              exibirBotaoMais: true,
                dados: '',
                idExcluir : -1,
                cor: "border-success",
              pular: 0
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
                    axios.post(Config.baseURL + `/clientes/destroy/${id}`);
                    window.location.href = Config.baseURL + '/clientes';
                }catch(error){
                    console.log(error);
                }
            },
            async carregar() {
                try{
                  let params = {
                    pular: this.pular,
                  }

                    let resultado = await axios.get(Config.baseURL + '/clientes/listar/', { params: params });
                    this.dados = resultado.data;

                    this.pular = this.pular + 3
                }catch(erro){
                    console.log(erro)
                }
            },

            async carregarMais() {
                try{
                  this.loadings.loading_mais = true;

                  let params = {
                    pular: this.pular,
                  }

                    let resultado = await axios.get(Config.baseURL + '/clientes/listar/', { params: params });
                    resultado.data.forEach((cliente) => {
                      this.dados.push(cliente);
                    })

                    if (resultado.data.length < 3) {
                      this.exibirBotaoMais = false;
                    } else {
                      this.pular = this.pular + 3
                    }

                    $('body, html').animate({
                      scrollTop: document.body.scrollHeight
                    }, 'slow')
                }catch(erro){
                    console.log(erro)
                } finally {
                  this.loadings.loading_mais = false;
                }
            },

            editar(id){
                window.location.href = Config.baseURL + '/clientes/editar?id='+id;
            },

            excluir(id){
                this.idExcluir = id;
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