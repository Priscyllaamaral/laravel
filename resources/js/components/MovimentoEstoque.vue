<template>
    <div class="container ajustar">
        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <h4 class="card-header" style="background-color: antiquewhite">
                        Movimento Estoque
                    </h4>

                    <div class="card-body">
                        <form>
                            <div class="form-row" >
                                <div class="form-group col-md-3">
                                    <label> Movimento </label>
                                    <select v-model="movimento.movimento" type="text" class="form-control" >
                                        <option selected>Tipo</option>
                                        <option value="Entrada">Entrada</option>
                                        <option value="Saída">Saída</option>
                                        <option value="Transferência">Transferência</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label > Fornecedor </label>
                                    <div class="input-group">
                                        <input type="text" v-model="movimento.fornecedor_id" class="form-control" style="max-width: 15%; min-width: 15%;" readonly>
                                        <input type="text" v-model="fornecedor_.nome" class="form-control" style="max-width: 75%; min-width: 75%;" >
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal2" 
                                            @click="mudarNomeFornecedor(fornecedor_.nome)" type="button"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 total" style="text-align: center;">
                                    <label  style="color: white;"><b> TOTAL  </b>  </label>
                                    <br/>
                                    <h4><b>{{ somaTotalLiquido | valorBR }}</b> </h4>
                                </div>
                            </div>
                            
                            <div class="form-row " id="linha">
                                <div class="form-group col-md-3">
                                    <label>Data</label>
                                    <input v-model="movimento.data" class="form-control" type="date"/>        
                                </div>    
                            </div>

                            <br/>
                        
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label > Produto </label>
                                    <div class="input-group">
                                        <input type="text" v-model="movimentoItem.codigo" class="form-control" style="max-width: 15%; min-width: 15%;" readonly>
                                        <input type="text" v-model="nomeProduto" class="form-control" style="max-width: 75%; min-width: 75%;" >
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" 
                                            @click="mudarNome(nomeProduto)" type="button"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label> Quantidade </label>
                                    <input v-model="movimentoItem.quantidade" type="number" class="form-control" >
                                </div>

                                <div class="form-group col-md-2">
                                    <label > Valor de Custo </label>
                                    <!-- <input v-model="produto.valor_custo" type="number" class="form-control " readonly> -->
                                    <campo-valor css="form-control" v-model="produto.valor_custo" disabled/>
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <input v-model="produto.valor_custo" type="number" class="form-control " readonly> -->
                                    <button type="button" @click="adicionar" class="btn btn-primary form-control" style="margin-top: 30px;" >Adicionar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="margin-bottom: 50px;">
                    <div class="card">
                       
                        <h4 class="card-header" style="background-color: antiquewhite;">
                            Produtos
                        </h4>

                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Valor Unitário</th>
                                        <th>Qtd</th>
                                        <th>Subtotal</th>
                                        <th>Ação</th>                                  
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in movimento.itens" :key="index">
                                        <th>{{ item.codigo }}</th>
                                        <th>{{ item.nome }}</th>
                                        <th>{{ item.valor}} </th>
                                        <th>{{ item.quantidade }} </th>
                                        <th>{{ mostrarSubtotal(item.quantidade, item.valor) | valorBR }} </th>
                                        <th><button type="button" @click=eliminar(item.codigo) class="btn bg-transparent"><i class="bi bi-trash"></i></button></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <button v-if="movimento.itens.length >= 1" @click="cancelar" type="button" class="btn btn-danger float-right" style="margin-right: 10px;" >Cancelar</button>
                            </div>
                            <div class="col-sm-5">
                                <button v-if="movimento.itens.length >= 1" @click="salvarMovimento" type="button" class="btn btn-primary float-right" style="margin-right: 10px;" >Salvar Movimento</button>
                            </div>                     
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-end">
                        <button type="button" @click="voltar" class="btn btn-primary float-right" style="margin-right: 10px;" :disabled="loading">Sair</button>
                    </div>
                </div> 
            </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesquisar Produto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" v-model="nomeProduto" @keyup="mudarNome(nomeProduto)" >
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Selecionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for= "(item, index) in dados2" :key="index">
                                <th scope="row">{{ item.id }}</th>
                                <td>{{ item.codigo }}</td>
                                <td>{{ item.nome }}</td>
                                <th><button @click="adicionarMovimento(item)" type="button" data-dismiss="modal"><i class="bi bi-check"></i></button></th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Pesquisar Fornecedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" v-model="fornecedor_.nome" name="search" @keyup="mudarNomeFornecedor(fornecedor_.nome)">
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
                            <tr v-for= "(item, index) in dados" :key="index">
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
    import axios from 'axios';
    import util from '../libs/util';
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);

    export default{

        data(){
            return{

                dados2: '',
                nomeProduto: '',
                idProduto: '',
                produtos: [],
                movimentos: [],
                dataMovimento: null,
                edicao: false,

                valorTotal: 0,
                dados: '',
                loading: false,


                movimento:{
                    id: null,
                    movimento: '',
                    fornecedor_id:'',
                    data: null,
                    itens: [],
                },
         

                movimentoItem:{
                    valor: '',
                    movimentoestoques_id: '',
                    nome: '',
                    codigo: '',
                    quantidade: 1,
                    movimento: ''
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
                    unidade: '',
                    quantidade: 0
                },

                fornecedor_:{
                    nome:'',
                    id: ''
                }

            }
        },

        mounted() {
            //this.carregar();

            console.log(urlParams.get('id'))
            if (urlParams.get('id')) {
              this.abrir(urlParams.get('id'))
              
            }

        },

        methods:{

            async carregar(){
                try{
                    let response = await axios.get(Config.baseURL + '/produtos/listar/');
                    this.dados2 = response.data;
                }catch(erro){
                    console.log(erro);
                }

            },

            async mudarNome(nome){
                //console.log("Nome: ", nome)
                await axios.get(Config.baseURL + '/produtos/filtrar',{
                    params: {
                        search: nome
                    }
                }
                ).then(response => {
                    //console.log(response)
                    this.dados2 = response.data})
                    .catch(error => console.log(error));

            },

            adicionarMovimento(item){
                this.nomeProduto = item.nome
                this.movimentoItem.codigo = item.codigo
                this.idProduto = item.id
                this.produto = item
                //console.log(this.produto)
                $('#exampleModal').modal('hide');
                //exampleModal.hide();

                

                //this.buscarProdutoCodigo(this.idProduto);
            },

            /**async buscarProdutoCodigo(id){

                console.log("ID :", id)

                try{
                    let response = await axios.get(Config.baseURL + '/produtos/' + id + '/abrir');
                    response.data.valor_custo = util.valorBR(response.data.valor_custo)
                    this.produto = response.data;

                }catch(erro){
                    console.log(erro);
                }

            },*/

            selecionarProduto(produto) {
                let produto_ = {
                    codigo: produto.codigo,
                    nome: produto.nome,
                    valor: util.valorUS(produto.valor_custo),
                    quantidade: this.movimentoItem.quantidade,
                };
                

                this.movimento.itens.push(produto_);
            },

            adicionar(){

                this.edicao = true;
                //this.produto.quantidade = parseInt(this.movimentoItem.quantidade);
                this.movimentoItem.valor = util.valorUS(this.produto.valor_custo);
                //this.produtos.push(this.produto);
                this.movimentoItem.nome = this.nomeProduto;
                this.movimento.itens.push(this.movimentoItem);
                

                //this.valorTotal += this.produto.quantidade * util.valorUS(this.produto.valor_custo);

        
                this.movimentoItem = {
                    valor: '',
                    movimentoestoques_id: null,
                    nome: '',
                    codigo: '',
                    quantidade: 1,
                    movimento: ''
               
                }

                // this.produto ={
                //     id: null,
                //     codigo: '',
                //     nome: '',
                //     descricao: '',
                //     quantidade: '',
                //     valor_vista: '',
                //     valor_prazo: '',
                //     valor_atacado: '',
                //     valor_custo: '',
                //     ativo: 0,
                //     fornecedor_id: '',
                //     unidade: '',
                //     quantidade: 0
                // }

                this.nomeProduto = ''
           },

     


            eliminar(produto){
                //console.log("tamanho: ",this.movimentos.length);
                this.edicao = true;
                //const indice = 0
               

                // for (let index = 0; index < this.produtos.length; index++) {
                //     if(this.produtos[index].codigo == produto){
                //         this.indice = this.produtos[index];
                //         this.produtos.splice(index,1);
                //     }
                // }

                for (let index = 0; index < this.movimento.itens.length; index++) {
                    //console.log( this.movimentos[index] )
                    if(this.movimento.itens[index].codigo == produto){
                        this.movimento.itens.splice(index,1);
                    }
                }

                //this.valorTotal -= this.indice.quantidade * util.valorUS(this.indice.valor_custo);



                //console.log("tamanho: ",this.movimentos.length, this.movimentos);

                
                    
            },

            voltar(){
                window.location.href = Config.baseURL + '/'
            },

            async mudarNomeFornecedor(nome){
                //console.log("NOME :",nome);

                await axios.get(Config.baseURL + '/fornecedor/filtrar',{
                    params: {
                        search: nome
                    }
                }
                ).then(response => {
                    //console.log(response)
                    this.dados = response.data})
                    .catch(error => console.log(error));

            },

            adicionarFornecedor(event1, event2){
                this.fornecedor_.id = event1
                this.movimento.fornecedor_id = event1
                this.fornecedor_.nome = event2                    

                $('#exampleModal2').modal('hide');
             
            },

            async salvarMovimento(){
                try {

                        if(this.movimento.id){

                            


                            let resposta  = await axios.post(Config.baseURL + '/movEstoque/'+this.movimento.id+'/atualizar', this.movimento);

                            console.log("editar : ",resposta.data.movimento);


                            // if(this.edicao){
                            //     console.log("ENTREI AQUI!")
                                
                                // let mvto = await axios.get(Config.baseURL + `/movimentoItem/buscar/${this.movimento.id}`);
                                // mvto = mvto.data;
                            
                                
                                //excluir itens
                                // for (let index = 0; index < mvto.length; index++) {
                                //         await axios.post(Config.baseURL + `/movimentoItem/destroy/${mvto[index].id}`);
                                        
                                // }

                                //adicionar
                                // console.log("movimento: ", this.movimentos)
                                // for (let index = 0; index < this.movimentos.length; index++) {
                                //     this.movimentos[index].movimentoestoques_id = this.movimento.id;
                                //     this.movimentos[index].movimento = this.movimento.movimento;

                                //     await axios.post(Config.baseURL + '/movimentoItem/adicionar',this.movimentos[index]);
                                    
                                // }
                                

                            //}



                        }else{
                            this.movimento.fornecedor_id = this.fornecedor_.id;
                            //this.movimento.data = this.dataMovimento;

                    
                            let resposta = await axios.post(Config.baseURL + '/movEstoque/adicionar',this.movimento);

                            console.log(resposta.data.movimento);
            
                            // if(resposta.data.id){
                            //     console.log("ENTREIIIIIIIIIIIII", resposta.data.id, resposta.data.fornecedor_id, resposta.data.data)
                            //     for (let index = 0; index < this.movimentos.length; index++) {
                            //         this.movimentos[index].movimentoestoques_id = resposta.data.id;
                            //         this.movimentos[index].movimento = resposta.data.movimento;

                            //         await axios.post(Config.baseURL + '/movimentoItem/adicionar',this.movimentos[index]);
                                    
                            //     }
                            // }
                        }
                    alert("Salvo com sucesso");

                    window.location.href = Config.baseURL + '/movEstoque/listar'
                    
                } catch (error) {
                    console.log(error)
                }

            },

            cancelar(){
                window.location.href = Config.baseURL + '/movEstoque/'
            },

            mostrarSubtotal(valor1, valor2){
                return (valor1* util.valorUS(valor2));
            },

            async abrir(id){
                try {
                    let response = await axios.get(Config.baseURL + '/movEstoque/' + id + '/abrir');
                    this.movimento = response.data;

                    // let response3 = await axios.get(Config.baseURL + `/movimentoItem/buscar/${id}`);
                    // let movs = response3.data;
                    // this.movimentos = response3.data;
                    this.movimento.itens = response.data.produtos;

                    // let response4 = await axios.get(Config.baseURL + `/fornecedor/buscar/${this.movimento.fornecedor_id}`)
                    this.fornecedor_.nome = response.data.fornecedor.nome;


                    // for (let index = 0; index < movs.length; index++) {
                    //     let product = await axios.get(Config.baseURL + `/produtos/buscar/${movs[index].codigo}`);
                    //     this.produto = product.data[0];
                    //     this.produto.quantidade = movs[index].quantidade;
                    //     console.log(this.produto);
                    //     this.produtos.push(this.produto);
                                
                    //     }

                    } catch (error) {
                    console.log('Erro:', error)
                }
            },

        },

        

        computed:{
            somaTotalLiquido(){
                return this.movimento.itens.reduce((soma, produto)=> {
                    return soma+produto.quantidade * util.valorUS(produto.valor)
                },0);
            }
        }
    }


</script>
<style>
input{
    min-width: 100%;
    max-width: 100%;
}

#linha {
  width: 100%;
  border-bottom: 1px solid #000000;
}

.total{
    border: 5px solid black;
    border-radius: 40px;
    border-color: rgb(248, 148, 148);
    background-color: rgb(200, 197, 197);
}

</style>