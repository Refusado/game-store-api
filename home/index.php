<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./home/img/controller.svg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
    <link rel="stylesheet" href="home/highlightjs.css">
    <link rel="stylesheet" href="home/style.css">
    <title>Game Store API</title>
</head>

<body class="bg-light">
    <main class="container">
        <h1 class="text-center my-4 fs-1 fw-bold">Game Store API</h1>
        <h2 class="col-lg-8 col-xl-6 mx-auto fs-5 my-5 text-center">Uma ingênua API para <b>realizar interações com o banco de dados</b> de uma loja fictícia de jogos</h2>

        <section class="row d-flex align-items-center py-4 py-md-5 bg-dark text-light shadow-stripe">
            <div class="col-xl-7 me-auto">
                <h5>Mantendo o projeto simples...</h5>
                <hr class="w-25 my-4">
                <p>Não é necessário a utilização de headers para o consumo da API, é possível realizar todas as
                    <b>requisições HTTP</b> disponíveis através de parâmetros passados na URL. (Há suporte para todas
                    operações CRUD)
                </p>
            </div>
            <div class="col-10 col-md-6 col-xl-4 mx-auto mx-xl-0 ms-xl-auto mt-4 text-light">
                <h5 class="text-center fw-bold opacity-75">ESTRUTURA DE DADOS</h5>
                <table class="table table-dark table-bordered">
                    <tbody>
                        <tr>
                            <td scope="col">ID</td>
                            <td class="text-muted">5</td>
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

        <section class="row d-flex align-items-center py-4 py-md-5">
            <div class=" mx-auto d-flex align-items-center justify-content-evenly flex-wrap gap-4">
                <div class="d-inline-block mb-4 order-md-2">
                    <h3 class="fs-2 mb-3 text-center fw-bold">COMO FUNCIONA?</h3>
                    <img class="col-8 col-md-5 d-block mx-auto floating" src="./home/img/thinking.svg" alt="Thinking image">
                    <img class="col-3 col-md-3 d-block floating2 ms-auto" src="./home/img/thinking.svg" alt="Thinking image">
                </div>
                <div class="col-11 col-md-6 col-xl-5 border border-1 border-dark rounded shadow p-4 ">
                    <p class="pb-3">
                        Para realizar todas as operações é preciso enviar os parâmetros na URI da API, assim você
                        terá a URL final para conexão a depender da operação desejada.
                    </p>
                    <p class="m-0">
                        A baixo você verá um exemplo de cada operação com a Fetch API, em javascript puro.
                    </p>
                </div>
            </div>

            <h4 class="url col-12 col-lg-6 mx-auto my-5">
                <span>
                    games-store-api.herokuapp.com/...
                </span>
            </h4>

            <ul class="list-unstyled mx-auto mt-3 d-flex flex-wrap justify-content-evenly p-0 mt-5">
                <li class="col-12 p-3 col-xl-5">
                    <h5 class="fs-5 fw-bold text-start opacity-75">C<span class="opacity-75">REATE</span></h5>

                    <div class="mx-auto">
                        <p class="url my-0">
                            <span>
                                create/The Sims 4/98.99/Simulção/Electronic Arts/
                            </span>
                        </p>
                        <div class="text-end">
                            <span class="btn bg-dark bg-opacity-75 text-light rounded-1 mt-2 collapser collapsed" data-bs-toggle="collapse" data-bs-target="#createSpoiler" aria-expanded="false"></span>
                        </div>
                    </div>

                    <div class="collapse my-3" id="createSpoiler">
                        <pre style="margin-bottom: -3rem;">
                            <code class="javascript">// INPUT
                                
fetch('games-store-api.herokuapp.com/create/The Sims 4/98.99/Simulção/Electronic Arts/')
.then(res => res.json())
.then(console.log);
                            </code>
                        </pre>
                        <pre>
                            <code>// OUTPUT

