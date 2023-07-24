import moment from 'moment'

const util = {
    formataNumero: function(number, decimals, dec_point, thousands_sep) {
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
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    },

    valorUS: function(valor, decimais) {
        valor    = typeof valor !== 'undefined' ? valor : '0';
        decimais = typeof decimais !== 'undefined' ? decimais : 2;

        if (typeof valor === 'number') {
            return parseFloat(valor.toFixed(decimais));
            // valor = valor.toString();
        }

        valor = valor.replace(/[.]/g, '').replace(',', '.');
        valor = this.formataNumero(valor,decimais,'.','');

        return parseFloat(valor);
    },

    isDate: function(date) {
        var pattern =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
        var data = (pattern.test(date));
        if (data) return true;
        else return false;
    },

    valorBR: function(valor, decimais) {
        valor = parseFloat(valor);
        decimais = typeof decimais !== 'undefined' ? decimais : 2;
        if (typeof valor == 'number') {
            return this.formataNumero(valor, decimais,',','.');
        }
        

        if (typeof valor == 'string') {
            valor = valor.replace('.', '').replace(',', '.');
            valor = parseFloat(valor).toFixed(2);
            return this.formataNumero(valor,2,',','.');
            //return parseFloat(valor.replace(",", ".")).toFixed(2).replace(".",",")
        }

    },

    formataTelefone(telefone){
        if (typeof telefone == 'undefined') {
            return '';
        }
        telefone = telefone.replace(/\D/g,"");             //Remove tudo o que não é dígito
        telefone = telefone.substring(0, 11);
        telefone = telefone.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em telefoneolta dos dois primeiros dígitos
        telefone = telefone.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return telefone;
    },

    formataValor(valor){
        if (typeof valor == 'undefined' || valor == '' || valor == null) {
            return '';
        }

        valor = valor.replace(/\D/g,"");
        if (valor == '') {
            valor = '0'
        }

        valor = parseInt(valor.replace(/\D/g,"")).toString();
        valor = valor.replace(/^(\d{1})$/g,"0,0$1");
        valor = valor.replace(/^(\d{2})$/g,"0,$1");
        valor = valor.replace(/(\d)(\d{2})$/,"$1,$2");
        valor = valor.replace(/(\d)(\d{3}),(\d{2})$/,"$1.$2,$3");
        valor = valor.replace(/(\d)(\d{3}).(\d{3}),(\d{2})$/,"$1.$2.$3,$4");
        valor = valor.replace(/(\d)(\d{3}).(\d{3}).(\d{3}),(\d{2})$/,"$1.$2.$3.$4,$5");
        return valor;
    },

    formataData(data){
        if (typeof data == 'undefined' || data == '') {
            return '';
        }

        data = data.replace(/\D/g,"");                    //Remove tudo o que não é dígito
        data = data.replace(/(\d{2})(\d)/,"$1/$2");
        data = data.replace(/(\d{2})(\d)/,"$1/$2");
        data = data.replace(/(\d{2})(\d{2})$/,"$1$2");
        return data;
    },

    selectInput(e) {
      if (e.target.tagName == 'INPUT'){
        setTimeout(() => {
          e.target.selectionStart = 0;
          e.target.selectionEnd = e.target.value.length;
        }, 0);
      }
    },

    selectInputOnFocusEventListener() {
      document.addEventListener('focus', this.selectInput, true);
    },

    removeSelectInputOnFocusEventListener() {
      document.removeEventListener('focus', this.selectInput, true);
    },    

    addKeyDownEventListener(key, callback) {
        window.addEventListener('keydown', event => {
            // event.ctrlKey 
            // event.shiftKey
            // event.altKey
            // event.metaKey
            if (event.keyCode == key) { 
                callback();
            }
        });
    },

    removeKeyDownEventListener() {
        window.removeEventListener('keydown', event => {

        });
    },

    abrirJanela(url) {
        window.open(url, '_blank');
    },

    jsonToString(json) {
        return JSON.stringify(json)
    },

    jsonToObject(json) {
        return JSON.parse(JSON.stringify(json))
    },

    clone(object) {
        return JSON.parse(JSON.stringify(object))
    },

    diasData(data) {
        if (typeof data !== 'undefined') {
            let parts = data.split('/')
            let dataUS  = new Date(parseInt(parts[2]), parseInt(parts[1] - 1), parseInt(parts[0]))
            return moment(dataUS).diff(new Date, "days") + 1
        }
        return '0'
    },

    validarCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g,'');    
        if(cpf == '') return false; 
        // Elimina CPFs invalidos conhecidos    
        if (cpf.length != 11 || 
            cpf == "00000000000" || 
            cpf == "11111111111" || 
            cpf == "22222222222" || 
            cpf == "33333333333" || 
            cpf == "44444444444" || 
            cpf == "55555555555" || 
            cpf == "66666666666" || 
            cpf == "77777777777" || 
            cpf == "88888888888" || 
            cpf == "99999999999")
                return false;       
        // Valida 1o digito 
        let add = 0;
        let rev = 0;
        let i = 0;
        for (i=0; i < 9; i ++)       
            add += parseInt(cpf.charAt(i)) * (10 - i);  
            rev = 11 - (add % 11);  
            if (rev == 10 || rev == 11)     
                rev = 0;    
            if (rev != parseInt(cpf.charAt(9)))     
                return false;       
        // Valida 2o digito 
        add = 0;
        for (i = 0; i < 10; i ++)        
            add += parseInt(cpf.charAt(i)) * (11 - i);  

        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11) 
            rev = 0;    
        if (rev != parseInt(cpf.charAt(10)))
            return false;       
        return true; 
    },

    validarCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g,'');
 
        if(cnpj == '') return false;
        
        if (cnpj.length != 14)
            return false;
    
        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" || 
            cnpj == "11111111111111" || 
            cnpj == "22222222222222" || 
            cnpj == "33333333333333" || 
            cnpj == "44444444444444" || 
            cnpj == "55555555555555" || 
            cnpj == "66666666666666" || 
            cnpj == "77777777777777" || 
            cnpj == "88888888888888" || 
            cnpj == "99999999999999")
            return false;
            
        // Valida DVs
        let tamanho = cnpj.length - 2
        let numeros = cnpj.substring(0,tamanho);
        let digitos = cnpj.substring(tamanho);
        let soma = 0;
        let pos = tamanho - 7;
        let i = 0
        let resultado = 0
        
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }

        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0,tamanho);
        soma = 0;
        pos = tamanho - 7;
        
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }

        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;

        return true;
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
        return cpf.substring(0, 14);
    },

    lpad(str, padString, length) {
        str = str.toString()
        while (str.length < length)
            str = padString + str;
        return str;
    },

    scrollBottom(el) {
        el.scrollTop = el.scrollHeight;
    },

    processarCMC7(cmc7) {

        let DigitosaIgnorarConta = (Banco) => {
            let CodBanco = parseInt(Banco);
            let ignore = 3;
            switch (CodBanco) {
                case 1: 
                    ignore =   2;    // 001 - Banco do Brasil
                    break;
                case 33: 
                    ignore =   2;    // 033 - Santander / Banespa
                    break;
                case 41: 
                    ignore =   0;    // 041 - Banrisul Obs: Este banco utiliza todo o campo para o número da conta
                    break;
                case 104: 
                    ignore =   0;    // 104 - CEF. Utiliza apenas 7, mas os 3 primeiros são necessários para calcular o dv
                    break;
            //  case 237: ignore =   3;    // 237 - Bradesco
                // break;
                case 341: 
                    ignore =   4;    // 341 - Itau
                    break;
                case 389: 
                    ignore =   1;    // 389 - Mercantil
                    break;
                case 399: 
                    ignore =   4;    // 399 - HSBC
                    break;
            //  case 409: ignore =   3;    // 409 - Unibanco
                // break;
                case 479: 
                    ignore =   2;    // 479 - Bank of Boston
                    break;
                default:
                    ignore = 3;
            }

            return ignore;
        }

        
        let banco               = cmc7.substr(1,3).replace(/^0+/, '');
        let agencia             = cmc7.substr(4,4);
        let numero              = cmc7.substr(13,6);//.replace(/^0+/, '')
        let digitoagencia       = cmc7.substr(8,1);
        let digitocontacorrente = cmc7.substr(31,1);
        
        let ignorar = DigitosaIgnorarConta(banco);
        let contacorrente       = cmc7.substr(22 + ignorar, 10 - ignorar);//.replace(/^0+/, '');

        return {
            agencia       : agencia, // + digitoagencia,
            contacorrente : contacorrente,// + digitocontacorrente,
            numero        : numero,
            banco         : banco.padStart(3, '0')
        }
    },

}

export default util;

let valorBR      = util.valorBR;
let valorUS      = util.valorUS;
let isDate       = util.isDate;
let clone        = util.clone;
let scrollBottom = util.scrollBottom;

export {valorBR, valorUS, isDate, clone, scrollBottom}
