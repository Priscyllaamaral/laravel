<template>
    <div class="container ajustar">
        <div class="row">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12">
                    
                        <div class="input-group">
                            <div class="col-lg-5">
                                <h3><b>Movimento de Caixa</b></h3>
                            </div>


                            <div class="col-lg-1">
                                <button type="button" class="btn btn-link btn-lg" style="color:black;">
                                    <i class="bi bi-printer"></i>
                                </button>
                            </div>
                    
                    
                        
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-link btn-lg" style="color:black;">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>
                            </div>
                          

                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03" style="color:black" disabled>Data</button>
                                    </div>
                                    <input type="date" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <br>
                <div class="row" >
                    <div class="col-lg-12" id="linha">
                        <div class="row" >
                            <div class="input-group">
                                <div class="col-lg-4" >
                                    <div class="input-group">
                                        <input  type="text" class="form-control m-0" style="max-width: 85%; min-width: 85%;" placeholder="Buscar">
                                        <div class="input-group-append m-0">
                                            <button  data-toggle="modal" data-target="#exampleModal2" class="btn btn-outline-secondary cor m-0" type="button">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2">
                                    <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-light m-0" style="color:black;">
                                        Lançamento    <i class="bi bi-cursor"></i></button>
                                </div>

                                <div class="col-lg-1">
                                    <button type="button" class="btn btn-light m-0" style="color:black;"><i class="bi bi-card-checklist"></i></button>
                                </div>


                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <div class="col-lg-4">
                                            <label style="float:right">Entradas</label>
                                            <input v-model="entradas" class="inp" style="color: green; float:right">
                                        </div>
                                        <div class="col-lg-4">
                                            <label style="float:right">Saídas</label>
                                            <input v-model="saidas" class="inp" style="color: red; float:right">
                                        </div>
                                        <div class="col-lg-4">
                                            <label style="float:right">Saldo</label>
                                            <input v-model="saldo" class="inp" style="color: blue; float:right">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>  
                </div>  
                <br>
                
                <div class="row">
                    <div class="col-lg-">
                        <div class="scroll">
                            <table class="table table-bordered table-dark ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Data</th>
                                        <th>Movimento</th>
                                        <th>Observaçāo</th>
                                        <th>Forma Pag.</th>
                                        <th>Valor</th>
                                        <!-- <th>Ação</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in caixa" :key="index">
                                        <th> {{ item.id }} </th>
                                        <th> {{ item.data | dataBR }} </th>
                                        <th> {{ item.tipo }} </th>
                                        <th> {{ item.historico }} </th>
                                        <th>{{ item.forma_pagamento }}</th>
                                        <th>{{ item.valor | valorBR}}</th>
                                        <!-- <th><button type="button" class="btn btn-secondary"  @click="editar(item.id)"><i class="bi bi-pencil-square"></i></button>
                                            <button type="button" class="btn btn-secondary"  @click="excluir(item.id)"><i class="bi bi-trash"></i></button></th> -->
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lançamento Manual</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                         
                                <div class="input-group">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Movimento</label>
                                            <select v-model="movimento.tipo" arial-label="Tipo" class="form-select">
                                                <option selected>Opções</option>
                                                <option>Entrada</option>
                                                <option>Saída</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Forma de Pag.</label>
                                            <select v-model="movimento.forma_pagamento" type="text" class="form-select">
                                                <option selected>Tipo</option>
                                                <option value="Pix">PIX</option>
                                                <option value="Dinheiro">Dinheiro</option>
                                                <option value="Cartão Débito">Cartão Débito</option>
                                                <option value="Cartão Crédito">Cartão Crédito</option>
                                                <option value="Cheque">Cheque</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Valor</label>
                                            <input v-model="movimento.valor" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                 
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Observações</label>
                                    <textarea v-model="movimento.historico" rows="6" class="form-control" style="resize: none;"></textarea>
                                </div>
                            </div>

                        </div>
                     
                    <div class="form-check form-check-inline">
                        <input class="form-check-input confirmacao" type="checkbox" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Sangria </label>
                    </div>
                          

                
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button @click="salvar(movimento)" type="button" class="btn btn-light cor" data-dismiss="modal">Salvar</button>
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
import util from '../libs/util';
const urlParams = new URLSearchParams(queryString);

export default {
    
    data() {
        return{
            caixa:'',
            entradas: 0,
            saidas: 0,
            saldo: 0,



            movimento:{
                id: null,
                data: '',
                historico: '',
                forma_pagamento: '',
                tipo: '',
                valor: '',
                sangria: 0

            }
        }
        
    },
    methods:{

        salvar(movimento){
            this.movimento.data = new Date().toISOString().slice(0, 19).replace('T', ' ');
            console.log(movimento);
            let resposta = axios.post(Config.baseURL + '/movimentoCaixa/cadastrar', movimento);

            if(resposta){
                window.alert('Salvo com Sucesso');
                this.carregar();
                //window.location.href = Config.baseURL + '/caixa';
            }

            this.movimento = {
                id: null,
                data: '',
                historico: '',
                forma_pagamento: '',
                tipo: '',
                valor: '',
                sangria: 0

            }
        },
        async carregar(){
            let resposta = await axios.get(Config.baseURL + '/movimentoCaixa/listar');
            this.caixa = resposta.data;
            //console.log(typeof(this.caixa));
            //console.log(this.caixa);
            //this.somaEntradas();

        },

        async somaEntradas(){
            console.log("chamou");
            let entrada = 0;
            let saida = 0;
            for (let index = 0; index < this.caixa.length; index++) {
                let element = this.caixa[index];
                
                if(element.tipo == 'Entrada'){
                    entrada+=element.valor;
                }
                else if(element.tipo == 'Saída'){
                    saida+=element.valor;
                }
                
            }
            this.entradas = await util.valorBR(entrada);
            this.saidas = await util.valorBR(saida);
            this.saldo = await util.valorBR(entrada - saida);
        }

    },

    mounted(){
        this.carregar();
    },

    watch:{
        'caixa' (newValue){
            console.log("alterou");
            this.somaEntradas();
        },

        'entradas' (newValue){
            this.entradas = newValue;
        },

        'saidas' (newValue){
            this.saidas = newValue;
        },

        'saldo' (newValue){
            this.saldo = newValue;
        }
    }
}
</script>



<style scoped>


.cor{
    background-color:rgb(142, 123, 187);
    color:white;
}

.inp{
    border: none;
    text-align: right;
    font-weight: bold;
}

#linha {
  width: 100%;
  border-bottom: 1px solid #000000;
}

.confirmacao {
    min-width: 10px;
    min-height: 10px;
    margin-right: 5px;
}

.scroll {
    min-height: 100px;
    max-height: 500px;
    overflow-y: scroll;
  }

</style>