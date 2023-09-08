import Vue from 'vue';

Vue.component('clientes', require('./components/ClientesForm.vue').default);
Vue.component('listar-clientes', require('./components/Clientes.vue').default);

Vue.component('despesas', require('./components/DespesasForm.vue').default);
Vue.component('listar-despesas', require('./components/Despesas.vue').default);

Vue.component('produtos', require('./components/ProdutosForm.vue').default);
Vue.component('listar-produtos', require('./components/Produtos.vue').default);

Vue.component('fornecedor-tabs', require('./components/FornecedoresForm.vue').default);
Vue.component('fornecedor-listar', require('./components/Fornecedores.vue').default);

Vue.component('mov-estoque', require('./components/MovimentosEstoqueForm.vue').default);
Vue.component('listar-movimentos', require('./components/MovimentosEstoque.vue').default);

Vue.component('vendedor-novo', require('./components/VendedoresForm.vue').default);
Vue.component('vendedor', require('./components/Vendedores.vue').default);

Vue.component('usuario', require('./components/UsuariosForm.vue').default);
Vue.component('usuarios', require('./components/Usuarios.vue').default);

Vue.component('vendas', require('./components/VendasForm.vue').default);
Vue.component('listar-vendas', require('./components/Vendas.vue').default);


// Vue.component('fornecedor-pessoal', require('./components/FornecedorPessoal.vue').default);
// Vue.component('fornecedor-endereco', require('./components/FornecedorEndereco.vue').default);
// Vue.component('fornecedor-observacoes', require('./components/FornecedorObservacoes.vue').default);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('teste', require('./components/Teste.vue').default);
Vue.component('menu-completo', require('./components/Menu.vue').default);
Vue.component('menu-cadastro', require('./components/Cadastros.vue').default);
Vue.component('menu-movimentacoes', require('./components/Movimentacoes.vue').default);
Vue.component('caixa', require('./components/Caixa.vue').default);

Vue.component('campo-valor', require('./components/extras/CampoValor.vue').default);
Vue.component('lista-view', require('./components/listas/ListaView.vue').default);
Vue.component('divider', require('./components/listas/Divider.vue').default);