{
    "games": [
        {
            "id": 84,
            "name": "The Sims 4",
            "price": "98.99",
            "category": "Simul\u00e7\u00e3o",
            "company": "Electronic Arts"
        }
    ]
}
                            </code>
                        </pre>
                    </div>
                </li>


                <li class="col-12 p-3 col-xl-5">
                    <h5 class="fs-5 fw-bold text-start opacity-75">R<span class="opacity-75">EAD</span></h5>

                    <div class="mx-auto">
                        <p class="url my-0">
                            <span>
                                games/5/
                            </span>
                        </p>
                        <div class="text-end">
                            <span class="btn bg-dark bg-opacity-75 text-light rounded-1 mt-2 collapser collapsed" data-bs-toggle="collapse" data-bs-target="#readSpoiler" aria-expanded="false"></span>
                        </div>
                    </div>

                    <div class="collapse my-3" id="readSpoiler">
                        <pre style="margin-bottom: -3rem;">
                            <code class="javascript">// INPUT

fetch('games-store-api.herokuapp.com/games/5/')
.then(res => res.json())
.then(console.log);
                            </code>
                        </pre>
                        <pre>
                            <code>// OUTPUT

{
    "games": [
        {
            "id": 5,
            "name": "Uncharted 4: A Thief's End ",
            "price": "64.00",
            "category": "A\u00e7\u00e3o-Aventura",
            "company": "Naughty Dog"
        }
    ],
    "total": 1
}
                            </code>
                        </pre>
                    </div>
                </li>
                <li class="col-12 p-3 col-xl-5">
                    <h5 class="fs-5 fw-bold text-start opacity-75">U<span class="opacity-75">PDATE</span></h5>

                    <div class="mx-auto">
                        <p class="url my-0">
                            <span>
                                update/2/Grand Theft Auto V/20.00/Ação-Aventura/Rocstar/
                            </span>
                        </p>
                        <div class="text-end">
                            <span class="btn bg-dark bg-opacity-75 text-light rounded-1 mt-2 collapser collapsed" data-bs-toggle="collapse" data-bs-target="#updateSpoiler" aria-expanded="false"></span>
                        </div>
                    </div>

                    <div class="collapse my-3" id="updateSpoiler">
                        <pre style="margin-bottom: -3rem;">
                            <code class="javascript">// INPUT
                            </code>
                        </pre>
                        <pre>
                            <code>// OUTPUT
                            </code>
                        </pre>
                    </div>
                </li>
                <li class="col-12 p-3 col-xl-5">
                    <h5 class="fs-5 fw-bold text-start opacity-75">D<span class="opacity-75">ELETE</span></h5>

                    <div class="mx-auto">
                        <p class="url my-0">
                            <span>
                                delete/84/
                            </span>
                        </p>
                        <div class="text-end">
                            <span class="btn bg-dark bg-opacity-75 text-light rounded-1 mt-2 collapser collapsed" data-bs-toggle="collapse" data-bs-target="#deleteSpoiler" aria-expanded="false"></span>
                        </div>
                    </div>
                    <div class="collapse my-3" id="deleteSpoiler">
                        <pre style="margin-bottom: -3rem;">
                            <code class="javascript">// INPUT

fetch('games-store-api.herokuapp.com/delete/84/')
.then(res => res.json())
.then(console.log);
                            </code>
                        </pre>
                        <pre>
                            <code>// OUTPUT

{
    "deleted": [
        {
            "id": 84,
            "name": "The Sims 4",
            "price": "98.99",
            "category": "Simul\u00e7\u00e3o",
            "company": "Electronic Arts"
        }
    ]
}
                            </code>
                        </pre>
                    </div>
                </li>
            </ul>
        </section>
    </main>

    <footer class="bg-dark text-light">
        <div class="container">
            <p class="mb-0 py-4 px-2">Renan Freitas &copy 2022</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
</body>

</html>