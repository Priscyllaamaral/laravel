import util from '../libs/util'
import moment from 'moment'
moment.locale('pt-br');

// String.prototype.lpad = function(padString, length) {
//     var str = this;
//     while (str.length < length)
//         str = padString + str;
//     return str;
// }

export default {
    data() {
        return {
        }
    },

    methods: {
        escrever(texto){
            console.log(texto)
        },
        
        log(texto){
            console.log(texto)
        },

        // config(configuracao) {
        //     return this.$store.state.configuracoes.config[configuracao] ? true : false;
        // },
        config(configuracao) {

            let configuracoes = this.$store.state.configuracoes.configuracoes;

            let indice = configuracoes.findIndex(item => {
                return item.Config == configuracao;
            })

            if (indice > -1) {
                return true;
            } 

            return false;
        },

        clone(object) {
            return JSON.parse(JSON.stringify(object))
        },

        lpad(str, padString, length) {
            str = str.toString()
            while (str.length < length) {
                str = padString + str;
            }
            return str;
        },

        gerarTerminais(quantidade = 10) {
            let terminais = [];
            for(let i = 1; i <= quantidade; i++) {
                terminais.push(this.lpad(i, '0', 3))
            }
            return terminais;
        },

        setFocus(campo, select) {
            setTimeout(() => {
                this.$refs[campo].focus();
                if (select) {
                    this.$refs[campo].select();
                }
            }, 100);
        },

        logErro(action, error) {
          this.$store.commit('ADD_ERROR', { action: action, error: error });
        },

        replaceSpecialChars(str) {
          if (str) {
            str = str.toLowerCase();
            str = str.replace(/[áàãäâ]/gi,"a");
            str = str.replace(/[éèëê]/gi,"e");
            str = str.replace(/[íìïî]/gi,"i");
            str = str.replace(/[óòõöô]/gi,"o");
            str = str.replace(/[úùüû]/gi,"u");
            str = str.replace(/[ç]/gi,"c");
            return str;
          }

          return '';
        }
        
    },

    filters: {
        valorBR(valor, decimais) {
            return util.valorBR(parseFloat(valor), decimais)
        },

        formataData(data) {
            if (data == null || data == '0000-00-00 00:00:00') {
                return ''
            }
            return moment(data).format('DD/MM/YYYY')
        },

        dataBR(data) {
            if (data == null || data == '0000-00-00 00:00:00') {
                return ''
            }

            data = data.replace(/\//g, '-');

            return moment(data).format('DD/MM/YYYY');
        },

        dataBR2(date) {
          if (!date) return null
          const data = moment(date).format('ll')
          return data;
        },
        
        dataBR3(date) {
          if (!date) return null
          const data = moment(date).format('ll' + ' | ' + 'HH:mm')
          return data;
        },

        dataHoraBR(datahora) {
          if (!datahora) return null
          return new Date(datahora).toLocaleString();
        },
        
        abrevia(nome) {
            const preposicoes = ['do', 'Do', 'DO', 'da', 'Da', 'DA', 'de', 'De', 'DE', 'dos', 'Dos', 'DOS', 'das', 'Das', 'DAS'];
          
            let partes = nome.split(' ');
          
            let novasPartes = [];
          
            partes.forEach(parte => {
              if (preposicoes.indexOf(parte) == -1) {
                novasPartes.push(parte);
              }
            })
          
            let abreviado = '';
          
            novasPartes.forEach((parte, index) => {
              if (index == 0) {
                abreviado = parte;
              } else if (index < 2) {
                abreviado = abreviado + ' ' + parte.substr(0,1) + '.';
              }
            })
          
            return abreviado;
        }
    }
}