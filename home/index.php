<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./home/assets/img/controller.svg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
    <link rel="stylesheet" href="home/highlightjs.css">
    <link rel="stylesheet" href="home/style.css">
    <title>Games Store API</title>
</head>

<body class="bg-light">
    <main class="container">
        <h1 class="text-center my-4 fs-1 fw-bold">Games Store API</h1>
        <h2 class="col-lg-8 col-xl-6 mx-auto fs-5 my-5 py-2 text-center">Uma ingênua API para <b>realizar interações com o banco de dados</b> de uma loja fictícia de jogos <img src="./home/assets/img/stars.svg" alt="✨"></h2>

        <section class="row d-flex align-items-center py-4 bg-dark text-light shadow-stripe">
            <div class="mt-5 mt-xl-0 col-xl-7 me-auto">
                <h5>Mantendo o projeto simples...</h5>
                <hr class="w-25 my-4">
                <p>Não é necessário a utilização de headers para o consumo da API, é possível realizar todas as
                    <b>requisições HTTP</b> disponíveis através de parâmetros passados na URL. (Há suporte para todas
                    operações CRUD)
                </p>
            </div>
            <div class="col-10 col-md-6 col-xl-4 mx-auto mx-xl-0 ms-xl-auto text-light my-5">
                <h5 class="text-center fw-bold opacity-75">ESTRUTURA DE DADOS</h5>
                <table class="table table-dark table-bordered">
                    <tbody>
                        <tr>
                            <td scope="col">ID</td>
                            <td class="text-muted">4</td>
                        </tr>
                        <tr>
                            <td scope="col">NAME</td>
                            <td class="text-muted">Uncharted 4: A Thief's End</td>
                        </tr>
                        <tr>
                            <td scope="col">PRICE</td>
                            <td class="text-muted">64.00</td>
                        </tr>
                        <tr>
                            <td scope="col">CATEGORY</td>
                            <td class="text-muted">Ação-Aventura</td>
                        </tr>
                        <tr>
                            <td scope="col">COMPANY</td>
                            <td class="text-muted">Naughty Dog</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="row d-flex align-items-center py-4 py-md-4">
            <div class="pt-5 pb-2 mx-auto d-flex align-items-center justify-content-evenly flex-wrap gap-4">
                <div class="d-inline-block mb-4 order-md-2">
                    <h3 class="fs-2 mb-3 text-center fw-bold">COMO FUNCIONA?</h3>
                    <img class="col-8 col-md-5 d-block mx-auto floating" src="./home/assets/img/thinking.svg" alt="Thinking image">
                    <img class="col-3 col-md-3 d-block floating2 ms-auto" src="./home/assets/img/thinking.svg" alt="Thinking image">
                </div>
                <div class="col-11 col-md-6 col-xl-5 border border-1 border-dark rounded shadow p-4 mb-4">
                    <p class="pb-3 m-0">
                        Simples: você faz a requisição na URL e recebe os resultados. <img src="./home/assets/img/smile.svg" alt=":)">
                    </p>
                    <p>
                        Sim, para realizar todas as operações é necessário apenas enviar os devidos dados na URL da API. Então basta colocar as informações a partir da sua necessidade na URI e <i>voilà</i>, você terá a URL final com a estrutura da requisição pronta.
                    </p>
                    <hr>
                    <p class="m-0">
                        Veja a seguir exemplos de cada operação em javascript utilizando a Fetch API e com suas respectivas respostas.
                    </p>
                </div>
            </div>

            <h4 class="col-12 mx-auto mt-5 mb-0 text-center">
                <span class="font-monospace fs-5">
                    https://games-store-api.herokuapp.com/...
                </span>
            </h4>

            <ul class="list-unstyled mx-auto mt-3 d-flex flex-wrap justify-content-evenly p-0 pb-4 mt-4">
                <?php

                $codeExemples = file_get_contents("home/assets/examples.json");
                $codeExemples = json_decode($codeExemples, true);

                foreach ($codeExemples as $op) {
                    $title = strtoupper($op['name']);
                    $firstLetter = substr($title, 0, 1);
                    $title = substr($title, 1);

                    $url = $op['url'];
                    $input = $op['input'];
                    $output = $op['output'];

                    echo '
                <li class="col-12 p-3 col-xl-5">
                    <h5 class="fs-5 fw-bold text-start opacity-75">' . $firstLetter . '<span class="opacity-75">' . $title . '</span></h5>

                    <div class="mx-auto">
                        <p class="url my-0">
                            <span>
                                ' . $url . '
                            </span>
                        </p>
                        <div class="text-end">
                            <span class="btn bg-dark bg-opacity-50 text-light rounded-0 rounded-bottom collapser collapsed" data-bs-toggle="collapse" data-bs-target="#spoiler' . $firstLetter . '" aria-expanded="false"></span>
                        </div>
                    </div>

                    <div class="collapse my-3" id="spoiler' . $firstLetter . '"">
                        <pre style="margin-bottom: -3rem;">
                            <code class="javascript">// INPUT' . $input . '
                            </code>
                        </pre>
                        <pre>
                            <code class="json">// OUTPUT' . $output . '
                            </code>
                        </pre>
                    </div>
                </li>
                    ';
                }

                ?>
            </ul>
        </section>
    </main>

    <footer class="bg-dark text-light py-4">
        <div class="container">
            <p class="mb-0 py-2 text-end ms-auto d-inline-block w-100">Renan Freitas &copy 2022
                <span class="p-2">
                    <a class="mx-2" target="_blank" href="https://github.com/Refusado"><img src="./home/assets/img/github.svg" alt="Github" title="@Refusado"></a>
                    <a class="mx-2" target="_blank" href="https://discord.com/users/412685400847679508"><img src="./home/assets/img/discord.svg" alt="Discord" title="Refu#8308"></a>
                    <a class="mx-2" target="_blank" href="https://www.linkedin.com/in/refu/"><img src="./home/assets/img/linkedin.svg" alt="LinkedIn" title="Renan Freitas"></a>
                </span>
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
</body>

</html>