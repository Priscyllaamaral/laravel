<template>
    <div class="container ajustar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 corH5">
                    <h2><b>Registrar Vendedor</b></h2>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-8">
                        <label>Nome</label>
                        <input v-model="vendedor.nome" type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>CPF</label>
                        <cpf-cnpj v-model="vendedor.cpf" ></cpf-cnpj>
                    </div>
                    
                </div>
                <div class="row">
                    
                    <div class="form-group col-lg-4">
                        <label>RG</label>
                        <input v-model="vendedor.rg" type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-8">
                        <label>Email</label>
                        <input v-model="vendedor.email" type="text" class="form-control">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label>Celular</label>
                        <input v-model="vendedor.celular" type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Data de Nascimento</label>
                        <input v-model="vendedor.data_nascimento" type="date" class="form-control">
                    </div>
                    
                </div>

                <button @click="salvar" type="button" class="btn btn-primary" style="float:right">Salvar</button>
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
        vendedor : {
            nome :'',
            cpf : '',
            rg : '',
            email : '',
            celular: '',
            data_nascimento : ''
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
        salvar(){

            let resposta = null;
            if(this.vendedor.id){
                resposta = axios.post(Config.baseURL + '/vendedores/' + this.vendedor.id + '/atualizar', this.vendedor);

            }
            else{
                resposta = axios.post(Config.baseURL + '/vendedores/cadastrar', this.vendedor);

            }

            if(resposta){
                    window.alert('Vendedor Salvo');
                    window.location.href = Config.baseURL + '/vendedores'
                }
        },

        async abrir(id){
            try {
                let response = await axios.get(Config.baseURL + '/vendedores/' + id + '/abrir');
                this.vendedor = response.data;

                } catch (error) {
                console.log('Erro:', error);
            }
        },
  }
}
</script>
