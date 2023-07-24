<template>
    <div>
      <label v-if="label" :for="label" :class="{'has-error': erro}">{{label}}</label>
      <input
        class="text-right"
        type="text"
        ref="input"
        autocomplete="off"
        :value="value"
        :name="name"
        :style="{fontSize: fontsize}"
        :class="[css, {'has-error': erro}]"
        :disabled="disabled"
        :readonly="readonly"
        @input="onInput($event.target.value)"
        @blur="onBlur"
        @focus="onFocus"
        @keyup="onKeyUp"
        @keypress="$emit('keypress', $event)"
        @dblclick="$emit('dblclick')"
      >
    </div>
</template>

<script>
    import formMixin from '../../mixins/form-mixin.js'
    
    export default {
        name: 'CampoValor',
        mixins: [formMixin],
        props: {
            value: {
                type: [String, Number],
                default: ''
            },
            css: {
                type: String
            },
            fontsize: {
                type: String
            },
            erro: {
                type: Boolean,
                default: false
            },
            decimais: {
                type: Number,
                default: 2
            },
            formatado: {
                type: Boolean,
                default: true
            }
        },

        data() {
            return {
                valor: null,
            }
        },

        mounted() {
            this.formataNumero(this.valorUS(this.value), this.decimais, ',', '')
        },

        methods: {
            focus() {
              setTimeout(() => {
                this.$refs.input.focus();
              }, 0);
            },

            onInput(value) {
                this.$refs.input.value = value.replace(/[^0-9+\-Ee,]/g, '');

                var formattedValue = value.trim()
                    .slice(0,
                        value.indexOf(',') === -1
                        ? value.length
                        : value.indexOf(',') + this.decimais + 1
                    )
                    if (formattedValue !== value) {
                        this.$refs.input.value = formattedValue
                    }
                this.$emit('input', formattedValue);
            },

            onBlur() {
                let valor = this.$refs.input.value;
                valor = this.formataNumero(this.valorUS(valor), this.decimais, ',', '');
                this.$emit('blur', valor);
                this.$emit('input', valor);
            },

            valorUS(valor) {
                if (valor) {
                    return valor.replace(/\./g, '').replace(',', '.');
                }
            },

            valorBR(valor) {
                if (valor) {
                    return valor.toString().replace(/\./g, ',');
                }
            },

            trunc(valor, decimais) {
                decimais = !decimais ? 2 : decimais;
                valor = valor.replace(/\./g, '').replace(',', '.');
                valor = Math.trunc(parseFloat(valor) * Math.pow(10, decimais)) / (Math.pow(10, decimais));
                return  valor;
            },

            onFocus(e) {
                e.target.select();
            },

            onKeyUp(e){
                this.$emit('keyup', e);
            },

            formataNumero(number, decimals, dec_point, thousands_sep) {
                decimals      = typeof decimals      !== 'undefined' ? decimals      : 2;
                dec_point     = typeof dec_point     !== 'undefined' ? dec_point     : ',';
                thousands_sep = typeof thousands_sep !== 'undefined' ? thousands_sep : '.';

                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + (Math.round(n * k) / k).toFixed(prec);
                    },
                    toFixedFix2 = function(n, prec) {
                        return '' + (Math.trunc(n * 1000000000000) / 1000000000000).toFixed(prec);
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix2(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            },
        },

        // watch: {
        //     value(val, oldval) {
        //         console.log(val, oldval);
        //         // if (this.valor == null || val == '0,00') {
        //         //     this.valor = this.formataNumero(this.valorUS(val), this.decimais);
        //         // }
        //     }
        // }
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