<template>
    <div class="container ajustar">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header" style="background-color: antiquewhite">
                        Vendas
                    </h4>
                    <div class="card-body">
                        <div class="form-row" id="linha">

                            <div class="form-group col-lg-6 totalValor">

                                <h4><b>TOTAL : R$ {{ somaTotalLiquido * acresDescon | valorBR }}</b> </h4>
                            </div>

                            <div class="form-group col-lg-6">                  
                                <button @click="salvar()" class="btn btn-primary float-right" type="button" style="margin-left: 10px;" :disabled="load || editar">Salvar</button>
                                <button @click="confirmar()" class="btn btn-danger float-right" type="button">Cancelar</button>
                            </div>
                        </div>
                        <br>
                        <form>
                            <div class="form-row" >
                                <div class="form-group col-lg-5">
                                    <label > Cliente </label>
                                    <div class="input-group">
                                        <input v-model="cliente.codigo" type="text" class="form-control" style="max-width: 15%; min-width: 15%;" readonly>
                                        <input v-model="cliente.nome" type="text" class="form-control" style="max-width: 75%; min-width: 75%;" >
                                        <div class="input-group-append">
                                            <button  data-toggle="modal" data-target="#exampleModal2" @click="mudarNomeCliente(cliente.nome)" class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label > Data </label>
                                    <input v-model="venda.data" type="date" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label> Status </label>
                                    <select v-model="venda.status" type="text" class="form-control">
                                        <option selected>Tipo</option>
                                        <option value="Aguardando Pagamento">Aguardando Pagamento</option>
                                        <option value="Agendada">Agendada</option>
                                        <option value="Aprovada">Aprovada</option>
                                        <option value="Reembolsada">Reembolsada</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2" style="margin-top: 40px;">
                                    <div class="form-check form-check-inline">
                                        <input v-model="venda.cancelada" class="form-check-input confirmacao espaco" type="checkbox" id="inlineCheckbox1" value="1">
                                        <label class="form-check-label" for="inlineCheckbox1">Cancelada </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" id="linha">
                                <div class="form-group col-md-4">
                                    <label > Tabela </label>
                                    <select v-model="venda.tabela" type="text" class="form-control">
                                        <option selected>Tipo</option>
                                        <option value="Á vista">Á vista</option>
                                        <option value="Á prazo">Á prazo</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label > Forma Pagamento </label>
                                    <select v-model="venda.forma_pagamento" type="text" class="form-control">
                                        <option selected>Tipo</option>
                                        <option value="Pix">PIX</option>
                                        <option value="Dinheiro">Dinheiro</option>
                                        <option value="Cartão Débito">Cartão Débito</option>
                                        <option value="Cartão Crédito">Cartão Crédito</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2" >
                                    <label > Desconto (%) </label>
                                    <input v-model="venda.desconto" class="form-control" type="number">
                                </div>

                                <div class="form-group col-md-2" >
                                    <label > Acréscimo (%) </label>
                                    <input v-model="venda.acrescimo" class="form-control" type="number">
                                </div>
                            </div>

                            <br>

                            <div class="form-row" id="linha">
                                <div class="form-group col-lg-6">
                                    <label > Produto </label>
                                    <div class="input-group">
                                        <input v-model="codigoProduto" type="text" class="form-control" style="max-width: 15%; min-width: 15%;" readonly>
                                        <input v-model="vendaItem.nome" type="text" class="form-control" style="max-width: 75%; min-width: 75%;" >
                                        <div class="input-group-append">
                                            <button data-toggle="modal" data-target="#exampleModal" @click="mudarNome(vendaItem.nome)" class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <label > Quantidade </label>
                                    <input v-model="vendaItem.quantidade" class="form-control" type="number">
                                </div>

                                <div class="form-group col-md-3" >
                                    <label > Valor </label>
                                    <input v-model="valor" class="form-control" type="number" readonly>
                                </div>
                                <div class="form-group col-md-1" >
                                    <button @click="adicionar" type="button" class="form-control btn btn-primary" style="margin-top: 30px;" :disabled="loading">+</button>
                                </div>
                            </div>

                            <br>

                            <h5>Produtos/ Itens da venda</h5>
                            
                            <div class="col-md-12" style="max-height: 200px; overflow-y: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descricao</th>
                                            <th>QTD</th>
                                            <th>Valor U</th>
                                            <th>Valor T</th>
                                            <th>Ação</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in venda.itens" :key="index">
                                            <th>{{ item.codigo }}</th>
                                            <th>{{ item.nome }}</th>
                                            <th>{{ item.quantidade }}</th>
                                            <th>{{ valorComputado(item) }}</th>
                                            <th>{{ item.quantidade * valorComputado(item) }}</th>
                                            <th><button @click=eliminar(item) type="button" class="btn bg-transparent"><i class="bi bi-trash"></i></button></th>
                                        </tr>

                                    </tbody>


                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesquisar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" v-model="cliente.nome" name="search" @keyup="mudarNomeCliente(cliente.nome)">
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
                                <th>{{ item.cpf }}</th>
                                <th><button @click="adicionarCliente(item)" type="button"><i class="bi bi-check"></i></button></th>
                            </tr>                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Modal -->


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
                        <input type="text" v-model="vendaItem.nome" @keyup="mudarNome(vendaItem.nome)" >
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
                                <th><button @click="adicionarProduto(item)" type="button"><i class="bi bi-check"></i></button></th>
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
    import util from '../libs/util';
    const urlParams = new URLSearchParams(queryString);

    export default{
        data(){
            return {

                dados2: '',
                dados:'',
                produtos: [],
                //itensVenda: [],
                editar: true,
                loading: true,
                load: true,
                valor:'',
                tabela:'',
                codigoProduto: '',
         

                venda:{
                    id: null,
                    cliente_id: '',
                    data: '',
                    status: '',
                    forma_pagamento: '',
                    desconto: '',
                    acrescimo: '',
                    tabela: '',
                    cancelada: '',
                    itens: []
                },

                vendaItem:{
                    quantidade: 1,
                    codigo: '',
                    nome: '',
                    valor:'',
                    venda_id:'',
                    valor_vista: '',
                    valor_prazo: ''
                },

                // produto:{
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
                //     quantidade: 0,
                // },

                cliente:{
                    id: null,
                    nome:'',
                    celular:'',
                    email: '',
                    cpf:'',
                    codigo:'',
                    premium:''
                }
            }
        },

        computed:{

            somaTotalLiquido(){

                if(this.venda.tabela == 'Á vista'){
                    return this.venda.itens.reduce((soma, produto)=> {
                        return (soma+produto.quantidade * util.valorUS(produto.valor_vista)) 
                    },0);
                }else{
                    return this.venda.itens.reduce((soma, produto)=> {
                        return soma+produto.quantidade * util.valorUS(produto.valor_prazo)
                    },0);
                }
            },

            acresDescon(){

                let valor = 1;
                let porcentagem = this.venda.acrescimo - this.venda.desconto;

                if(porcentagem < 0){
                    valor = -1 * (( -1 *  porcentagem * 0.01) -1)
                    return valor
                
                }else if(porcentagem > 0){
                      valor = (porcentagem * 0.01) +1
                      return valor
                }

                return valor;
            }

        },

        watch:{
            async 'venda.tabela' (newValue){
                if(this.vendaItem.codigo != ''){
                    let resultado = await axios.get(Config.baseURL + `/produtos/buscar/${this.vendaItem.codigo}`);
                    if(newValue == 'Á vista'){
                        this.valor = resultado.data[0].valor_vista;  
                    }
                    else{
                        this.valor = resultado.data[0].valor_prazo;
                    }
                }
    
            },

            async 'vendaItem.codigo' (newValue){
                
                if(newValue != ''){
                    //console.log("nv : ",newValue);
                    let resultado = await axios.get(Config.baseURL + `/produtos/buscar/${newValue}`);
                
                    if(this.venda.tabela == 'Á vista'){
                        this.valor = resultado.data[0].valor_vista;
                    }
                    else{
                        this.valor = resultado.data[0].valor_prazo;
                    }

                }
            }
            
        },

        mounted() {
            console.log(urlParams.get('id'))
            if (urlParams.get('id')) {
              this.abrir(urlParams.get('id'))
              
            }
        },

        methods:{

            valorComputado(item){
                //console.log("ITEM :", item)
                if(this.venda.tabela == 'Á vista'){
                    return item.valor_vista

                }else{                
                    return item.valor_prazo
                }   
            },

            async abrir(id){
                try {
                    let response = await axios.get(Config.baseURL + '/vendas/' + id + '/abrir');
                    this.venda = response.data;
                    this.venda.itens = response.data.produtos;
                    this.cliente = response.data.cliente;

                    console.log("venda :",this.venda);
                    console.log("venda itens :",this.venda.itens);

                    } catch (error) {
                    console.log('Erro:', error)
                }
            },
                

            async salvar(){
                //this.venda.tabela = this.tabela;
                this.venda.cliente_id = this.cliente.id;
                //this.venda.valor = this.somaTotalLiquido;

                try{


                    if(this.venda.id){
                        await axios.post(Config.baseURL+ '/vendas/'+this.venda.id+'/atualizar', this.venda);
                    }
                  
                    else{
                        await axios.post(Config.baseURL+ '/vendas/adicionar', this.venda);   
                            //if(resposta.data.id){
                                // for (let index = 0; index < this.itensVenda.length; index++) {
                                //     this.itensVenda[index].venda_id = resposta.data.id;
                                //     if(this.tabela == 'Á vista'){
                                //         this.itensVenda[index].valor = this.itensVenda[index].valor_vista;
                                //     }else{
                                //         this.itensVenda[index].valor = this.itensVenda[index].valor_prazo;
                                //     }
                                    
                                //     console.log(this.itensVenda[index])
                                //     await axios.post(Config.baseURL + '/itemVenda/adicionar',this.itensVenda[index]);     
                                // }
                            //}
                        }
                    
                    this.load = true;
                    alert("Venda Salva");
                    window.location.href = Config.baseURL + '/venda';
                    

                }catch(erro){
                    console.log('Erro', erro);
                }

            },

            eliminar(produto){

                this.editar = false;
                this.load = false;
        
                for (let index = 0; index < this.venda.itens.length; index++) {
                    if(this.venda.itens[index].codigo == produto.codigo){
                        this.venda.itens.splice(index,1);
                    }
                }
            },

            adicionar(){
                this.load = false;
                this.editar = false;

              
                //this.produto.quantidade = this.vendaItem.quantidade;

                //this.produtos.push(this.produto);

                this.vendaItem.codigo = this.codigoProduto;
                this.vendaItem.valor = this.valor;

                // this.vendaItem.valor_vista = this.produto.valor_vista,
                // this.vendaItem.valor_prazo = this.produto.valor_prazo,


                // deu bug, por isso tive que fazer isso. estava adicionando vendaItem vazia
                if(!this.loading){
                    this.venda.itens.push(this.vendaItem);
                    
                }

                
                //console.log("itens venda: ",this.venda.itens)

                
                this.loading = true;
                this.codigoProduto = '',
                this.valor = '',

                this.vendaItem = {
                    id: null,
                    quantidade: 1,
                    codigo: '',
                    nome: '',
                    valor:'',
                    venda_id:'',
                    valor_prazo: '',
                    valor_vista: ''
                }

                // this.produto={
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
                //     quantidade: 0,
                // }

            },
            adicionarProduto(item){
                this.codigoProduto = item.codigo;
                //this.produto = item
                // this.vendaItem.valor_prazo = item.valor_prazo;
                // this.vendaItem.valor_vista = item.valor_vista;
                // this.vendaItem.nome = item.nome;
                // this.vendaItem.codigo = item.codigo;

                this.vendaItem = item;
                this.vendaItem.quantidade = 1;
                this.loading = false;
               // console.log(this.vendaItem);
                $('#exampleModal').modal('hide');
            },

            async mudarNome(nome){
            
                await axios.get(Config.baseURL + '/produtos/filtrar',{
                    params: {
                        search: nome
                    }
                }
                ).then(response => {
               
                    this.dados2 = response.data})
                    .catch(error => console.log(error));

            },

            adicionarCliente(item){
                this.cliente = item
                $('#exampleModal2').modal('hide');
            },

            async mudarNomeCliente(nome){
            
                await axios.get(Config.baseURL + '/clientes/filtrar',{
                    params: {
                        search: nome
                    }
                }
                ).then(response => {
               
                    this.dados = response.data})
                    .catch(error => console.log(error));

            },

            confirmar(){
                var result = confirm("Deseja cancelar?");

                if(result){
                    window.location.href = Config.baseURL + '/venda'
                }
            }
        }
    }

</script>

<style>

#linha{
    width: 100%;
    border-bottom: 1px, solid gray;
}

.totalValor{
    border: 2px solid black;
    border-radius: 0px;
    border-color: rgb(227, 189, 189);
    background-color: rgb(200, 214, 172);
    padding-top: 5px;
}


</style>