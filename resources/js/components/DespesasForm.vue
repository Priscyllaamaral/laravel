<template>
  <div class="container ajustar">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                <h1 class="corTitulo">Despesa</h1>
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-body">
              <form>
                  <div class="form-row ">
                      <div class="form-group col-md-6">
                          <label class= "espaco"> Fornecedor </label>
                          <div class="input-group">
                            <input type="text" class="form-control espaco" v-model="despesa.fornecedor" name="inputNome" style="max-width: 10%; min-width: 10%;" readonly>
                            <input type="text" class="form-control espaco" v-model="fornecedor_.nome" name="inputNome" style="max-width: 70%; min-width: 70%;" >
                            <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" data-toggle="modal" 
                                  @click="mudarNome(fornecedor_.nome)"
                                  data-target="#exampleModal" type="button"><i class="bi bi-search"></i></button>
                                  
                              </div>
                          </div>
                      </div>
                      
                  
                      <div class="form-group col-md-6" >
                          <label> Plano de Contas </label>
                          <div class="input-group">
                                <input type="text" class="form-control espaco" v-model="despesa.plano_de_contas" name="inputNome" style="max-width: 10%; min-width: 10%;" readonly>
                                <input type="text" class="form-control" name="inputPlanoContas" v-model="nomePlanoContas" style="max-width: 70%; min-width: 70%;" >
                                <div class="input-group-append">
                                    <button data-toggle="modal" data-target="#exampleModal2" class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="form-row ">
                      <div class="col-md-6">
                          <label class= "espaco"> Valor </label>
                          <div class="input-group">
                              <div class="input-group-prepend espaco">
                                  <span class="input-group-text">R$</span>
                              </div>
                              <input type="number" v-model="despesa.valor" class="form-control" name="inputNome"  style="max-width: 50%; min-width: 50%;">
                          </div>
                      </div>
                      <div class="form-group col-md-6">
                          <label> Data </label>
                          <input type="date" v-model="despesa.data" class="form-control" name="inputCPF" style="max-width: 70%; min-width: 70%;">
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-3">
                          <label class="espaco"> Tipo </label>
                      </div>
                  </div>
                  
                  <div class="row">
                      <div class="col-md-4">
                          <div class="radio">
                              <label class="" for="flexRadioDefault1">
                                  <input class=""  value="Fixa" type="radio" name="flexRadioDefault" v-model="despesa.tipo" id="flexRadioDefault1" >
                                  Despesa Fixa
                              </label>

                              <label class="" for="flexRadioDefault2"> 
                                  <input class="" value="Flexível" type="radio" name="flexRadioDefault" v-model="despesa.tipo" id="flexRadioDefault2"/>
                                  Despesa Flexível
                              </label>
                          </div>
                          
                      </div>
                  </div>
                  
                  <button type="button" @click="salvar" class="btn btn-primary float-right" style="margin-right: 10px;" :disabled="loading">Salvar</button>
                  <button type="button" @click="voltar" class="btn btn-primary float-right" style="margin-right: 10px;" :disabled="loading">Sair</button>
              </form>
          </div>
      </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesquisar Fornecedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" v-model="fornecedor_.nome" name="search" @keyup="mudarNome(fornecedor_.nome)">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for= "(item,index) in dados2" :key="index">
                            <th scope="row">{{ item.id }}</th>
                            <th>{{ item.nome }}</th>
                            <th>{{ item.cpf }}</th>
                            <th><button @click="adicionarFornecedor(item.id, item.nome)" type="button" data-dismiss="modal"><i class="bi bi-check"></i></button></th>
                        </tr>                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesquisar Plano</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                </div>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Descricao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for= "(item, index) in planos" :key="index">
                            <th scope="row">{{ item.descricao }}</th>
                            <th><button @click="adicionarPlano(item)" type="button" data-dismiss="modal"><i class="bi bi-check"></i></button></th>
                        </tr>                      
                    </tbody>
                </table>
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
                loading: false,
                dados : '',
                nomeFornecedor: '',
                dados2 : '',
                idFornecedor : null,
                valor: 0,
                tipo: '',
                idPlanoDeContas: null,
                dataDespesa : null,
                planos : '',
                nomePlanoContas : ''
