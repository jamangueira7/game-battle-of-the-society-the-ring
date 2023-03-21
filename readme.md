<p align="center">
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
  <a href="#-como-rodar">Como rodar</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="#-rotas">Rotas</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-story">Storyr</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-como-contribuir">Como contribuir</a>&nbsp;&nbsp;&nbsp;
  </p>
<br>

# Projeto Jogo - Batalha da Sociedade do Anel

## 🚀 Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

- [JavaScript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
- [PHP](https://www.php.net/) - 7.2
- [MySql](https://www.mysql.com/) - 5.7
- [HTML5](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
- [CSS3](https://developer.mozilla.org/pt-BR/docs/Web/CSS)

## 💻 Projeto

Projeto de um jogo de estrategia sobre a batalha da sociedade do anel.

## 🚀 Como Rodar

- Clone o projeto.
- Entre na pasta do projeto clonado e digite o comando `composer install`
- Depois de instaladas todas as dependencias crie um banco no MySql. Eu crie como "game"
- Renovei o arquivo ".env.exmeplo" para ".env" e preencha os seus dados de conexão.

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=game
        DB_USERNAME=root
        DB_PASSWORD=

- Rode o comando para criar o banco e os dados dele `php artisan migration --seed`.
- Agora rode o projeto usando `php artisan serve`. 
- Acesse o projeto pela URL `http://127.0.0.1:8000`.
- Caso apareça um erro de chave execute o comando `php artisan key:generate`.


## Licença

Esse projeto está sob a licença MIT. [MIT license](https://opensource.org/licenses/MIT).
