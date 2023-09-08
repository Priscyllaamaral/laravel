<template>
    <div class="container ajustar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 corH5">
                    <h2><b> Registrar Produto  </b></h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form>

                    <div class="form-row ">
                        <div class="form-group col-md-2">
                            <label class= "espaco"> Código </label>
                            <input v-model="produto.codigo"  type="text" class="form-control espaco"  >
                        </div>
                        <div class="form-group col-md-10">
                            <label class= "espaco"> Nome </label>
                            <input v-model="produto.nome" type="text" class="form-control espaco"  >
                        </div>
                       
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-10">
                            <label class= "espaco"> Fornecedor </label>
                            <div class="input-group">
                                <input type="text" class="form-control espaco" v-model="produto.fornecedor_id" style="max-width: 10%; min-width: 10%;" readonly>
                                <input type="text" class="form-control espaco" v-model="fornecedor_.nome" style="max-width: 70%; min-width: 70%;" >
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" data-toggle="modal" 
                                  @click="mudarNome(fornecedor_.nome)"
                                  data-target="#exampleModal" type="button"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label> Unidade </label>
                            <input v-model="produto.unidade" type="text" class="form-control"  >
                        </div>
                    </div>
                            

                    <div class="form-row ">
                        <div class="form-group col-md-3">
                            <label class= "espaco"> Valor á Vista </label>
                            <input v-model="produto.valor_vista" type="number" class="form-control espaco"  >
                        </div>
                        <div class="form-group col-md-3">
                            <label class= "espaco"> Valor á Prazo </label>
                            <input v-model="produto.valor_prazo" type="number" class="form-control espaco">
                        </div>
                        <div class="form-group col-md-3">
                            <label class= "espaco"> Valor Atacado </label>
                            <input v-model="produto.valor_atacado" type="number" class="form-control espaco">
                        </div>
                        <div class="form-group col-md-3">
                            <label class= "espaco"> Valor de Custo </label>
                            <input v-model="produto.valor_custo" type="number" class="form-control espaco">
                        </div>
                    </div>

                    
                    <div class="form-check form-check-inline">
                        <input v-model="produto.ativo" class="form-check-input confirmacao" type="checkbox" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Ativo</label>
                    </div>
                    
                    
                    

                    <button type="button" @click="salvar" class="btn btn-primary float-right" style="margin-right: 10px;" >Salvar</button>
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
                            <tr v-for= "(item, index) in dados2" :key="index">
                                <th scope="row">{{ item.id }}</th>
                                <th>{{ item.nome }}</th>
                                <th>{{ item.cpfcnpj }}</th>
                                <th><button @click="adicionarFornecedor(item.id, item.nome)" type="button" data-dismiss="modal"><i class="bi bi-check"></i></button></th>
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
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
    export default{
        data(){
            return{

                dados2: '',
                loading: false,

                fornecedor_:{
                    nome: ''
                },

                produto:{
                    id: null,
                    codigo: '',
                    nome: '',
                    descricao: '',
                    quantidade: '',
                    valor_vista: '',
                    valor_prazo: '',
                    valor_atacado: '',
                    valor_custo: '',
                    ativo: 0,
                    fornecedor_id: '',
                    unidade: ''
                }
            }
        },

        mounted(){
            //this.carregar();
            console.log(urlParams.get('id'))
            if (urlParams.get('id')) {
              this.abrir(urlParams.get('id'))
              
            }
        },

        watch:{
            'produto.fornecedor_id'(newValue){
                if(newValue){
                    this.buscarNomeIdFornecedor(newValue);
                }
            }
        },

        methods:{

            async salvar(){
                try{
                    if(this.produto.id){
                        await axios.post(Config.baseURL + '/produtos/' + this.produto.id + '/atualizar', this.produto);
                        alert("Atualizado com Sucesso")

                    }else{
                        let resposta = await axios.get(Config.baseURL + '/produtos/localizar?codigo='+this.produto.codigo);
                        console.log("PRODUTO: ", resposta.data);
                        if(resposta.data != 1){
                            await axios.post(Config.baseURL + '/produtos/cadastrar', this.produto);
                            alert("Salvo com Sucesso")
                        }else{
                            alert("Já existe produto com este código")
                        }
                    }
                }catch(erro){
                    console.log(erro)
                }finally{

                   window.location.href = Config.baseURL + '/produtos'
                }

            },

           async carregar(){

                try {
                    //let response = await axios.get(Config.baseURL + '/produtos/listar');
                    let response = await axios.get(Config.baseURL + '/fornecedores/index');
                    this.dados2 = response.data;

                    console.log("----->",this.dados2);

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

            async mudarNome(nome){
                //console.log("NOME :",nome);

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

            async abrir(id){
                try {
                    let response = await axios.get(Config.baseURL + '/produtos/' + id + '/abrir')
                    this.produto = response.data;

                    } catch (error) {
                    console.log('Erro:', error)
                }
            },

            adicionarFornecedor(event1, event2){
                this.produto.fornecedor_id = event1
                this.fornecedor_.nome = event2

                $('#exampleModal').modal('hide');
             
            },
            
            voltar(){
                window.location.href = Config.baseURL + '/'
            },
        }
    }



</script>

<style>

.confirmacoes {
    min-width: 20px;
    min-height: 20px;
    margin-right: 5px;
}

</style>