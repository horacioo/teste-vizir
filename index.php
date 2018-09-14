<?php ob_start(); 
 define("endereco", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ); 
 ?>

<html lang="pt-BR" class="no-js">
    <title>Calcule o plano ideal para você</title>
    <head>

        <link rel="canonical" href="index.php" />
        <meta name="description" content="A Ferramenta ideal para adquirir o plano telefonico certo para você!"/>
        <meta property="og:locale" content="pt_BR" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Calcule aqui mesmo o melhor plano de telefonia para você!" />
        <meta property="og:description" content="Calcule aqui mesmo o melhor plano de telefonia para você!" />
        <meta property="og:url" content="index.php" />
        <meta property="og:site_name" content="calcule seu plano telefonico" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="Calcule aqui mesmo o melhor plano de telefonia para você!" />
        <meta name="twitter:title" content="Calcule aqui mesmo o melhor plano de telefonia para você!" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos/estilo.css">
    </head>
    <body itemscope itemtype="http://schema.org/IndividualProduct">
        
        <div class="container-fluid" id="app" >
            <header class="row topo">
                <div class="fundoTopo"></div>
                <h1 class="col-md-12" itemprop="description">O plano de telefonia Fale Mais vai mudar seu dia a dia!</h1>
            </header>
            <main class="row ">
                <header class="col-md-12">
                    <h2>Encontre aqui o plano de telefonia ideal para você</h2>
                </header>
                <div class="col">
                    <img class="centro" itemprop="image" src="https://vizir.com.br/wp-content/uploads/2016/06/logo_software_studio.png" alt="plano de telefonia">
                </div>
                <h3 class="col-lg-12" itemprop="name">PLano fale mais</h3>
                <p>
                    <span itemprop="about">
                        a Vizir oferece os melhores planos de telefonia, está na dúvida? Conheça o plano Fale Mais e então,use nosso sistema de cálculo 
                        para ter certeza que nossos planos são os mais econômicos do mercado 
                    </span>
                </p>
            </main>
            <section class="row Calculo">
                <span class="col-lg-12"><h3>Calcule o valor da sua conta e veja como nosso planos de telefonia valem mais a pena!</h3></span>
                <span class="col-lg-2 offset-lg-1">
                    <label>meu ddd é : {{DDD}}</label>
                    <select v-model="DDD" id="ddd" class="form-control" name="ddd">
                        <option v-for="item in lista" :value="item.from">{{item.from}}</option>
                    </select>
                </span>
                <span class="col-lg-3">
                    <label> eu farei uma ligação para o ddd:</label>
                    <select v-model="destino" v-on:change="btn()" id="destino" class="form-control" name="ddd">
                        <option v-for="item in DDDto" :value="item">{{item}}</option>
                    </select>
                </span>
                <span class="col-lg-2"><label>tempo de ligação:</label><input  v-on:change="btn()"  id="tempo" class="form-control" type="number" v-model="tempo"></span>
                <span class="col-lg-2">
                    <label>plano escolhido:</label>
                    <select  v-on:change="btn()"  class="form-control" v-model="plano" id="plano">
                        <option v-for="item in planos" :value="item.tempo" >{{item.label}}</option>
                    </select>
                </span>
                <span class="col-lg-1">
                    <span v-if="btnShow" class="col-md-12">
                        <button class="btn btn-success btn-lg" id="calcular" v-on:click="calculo()">calcular</button>
                    </span>
                </span>
                <span class="col-md-12"> 
                    <table class="table table-striped table-dark table-bordered table-hover">
                        <thead>
                        <td >origem</td>
                        <td>destino</td>
                        <td>tempo</td>
                        <td>plano Falemais</td>
                        <td>Com fale mais</td>
                        <td>Sem fale mais</td>
                        </thead>
                        <tr v-for="item in resposta">
                            <td>{{ item.ddd }}</td>
                            <td>{{ item.ddd2 }}</td>
                            <td>{{ item.tempo }}</td>
                            <td>{{ item.nome }}</td>
                            <td>R${{ item.valor_no_plano }}</td>
                            <td>R${{ item.valor_sem_plano }}</td>
                        </tr>
                    </table>
                    <div id="ResultadosRes">
                        <div v-for="item in resposta">
                            <span>origem :<b>{{item.ddd}}</b></span>
                            <span>destino: <b>{{ item.ddd2 }}</b></span>
                            <span>tempo: <b>{{ item.tempo }}</b></span>
                            <span>plano:<b>{{ item.nome }}</b></span>
                            <span>com fale mais <b>R${{ item.valor_no_plano }}</b></span>
                            <span>sem fale mais: <b>R${{ item.valor_sem_plano }}</b></span>
                            <span class="fim"></span>
                        </div>
                    </div>
                </span>
            </section>
        </div>
    </body>
</html>
<?php ob_end_flush(); ?>
<script>

localStorage.removeItem("endereco");
localStorage.setItem("endereco","<?php echo endereco;?>");
</script>
<script defer src="js/vue.js"></script>
<script defer src="js/axios.js"></script>
<script defer src="js/ScriptsBasicos.js"  ></script>