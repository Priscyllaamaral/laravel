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
                                                            <input v-model="fornecedor.cpfcnpj" class="form-control"/>
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
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Número</label>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Bairro</label>
                                                <input class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>CEP</label>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Cidade</label>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Estado</label>
                                                <input class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Complemento</label>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Ponto de referência</label>
                                                <input class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Comissão</label>
                                                <select class="form-control">
                                                    <option selected>Tipo</option>
                                                    <option value="x">x</option>
                                                    <option value="x">x</option>
                                                    <option value="x">x</option>
                                                    <option value="x">x</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Status</label>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Observaçōes</label>
                                                <textarea rows="4" cols="50" class="form-control"></textarea>
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
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
export default{
    
    data(){
        return{

            fornecedor:{
                foto : null,
                nome: '',
                cpfcnpj: '',
                rg: '',
                data_nascimento:'',
                celular: ''
            }
        }

        
    },
    methods: {
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

        salvar(){
            let resposta = axios.post(Config.baseURL + '/fornecedor/salvar', this.fornecedor);
            if(resposta){
                window.alert('Fornecedor Salvo com sucesso!');
                window.location.href= Config.baseURL+ "/menuCadastro";
            }
        },
                
        
    }
}

</script>
