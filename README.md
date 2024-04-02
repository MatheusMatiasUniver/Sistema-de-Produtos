# Sistema de Gestão de Produtos

Este projeto consiste em um sistema de gestão de produtos desenvolvido em PHP com banco de dados MySQL, como parte de um trabalho acadêmico. Ele permite cadastrar, listar e remover fornecedores e produtos, além de possibilitar a adição de produtos a um carrinho de compras.

## Equipe

- Matheus Maiante Marques de Almeida R.A: 227009-1
- João Vitor Alcântara Corrêa R.A: 238744-1
- Luan Virgílio Carreira Nascimento Alves R.A: 228889-1
- João Guilherme Chagas Piaia R.A: 229114-1
- Gustavo Basso Aquino R.A: 213664-1

## Links Úteis

- [Protótipo Figma](https://www.figma.com/file/QMW5flhzFzc7Xqf05Tr2Y3/Trabalho-Sistema-de-gest%C3%A3o-de-produtos?type=design&node-id=0%3A1&mode=design&t=GAgGcR1jGPCSf9gu-1)

## Diagrama de Entidade-Relacionamento (DER)

![Diagrama Entidade Relacionamento](https://github.com/MatheusMatiasUniver/Sistema-de-Produtos/blob/0d72e5f2e556387fbcc1da5ac8aaca3c52898f75/Imagem%20DER%20Sistema%20de%20Produtos.png)

## Funcionalidades

- Cadastro de usuários, produtos e fornecedores.
- Adição e remoção de produtos ao carrinho de compras.
- Autenticação de usuários durante o login.
- Visualização de listas de produtos e fornecedores.

## Requisitos

- Servidor web (Apache, Nginx, etc.)
- MySQL
- Navegador web (para acessar a interface)

## Instalação

1. Clone este repositório para o diretório raiz do seu servidor web.
2. Configure as credenciais do banco de dados no arquivo `conexao.php`.
3. Navegue até a URL do sistema no seu navegador.

## Arquivos

- `adicionar_ao_carrinho.php`: Script PHP para adicionar produtos ao carrinho de compras.
- `cadastro_fornecedores.html`: Página HTML para cadastrar fornecedores na interface.
- `cadastro_fornecedores.php`: Script PHP para cadastrar fornecedores no banco de dados.
- `cadastro_produtos_front.php`: Página HTML para cadastrar produtos na interface.
- `cadastro_produtos.php`: Script PHP para cadastrar produtos no banco de dados.
- `cadastro_usuarios.html`: Página HTML para cadastrar usuários na interface.
- `cadastro_usuarios.php`: Script PHP para cadastrar usuários no banco de dados.
- `carrinho_compras.html`: Página HTML para exibir o carrinho de compras na interface.
- `carrinho_compras.js`: Script JavaScript para manipular o carrinho de compras.
- `conexao.php`: Arquivo PHP para estabelecer a conexão com o banco de dados.
- `create_database.php`: Script PHP para criar o banco de dados se não existir.
- `create_tables.php`: Script PHP para criar as tabelas do banco de dados.
- `fornecedor.php`: Classe PHP para manipular operações relacionadas a fornecedores.
- `index.php`: Página inicial do sistema.
- `lista_fornecedores.php`: Página HTML para exibir a lista de fornecedores.
- `lista_fornecedores.js`: Script JavaScript para carregar e manipular a lista de fornecedores.
- `lista_produtos.php`: Página HTML para exibir a lista de produtos.
- `lista_produtos.js`: Script JavaScript para carregar e manipular a lista de produtos.
- `login.html`: Página HTML para o formulário de login.
- `login.php`: Script PHP para autenticar o usuário durante o login.
- `obter_carrinho.php`: Script PHP para obter os produtos do carrinho de compras.
- `obter_fornecedores.php`: Script PHP para obter os fornecedores do banco de dados.
- `obter_produtos.php`: Script PHP para obter os produtos do banco de dados.
- `produto.php`: Classe PHP para manipular operações relacionadas a produtos.
- `README.md`: Arquivo de documentação com informações sobre o projeto.
- `remover_do_carrinho.php`: Script PHP para remover produtos do carrinho de compras.
- `remover_fornecedor.php`: Script PHP para remover fornecedores do banco de dados.
- `remover_produto.php`: Script PHP para remover produtos do banco de dados.
- `users.php`: Classe PHP para manipular operações relacionadas a usuários.
