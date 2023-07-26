import Vue from 'vue';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('clientes', require('./components/Clientes.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('listar-despesas', require('./components/ListarDespesas.vue').default);
Vue.component('despesas', require('./components/Despesas.vue').default);
Vue.component('listar-clientes', require('./components/ListarClientes.vue').default);
Vue.component('listar-produtos', require('./components/ListaProdutos.vue').default);
Vue.component('produtos', require('./components/Produto.vue').default);
Vue.component('mov-estoque', require('./components/MovimentoEstoque.vue').default);
Vue.component('teste', require('./components/Teste.vue').default);
Vue.component('menu-completo', require('./components/Menu.vue').default);
Vue.component('menu-cadastro', require('./components/Cadastros.vue').default);

Vue.component('campo-valor', require('./components/extras/CampoValor.vue').default);
Vue.component('vendas', require('./components/Vendas.vue').default);
Vue.component('listar-movimentos', require('./components/ListaMovEstoque.vue').default);
Vue.component('listar-vendas', require('./components/ListarVendas.vue').default);
Vue.component('fornecedor-pessoal', require('./components/FornecedorPessoal.vue').default);
Vue.component('fornecedor-endereco', require('./components/FornecedorEndereco.vue').default);
Vue.component('fornecedor-observacoes', require('./components/FornecedorObservacoes.vue').default);
Vue.component('fornecedor-tabs', require('./components/Fornecedores.vue').default);
Vue.component('fornecedor-listar', require('./components/FornecedoresListar.vue').default);
