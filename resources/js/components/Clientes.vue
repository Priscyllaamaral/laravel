<template>
    <div class="container ajustar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 corH5">
                    <h2><b> Registrar Cliente  </b></h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form>
                
                    <div class="form-row ">
                        <div class="form-group col-md-8">
                            <label class= "espaco"> Nome </label>
                            <input v-model="cliente.nome" type="text" class="form-control espaco" name="inputNome" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-4">
                            <label> CPF/CNPJ </label>
                            <!-- <input v-model="cliente.cpf" type="text" class="form-control" name="inputCPF" placeholder="CPF"> -->
                            <cpf-cnpj  v-model="cliente.cpf"></cpf-cnpj>
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-4">
                            <label class= "espaco"> Telefone </label>
                            <input v-model="cliente.celular" type="text" class="form-control espaco" name="inputNome" placeholder="Telefone">
                        </div>
                        <div class="form-group col-md-8">
                            <label> E-mail </label>
                            <input v-model="cliente.email" type="email" class="form-control" name="inputCPF" placeholder="E-mail">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class= "espaco"> Endereço/Rua </label>
                        <input v-model="endereco.rua" type="text" class="form-control espaco" name="inputEndereco" placeholder="Endereço">
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class= "espaco"> Cidade </label>
                            <input v-model="endereco.cidade" type="text" class="form-control espaco" name="inputCidade" placeholder="Cidade">
                        </div>

                        <div class="form-group col-md-2">
                            <label> Estado </label>
                            <select v-model="endereco.estado" id="inputEstado" class="form-control">
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

                        <div class="form-group col-md-4">
                            <label> Código postal </label>
                            <input v-model="endereco.codigo_postal" type="text" class="form-control" name="inputCodigo">
                        </div>
                    </div>

                    
                    <div class="form-check form-check-inline">
                        <input v-model="cliente.premium" class="form-check-input confirmacao espaco" type="checkbox" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Cliente Premium </label>
                    </div>

                    <button type="button" @click="salvar" class="btn btn-primary float-right" style="margin-right: 10px;" >Salvar</button>
                    <button type="button" @click="voltar" class="btn btn-primary float-right" style="margin-right: 10px;" >Sair</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import CpfCnpj from './CpfCnpj.vue';
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

    export default {
  components: { CpfCnpj },
        data(){
            return{

                endereco:{
                    id: '',
                    rua: '',
                    cidade: '',
                    estado: '',
                    codigo_postal: '',
                    id_cliente: ''
                },

                cliente:{
                    id: null,
                    nome: '',
                    celular: '',
                    email: '',
                    cpf: '',
                    premium: 0,
                    codigo: ''
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

            async salvar(){
                try{
                    if(this.cliente.id){
                        await axios.post(Config.baseURL + '/clientes/' + this.cliente.id + '/atualizar', this.cliente);
                        await axios.post(Config.baseURL + '/enderecos/' + this.endereco.id + '/atualizar', this.endereco);
                        window.alert("Atualizado com Sucesso")

                    }else{
                        this.endereco.id_cliente
                        let resposta = await axios.post(Config.baseURL + '/enderecos/cadastrar', this.endereco);
                        let id_endereco = resposta.data.id;
                        this.cliente.codigo = id_endereco;

                        await axios.post(Config.baseURL + '/clientes/cadastrar', this.cliente);
                        window.alert("Salvo com Sucesso")
                    }
                }catch(erro){
                    console.log(erro)
                }finally{

                    window.location.href = Config.baseURL + '/clientes'
                }

            },
            async abrir(id){
                try {
                    let response = await axios.get(Config.baseURL + '/clientes/' + id + '/abrir');
                    this.cliente = response.data;

                    //let response3 = await axios.get(Config.baseURL + `/clientes/buscar/${id}` )
                    
                    //console.log("DADOS: ",response3.data.codigo)
                    let response2 = await axios.get(Config.baseURL + '/enderecos/' + id + '/abrir');
                    this.endereco = response2.data[0];

                    } catch (error) {
                    console.log('Erro:', error);
                }
            },

            voltar(){
                window.location.href = Config.baseURL + '/';
            },


        }
    }
</script>

<style>
/* input{
    min-width: 80%;
    max-width: 80%;
} */
.card{
    margin-left: 10px;
    margin-right: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
}
/* .espaco{
    margin-left: 10px;
} */

.confirmacao {
    min-width: 20px;
    min-height: 20px;
    margin-right: 5px;
}

</style>