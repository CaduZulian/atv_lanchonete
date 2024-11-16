# Atividade-Lanchonete

Atividade realizada para a disciplina de desenvolvimento web II, onde o intuito era desenvolver uma aplicação em PHP utilizando Laravel e banco de dados MySQL, onde fosse possível gerenciar uma lanchonete com todos os seus fluxos.

<div align="center">
<img src=".github\project-image.png" alt="Atividade-Ranking"/><br />
</div>

## Ferramentas utilizadas

- **[PHP](https://www.php.net/)**
- **[MySQL](https://www.mysql.com/)**
- **[Xampp](https://www.apachefriends.org/pt_br/index.html)**
- **[Laravel](https://laravel.com/)**
- **[Livewire](https://livewire.laravel.com/)**

## Como rodar o projeto localmente

Para rodar o projeto localmente, é necessário ter instalado o Composer, Laravel e Xampp (ou outro servidor PHP).

Com todas essas ferramentas instaladas, basta seguir os comandos abaixo:

```bash
# baixe as dependências do projeto
$ composer install

# gere um arquivo .env baseado no exemplo
$ cp .env.example .env

# crie as tabelas no banco de dados
$ php artisan migrate

# popule o banco de dados
$ php artisan db:seed

# rode a aplicação
$ php artisan serve
```

# TODO
- Por ser um projeto de faculdade com tempo limitado, e para que todos os integrantes do grupo conseguissem entender com mais facilidade o projeto, vários métodos, variáveis, models e afins foram escritos utilizando PT-BR ao invés do inglês. Uma melhoria seria reescrever o código para que tudo esteja padronizado no inglês.
- Por falta de conhecimento e familiaridade com o ambiente PHP, provavelmente muitas boas práticas foram deixadas de lado ao desenvolver esse projeto. Uma possível melhoria seria aplicar as boas práticas.