,

                despesa:{
                    id: null,
                    fornecedor: '',
                    plano_de_contas: '',
                    data: '',
                    valor: '',
                    tipo: '',
                },

                fornecedor_: {
                  nome: '',
                },


           

            }
        },

        mounted(){
                    
            console.log(urlParams.get('id'))
            if (urlParams.get('id')) {
              this.abrir(urlParams.get('id'))
              
            }

            //this.carregar();
            this.carregarPlanos();
            
        
        },

        watch:{
            'despesa.fornecedor'(newValue){
                 this.buscarNomeIdFornecedor(newValue);
            },

            'despesa.plano_de_contas'(newValue){
                 this.buscarNomePlanoContas(newValue);
            }
        },



        methods:{
       
          async abrir(despesa) {
            try {
              let response = await axios.get(Config.baseURL + '/movimentacoes/despesas/' + despesa + '/abrir')
              this.despesa = response.data;

            } catch (error) {
              console.log('Erro:', error)
            }
          },


          async buscarNomeIdFornecedor(id){

            try{
                let response = await axios.get(Config.baseURL + `/fornecedores/buscar/${id}`)
                this.fornecedor_.nome = response.data.nome;
            } catch (error){
                console.log('Erro:', error)
            }
          },

          async buscarNomePlanoContas(id){

            try{
                let response = await axios.get(Config.baseURL + `/planoContas/buscar/${id}`)
                this.nomePlanoContas = response.data.descricao;
            } catch (error){
                console.log('Erro:', error)
            }
        },

            async carregar(){
               /** await axios.get('http://localhost:80/api/user').then(response => {
                console.log(response)
                this.dados = response.data
                this.dados2 = response.data})
                .catch(error => console.log(error));

                console.log('ok :',this.dados);*/

                try {
                    let response = await axios.get(Config.baseURL + '/fornecedores/index');
                    this.dados = response.data;

                    } catch (error) {
                        console.log('Erro:', error)
                    }
            },

            async carregarPlanos(){
                try {
                    let response = await axios.get(Config.baseURL + '/planoContas');
                    this.planos = response.data;

                    } catch (error) {
                        console.log('Erro:', error)
                    }
            },


            async mudarNome(nome){
                console.log("NOME :",nome);

                await axios.get(Config.baseURL + '/fornecedores/filtrar',{
                    params: {
                        search: nome
                    }
                }
                ).then(response => {
                    //console.log(response)
                    this.dados2 = response.data})
                    .catch(error => console.log(error));

            },

            adicionarFornecedor(event1, event2){
                //alert("aqui"+event1+" "+event2);
                // this.idFornecedor = event1,
                // this.nomeFornecedor = event2;
                
                this.despesa.fornecedor = event1
                this.fornecedor_.nome = event2

                $('#exampleModal').modal('hide');
                //this.$refs.meu-modal.hide(); lembrar de fechar modal
            },

            adicionarPlano(event){
                this.nomePlanoContas = event.descricao;
                this.despesa.plano_de_contas = event.id;
                $('#exampleModal2').modal('hide');
            },

            voltar(){
                window.location.href = Config.baseURL + '/'
            },


            async salvar() {
                //alert(this.despesa.planoDeContas);
          
              try {
                this.loading = true;
                if(this.despesa.id){
                    await axios.post(Config.baseURL + '/movimentacoes/despesas/' +this.despesa.id + '/atualizar', this.despesa);
               
                }else{
                    await axios.post(Config.baseURL + '/movimentacoes/despesas/cadastrar', this.despesa)
                    
                }
                
                
              } catch (error) {
                console.log('Erro:', error)
              } finally {
                this.loading = false
                window.location.href = Config.baseURL + '/movimentacoes/despesas'
              }

            }

        }
    }



</script>