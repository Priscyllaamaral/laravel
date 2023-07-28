<template>
    <div>
      <input
        class="form-control"
        type="text"
        ref="input"
        autocomplete="off"
        :class="[css, {'has-error': erro}]"
        :value="value"
        :name="name"
        :disabled="disabled"
        :readonly="readonly"
        @input="inputEventHandler"
        @blur="blurEventHandler"
        @focus="focusEventHandler"
        @keyup="keyUpEventHandler"
        @keypress="keypressEventHandler"
      >
    </div>
</template>

<script>
    export default {
        name: 'CpfCnpj',
        props: {
            label: {
                type: String,
                default: ''
            },
            value: {
                default: null
            },
            name: {
                default: null
            },
            css: {
                type: String,
            },
            erro: {
                type: Boolean,
                default: false
            },
            readonly: {
                type: Boolean,
                default: false
            },
            disabled: {
                type: Boolean,
                default: false
            },
        },

        mounted() {
            // if (this.value.length) {
            //     this.formataCPFCNPJ()
            // }
        },

        methods: {
            inputEventHandler(e) {
                if (e.target.value.replace(/\D/g, "").length > 11) {
                    e.target.value = this.formataCNPJ(e.target.value)
                } else {
                    e.target.value = this.formataCPF(e.target.value)
                }

                this.$emit('input', e.target.value)
            },
            
            focusEventHandler(e) {
                this.$emit('focus', e);
            },
            
            keyUpEventHandler(e){
                this.$emit('keyup', e);
            },

            blurEventHandler(e){
                this.$emit('blur', e);
            },
            
            keypressEventHandler(e) {
                this.$emit('keypress', e)
            },

            formataCPFCNPJ() {
                if (this.$refs.input.value.replace(/\D/g, "").length > 11) {
                    this.$refs.input.value = this.formataCNPJ(this.$refs.input.value)
                } else {
                    this.$refs.input.value = this.formataCPF(this.$refs.input.value)
                }
            },

            formataCNPJ(cnpj) {
                cnpj = cnpj.replace(/\D/g, "")                           //Remove tudo o que não é dígito
                cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
                cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
                cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
                cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
                return cnpj.substring(0, 18);
            },

            formataCPF(cpf) {
                cpf = cpf.replace(/\D/g, "")                    //Remove tudo o que não é dígito
                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                //de novo (para o segundo bloco de números)
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
                return cpf
            },

            focus() {
                this.$refs.input.focus();
            },

            keypress() {
                // 
            },
        },
    }
</script>

<style scoped>
    .has-error {
        border-color: #dd4b39;
        box-shadow: none;
    }
    label.has-error {
        color: #dd4b39;
    }
</style>