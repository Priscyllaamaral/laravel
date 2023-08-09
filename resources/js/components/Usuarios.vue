<template>
    <div class="container ajustar" >
        <div class="card cen" style="background-color: darkslateblue;">
            <div class="col-lg-8">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;"> Funcionário </h3>

                    <div class="form-group">
                        <label>Nome</label>
                        <input v-model="usuario.name" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input v-model="usuario.email" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Repetir E-mail</label>
                        <input v-model="email2" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input v-model="usuario.password" type="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Repetir Senha</label>
                        <input v-model="senha2" type="password" class="form-control">
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6">
                            <label>Nível</label>
                            <select v-model="usuario.nivel" class="form-select">
                                <option value="Usuário">Usuário</option>
                                <option value="Administrador">Administrador</option>
                                
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label>Funçāo</label>
                            <select v-model="usuario.nivel2" class="form-select">
                                <option value="Funcionário">Funcionário</option>
                                <option value="Gerente">Gerente</option>
                                <option value="CEO">CEO</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-check form-check-inline">
                            <input v-model="usuario.ativo" class="form-check-input confirmacao" type="checkbox" id="inlineCheckbox1" value="1">
                            <label class="form-check-label" for="inlineCheckbox1">Ativo </label>
                        </div>
                    </div>

                    <br>
                 
                        <button @click="cancelar()" type="button" class="btn btn-secondary">Cancelar</button>
                        <button @click="salvar()" type="button" class="btn btn-secondary" style="background-color:purple" >Salvar</button>
               

                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
const queryString = window.location.search;
import util from '../libs/util';
const urlParams = new URLSearchParams(queryString);

export default{
    data() {
        return {
            usuario:{
                id: null,
                name:'',
                email:'',
                password:'',
                nivel: '',
                nivel2:'',
                ativo: 0
            },

            senha2:'',
            email2:'',
        }
        
    },

    methods:{
        salvar(){
            if(this.usuario.password == this.senha2 && this.email2 == this.usuario.email){
                if(this.usuario.id){
                    let resposta = axios.post(Config.baseURL+ '/usuario/'+this.usuario.id+'/atualizar', this.usuario);

                    if(resposta){
                        window.alert("Salvo com sucesso");
                    }

                }else{
                    axios.post(Config.baseURL + '/usuario/adicionar', this.usuario);
                }
                
            }else{
                window.alert("Email ou Senha não validado");
            } 

            window.location.href = Config.baseURL + '/usuario'
        },

        cancelar(){
            window.location.href = Config.baseURL + '/usuario'
        },

        async abrir(id){
            try {
                let response = await axios.get(Config.baseURL + '/usuario/' + id + '/abrir');
                this.usuario = response.data;

                } catch (error) {
                console.log('Erro:', error);
            }
        },
    },

    mounted() {
        console.log(urlParams.get('id'))
        if (urlParams.get('id')) {
            this.abrir(urlParams.get('id'))
            
        }
    },
}
</script>


<style scoped>

.card-body{
    border: 2px solid purple;
    border-radius: 30px;
    background-color: rgb(235, 225, 235);
}
.cen{
    display: flex;
    align-items: center;
}

.confirmacao {
    min-width: 10px;
    min-height: 10px;
    margin-right: 5px;
    margin-left: 20px;
}

</style>