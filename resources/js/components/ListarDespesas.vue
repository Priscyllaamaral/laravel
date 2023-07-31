<template>
    <div class="container ajustar">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <h1 style="color: aliceblue;"> Lista de Despesa 
                    <a href="/movimentacoes/despesas/nova" class="btn" style="float:right">
                        <button type="button" class="btn btn-light btn2" style="border-color: rgb(217, 219, 218);"> Nova Despesa</button></a>
                    <a class="btn" style="float:right">
                        <button data-toggle="modal" data-target="#modal2" type="button" class="btn btn-light btn2" style="border-color: rgb(217, 219, 218);"> 
                            Filtrar Despesa</button></a>
                    <a class="btn" style="float:right">
                        <button @click="novamente = true; carregar()" type="button" class="btn btn-light btn2" style="border-color: rgb(217, 219, 218);"> 
                            Mostrar Tudo</button></a>
                </h1>
                
              </div>
          </div>
      </div>

      <div class="scroll">

        <table class="table table-striped table-bordered " style="background-color: aliceblue;">
            <thead>
                <tr>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Plano de contas</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Açōes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for= "(item, index) in dados" :key="index">
                        <th scope="row">{{ item.nome }}</th>
                        <th>{{ item.descricao }}</th>
                        <th>{{ item.data | dataBR }}</th>
                        <th>{{ item.valor }}</th>
                        <th>{{ item.tipo }}</th>
                        <th>
                            
                            <button type="button" class="btn btn-light" @click="editar(item.id)" style="border-color: rgb(217, 219, 218);">
                                <i class="bi bi-pencil-square"></i></button>
                        
                        
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#confirmar"
                            @click="apagar(item)" style="border-color: rgb(217, 219, 218);">
                                <i class="bi bi-trash"></i></button>
                            
                        </th>
                    </tr>                      
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo deletar a despesa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Nome : {{ nomeFornecedor }}</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" @click="confirmar" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <!-- Modal -->
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filtrar Despesa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" >Fornecedor</label>
                                    <div class="input-group">
                                        <input for="" v-model="nomeFornecedor" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Plano de Contas</label>
                                    <div class="input-group">
                                        <input for="" v-model="planoConta" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Tipo</label>
                                    <div class="input-group">
                                        <select class="form-select" aria-label="Tipo" v-model="tipo">
                                            <option selected>Despesa</option>
                                            <option value="Fixa">Fixa</option>
                                            <option value="Flexível">Flexível</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="">Data Início</label>
                                    <div class="input-group">
                                        <input v-model="dataInicio" type="date" class="form-select" aria-label="Tipo">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Data Fim</label>
                                    <div class="input-group">
                                        <input v-model="dataFim" type="date" class="form-select" aria-label="Tipo">
                                    </div>
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" @click="carregar" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
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
            fornecedores: '',
            nome: '',
            planosConta: '',
            del : -1,
            nomeFornecedor: '',
            planoConta : '',
            tipo : '',
            novamente : false,
            dataInicio : null,
            dataFim : null
        
        }

    },

    mounted(){
        this.carregar();
        //this.buscarNomeFornecedor();
        //this.buscarPlanoContas();
    },

    watch:{

    },

    methods:{

      
        confirmar: function () {
            this.deletar(this.del);
        },
        async carregar(){
            try {
                let response = await axios.get(Config.baseURL + '/movimentacoes/despesas/listar',{
                    params:{
                        nomeFornecedor : this.nomeFornecedor,
                        planoConta: this.planoConta,
                        tipo: this.tipo,
                        dataInicio : this.dataInicio,
                        dataFim : this.dataFim
                    }
                });
                console.log("aqui");
                this.dados = response.data;
                $('#modal2').modal('hide');

                console.log(this.novamente);

                if(this.novamente){
                    window.location.href = Config.baseURL + '/movimentacoes/despesas';
                    this.novamente = false;
                }
                

            } catch (error) {
                console.log('Erro:', error)
            }
        },


       
        apagar(item){
            this.nomeFornecedor = item.nome;
            this.del = parseInt(item.id);

        },

        formatarData(data){
            let date = new Date(data);

            let formater = Intl.DateTimeFormat('pt-BR',{dateStyle:"short"});

            return formater.format(date);
        },
     

      
        deletar(id){
            
            try{
                axios.post(Config.baseURL + `/movimentacoes/despesas/destroy/${id}`)
                .then(response => {
                    let i = this.dados.map(data => data.id).indexOf(id);
                    this.dados.slice(i, 1);
                });
                
            }catch(error){
                console.log(error);
            }finally{
                window.location.href = Config.baseURL + '/movimentacoes/despesas';
            }

                
            
        },

       

        editar(id){
            window.location.href = Config.baseURL + '/movimentacoes/despesas/editar?id='+id
        
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

  .btn2{
    border-radius: 0px 15px 15px 15px;
  }

</style>
