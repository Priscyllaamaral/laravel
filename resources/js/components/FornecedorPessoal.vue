<template>
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
                await axios.post(Config.baseURL + '/fornecedores/salvar', fd);
   
              
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
                let resposta = axios.post(Config.baseURL + '/fornecedores/salvar', this.fornecedor);
                if(resposta){
                    window.alert('Fornecedor Salvo com sucesso!')
                }
            },
                    
            
        }
    }


</script>
<style>

.redimensionar{
    height: 400px;
    width: 350px;
}

.thumb{
    display:grid;
    height: 100%;
    place-items: center;
    text-align: center;
}

.cont{
    height: 400px;
    width: 350px;
}

.wrapper{
    position: relative;
    height : 400px;
    width: 100%;
    border-radius: 10px;
    background: #fff;
    border: 2px dashed #c2cdda;
    display:flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.image{
    position: absolute;
    height: 100%;
    width: 100%;
    display: flex;
    align-items:  center;
    justify-content: center;
}

.image img{
    height: 100%;
    width: 100%;
    object-fit:cover;
}

.icon{
    font-size: 100px;
    color: #9658fe;
}

.text{
    font-size: 20px;
    font-weight: 500;
    color: #5B5B7B;
}

.file-name{
    position:absolute;
    bottom: 0px;
    width: 100%;
    color: #fff;
    padding: 8px 0;
    font-size: 18px;
    display:none;
    background: linear-gradient(135deg, #3a8ffe 0%, #9658fe 100% );
}

.container{

    margin-bottom: 30px;

}

.card{
    border: none;
}

</style>