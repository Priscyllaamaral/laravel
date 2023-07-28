<template>
     <div class="container ajustar">
        <div class="row">
            <div class="col lg-12">
                <div class="card" style="background-color: white;">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-lg-12">
                            <h3><b>Fornecedores</b></h3>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pessoal</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Endereço</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Observações</button>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="card">
                                                    <div class="thumb">
                                                        <div class="cont">
                                                            <div class="wrapper">
                                                                <div class="image">
                                                                    <img v-bind:src="fornecedor.foto" alt="">
                                                                </div>
                                                                <div class="content">
                                                                    <div class="icon"><i class="bi bi-cloud-upload"></i></div>
                                                                    <div class="text">No file chosen, yet!!</div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <input id="inputFoto" ref="foto" v-on:change="onFileChange" type="file" accept="image/*"> 
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="form-group col-lg-12">
                                                            <label>Nome</label>
                                                            <input v-model="fornecedor.nome" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <label>CPF</label>
                                                            <!-- <input v-model="fornecedor.cpfcnpj" class="form-control"/> -->
                                                            <cpf-cnpj  v-model="fornecedor.cpfcnpj"></cpf-cnpj>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>RG</label>
                                                            <input v-model="fornecedor.rg" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>E-mail</label>
                                                            <input v-model="fornecedor.email" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-5">
                                                            <label>Data Nascimento</label>
                                                            <input v-model="fornecedor.data_nascimento" type="date" class="form-control"/>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label>Celular</label>
                                                            <input v-model="fornecedor.celular" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Rua</label>
                                                <input v-model="fornecedor.endereco.rua" class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Número</label>
                                                <input v-model="fornecedor.endereco.numero" class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Bairro</label>
                                                <input v-model="fornecedor.endereco.bairro" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>CEP</label>
                                                <input v-model="fornecedor.endereco.cep" class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label>Cidade</label>
                                                <input v-model="fornecedor.endereco.cidade" class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Estado</label>
                                                <!-- <input v-model="fornecedor.endereco.estado" class="form-control"/> -->
                                                <select v-model="fornecedor.endereco.estado" class="form-control">
                                                    <option selected>Tipo</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AM</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SP">SP</option>
                                                    <option value="SE">SE</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Complemento</label>
                                                <input v-model="fornecedor.endereco.complemento" class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Ponto de referência</label>
                                                <input v-model="fornecedor.endereco.ponto_referencia" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Comissão</label>
                                                <select  v-model="fornecedor.observacao.comissao" class="form-control">
                                                    <option selected>Tipo</option>
                                                    <option value="Permanente">Permanente</option>
                                                    <option value="Variável">Variável</option>
                                
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Status</label>
                                                <select v-model="fornecedor.observacao.status" class="form-control">
                                                    <option selected>Tipo</option>
                                                    <option value="Ativo">Ativo</option>
                                                    <option value="Suspenso">Suspenso</option>
                                                    <option value="Inapto">Inapto</option>
                                                    <option value="Baixado">Baixado</option>
                                                    <option value="Nulo">Nulo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Observaçōes</label>
                                                <textarea v-model="fornecedor.observacao.observacoes" rows="4" cols="50" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button @click="salvar" type="button" class="btn btn-primary" style="float:right ; margin-right: 20px">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import CpfCnpj from './CpfCnpj.vue';
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
export default{
  components: { CpfCnpj },
    
    data(){
        return{

            fornecedor:{
                id:'',
                foto : null,
                nome: '',
                cpfcnpj: '',
                rg: '',
                data_nascimento:'',
                celular: '',
                endereco:{
                    rua: '',
                    numero: '',
                    bairro: '',
                    cep: '',
                    cidade: '',
                    estado: '',
                    complemento: '',
                    ponto_referencia: ''

                },
                observacao:{
                    comissao:'',
                    status: '',
                    observacoes: ''
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
    methods: {

        async abrir(id){
                try {
                    let response = await axios.get(Config.baseURL + '/fornecedores/' + id + '/abrir');
                    this.fornecedor = response.data;
                    this.fornecedor.endereco =response.data.endereco;
                    this.fornecedor.observacao =response.data.observacao;               

                    console.log(this.fornecedor);

                    } catch (error) {
                    console.log('Erro:', error);
                }
            },
        //para salvar no servidor
        async onFileSelected(event){
            let file = event.target.files[0];
        
            let fd = new FormData();
            fd.append('file',file);
            fd.append('name', 'file')

            let config = {
                header : {
                'Content-Type' : 'multipart/form-data'
                }
            }
            console.log(fd);
            await axios.post(Config.baseURL + '/fornecedor/salvar', fd);

            
        },

        async onFileChange(e) {
            let file = this.$refs.foto.files[0];

            let reader = new FileReader();
            let vm = this;
            reader.onload = function () {
                var dataURL = reader.result;
                vm.fornecedor.foto = dataURL;    
            };

            reader.readAsDataURL(file); 
        
        },

        async salvar(){
            try{
              
                if(this.fornecedor.id){
                   let resposta = await axios.post(Config.baseURL+ '/fornecedores/'+this.fornecedor.id+'/atualizar', this.fornecedor);

                   if(resposta){
                        window.alert('Fornecedor Atualizado com sucesso!');
                        window.location.href= Config.baseURL+ "/fornecedores/todos";
                    }
                }

                else{
                    let resposta = await axios.post(Config.baseURL + '/fornecedor/salvar', this.fornecedor);   
                    if(resposta){
                        window.alert('Fornecedor Salvo com sucesso!');
                        window.location.href= Config.baseURL+ "/fornecedores/todos";
                    }                 
                }

                }catch(erro){
                    console.log('Erro', erro);
                }
            
            
        },  
    }
}

</script>
