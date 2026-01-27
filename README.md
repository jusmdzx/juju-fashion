# Juju Fashion Store 👗

Bem-vindo ao repositório da **Juju Fashion**, um projeto de e-commerce desenvolvido para estudo de desenvolvimento web.

Este projeto possui duas versões integradas neste repositório:

## 🔗 Demonstração Online
Acesse a versão Front-end (Vitrine) rodando direto no navegador:
👉 **[Clique aqui para ver o Site Online](https://jusmdzx.github.io/juju-fashion/)**

---

## 🛠️ Tecnologias Utilizadas

### Versão 1: Sistema Completo (Backend)
* **PHP 8:** Para lógica de login, sessões e CRUD.
* **MySQL:** Banco de dados para salvar produtos e usuários.
* **Apache (XAMPP):** Servidor local.

### Versão 2: Vitrine Dinâmica (Frontend)
* **HTML5 & CSS3:** Estilização responsiva.
* **JavaScript (Fetch API):** Consumo de dados externos.
* **FakeStore API:** Integração com catálogo internacional de produtos.

---

## 🚀 Como rodar o projeto

### Opção A: Versão Completa (PHP + Banco de Dados)
Esta versão inclui o Painel Administrativo (Login, Cadastro e Edição de Produtos).
1.  Instale o [XAMPP](https://www.apachefriends.org/).
2.  Clone este repositório na pasta `C:\xampp\htdocs`.
3.  Importe o arquivo `loja_moda.sql` no seu phpMyAdmin (`localhost/phpmyadmin`).
4.  Configure o arquivo `conexao.php` (se tiver senha no seu banco).
5.  Acesse `localhost/juju_fashion`.

### Opção B: Versão Vitrine (Apenas HTML/JS)
Esta versão roda sem instalação, apenas consumindo a API externa.
1.  Basta abrir o arquivo `index.html` no seu navegador.
2.  Ou acessar pelo link do GitHub Pages acima.

---

## ✨ Funcionalidades
- [x] Cadastro de Produtos com Upload de Foto (PHP)
- [x] Edição e Exclusão de Produtos (PHP)
- [x] Login Administrativo e Segurança de Sessão (PHP)
- [x] Vitrine com consumo de API Externa (JavaScript)
- [x] Conversão de moeda em tempo real (Dólar -> Real)

---
Desenvolvido por **Juliana Miranda** 👩‍💻
