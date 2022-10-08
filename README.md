# Games Store API

## Sobre

Esta é uma API (*Application Program Interface*) que permite o acesso e a interação com o banco de dados de uma fictícia loja de jogos, armazenando e provendo dados necessários para a visualização, criação, edição e exclusão de jogos no banco de dados da loja.

## URI de requisições

A URI principal para as requisições é a raiz do projeto, na raiz está também a página de documentação da API com exemplos de todos os métodos disponíveis que você pode usar como referência.

Há um deploy para testes feito com os recursos gratuítos do [Heroku](https://heroku.com), uma plataforma de nuvem que suporta PHP e permite a hospedagem de projetos como este em seu plano grauíto. Você pode testar a API com este deploy na seguinte URL: [ `https://games-store-api.herokuapp.com/`](https://games-store-api.herokuapp.com/)


## Como usar

Para realizar todas as operações é necessário apenas enviar os devidos dados na URL da API. Então basta colocar as informações a partir da sua necessidade na URI e voilà, você terá a URL final com a estrutura da requisição pronta.

Referência de URI para operação

- ###### CREATE
    ``create/[NOME]/[PREÇO]/[CATEGORIA]/[DESENVOLVEDORA]``

- ###### READ
    ``games/[ID]``
<sub>*Use nada ou id 0 para todos os jogos</sub>

- ###### UPDATE
    ``update/[ID]/[NOME]/[PREÇO]/[CATEGORIA]/[DESENVOLVEDORA]``

- ###### DELETE
    ``delete/[ID]``

---

Veja detalhes e exemplos das operações na documentação completa da API acessando a home da página, na raiz do projeto. (Também hospedada no deploy de teste [https://games-store-api.herokuapp.com/](https://games-store-api.herokuapp.com/))

## Estrutura de dados

Este é um exemplo da estrutura de dados de um jogo cadastrado no banco de dados.

CHAVE | VALOR
------|------------
id | 4
NAME | "Uncharted 4: A Thief's End"
PRICE | "64.00"
CATEGORY | "Ação-Aventura"
COMPANY | "Naughty Dog"
<br>

Os dados acima podem ser obtidos com a seguinte requisição:
 [ `https://games-store-api.herokuapp.com/games/4`](https://games-store-api.herokuapp.com/games/4)

<details>
    <summary>Resposta em JSON</summary>
```json
{
    "games": [
        {
            "id": 4,
            "name": "Uncharted 4: A Thief's End",
            "price": "64.00",
            "category": "A\u00e7\u00e3o-Aventura",
            "company": "Naughty Dog"
        }
    ],
    "total": 1
}
```
</details>