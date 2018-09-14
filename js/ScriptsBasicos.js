var addr=localStorage.getItem('endereco');
var app = new Vue({
    el: '#app',
    data: {
        DDD: "",
        DDDto: "",
        tempo: "",
        plano: "",
        destino: "",
        resposta: [],
        mensagem: "",
        /******************/
        lista: [],
        planos: [],
        /*******************/
        btnShow: true,
        /*******************/
    },
    methods: {

        btn() {
            this.btnShow = true;
        },

        calculo: function () {
            var dados = this;
            var x = dados.DDD.length;
            var passa = 1;
            if (x == "0") {
                alert("de qual ddd vc vai ligar?");
                document.getElementById("ddd").focus();
                return
            }
            var x = dados.destino.length;
            if (x == "0") {
                alert("para qual ddd vc vai ligar?");
                document.getElementById("destino").focus();
                return
            }
            var x = dados.tempo.length;
            if (x == "0") {
                alert("qual o tempo da ligação?");
                document.getElementById("tempo").focus();
                return
            }
            var x = dados.plano.length;
            if (x == "0") {
                alert("qual o plano que vai utlizar?");
                document.getElementById("plano").focus();
                return
            }

            var computar = "http://"+addr+"/dados/computaDados.php?&ddd=" + dados.DDD + "&ddd2=" + dados.destino + "&tempo=" + dados.tempo + "&plano=" + dados.plano + "";
            axios.get(computar).then(
                    function (response)
                    {
                        console.log(dados.tempo);
                        console.log(computar);

                        dados.resposta.unshift(response.data);

                        dados.btnShow = false;
                    }
            );
        }
    },
    watch: {
        DDD: function (value) {
            var All = this;
            var destinoCompativel = 'http://'+addr+'dados/busca.php?ddd=' + value;
            axios.get(destinoCompativel)
                    .then(function (response) {
                        All.DDDto = response.data
                    });
        },

    },
    created: function () {
        var All = this;
        var LocalizaDDD = "http://"+addr+"dados/fonte.php?query=0";
        console.log("\n endereço = "+LocalizaDDD );
        axios.get(LocalizaDDD).then(
                function (response)
                {
                    All.lista = response.data;
                    All.DDD = (Object.keys(response.data)[0]);
                }
        );
        var LocalizaPlanos = "http://"+addr+"dados/fonte.php?query=1";
        axios.get(LocalizaPlanos).then(
                function (response)
                {
                    All.planos = response.data;
                }
        );

    }
})
