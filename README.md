# 💸 Dashboard de Finanças Pessoais

Este é um sistema web completo para controle de finanças pessoais, com autenticação, gerenciamento de despesas, visualização gráfica de categorias de gasto e geração de relatórios em PDF. Ideal para quem deseja acompanhar seus gastos de forma simples e eficiente.

## ✅ Funcionalidades

- 🔐 **Tela de login** — o usuário pode acessar com qualquer email e senha válidos.
- 💰 **Gestão de despesas** — cadastro, listagem, edição e exclusão de despesas.
- 📊 **Dashboard com gráfico de pizza** — exibe a proporção dos gastos por categoria usando Chart.js.
- 💵 **Cotação do dólar** — integração com API pública para exibir o valor do dólar do dia.
- 🧾 **Relatório mensal em PDF** — gera relatório com nome, valor, data, categoria e total gasto.
  
---

## 🛠️ Tecnologias utilizadas

**Frontend**:
  - HTML
  - CSS
  - JavaScript
  - Tailwind CSS
  - Chart.js

**Backend**:
  - PHP 8+
  - Laravel 10
  - DomPDF (barryvdh/laravel-dompdf)

---

## 🧑‍💻 Instalação e execução do projeto

### 1. Clone o repositório

```bash
git clone https://github.com/anakessia/dashboard-financas.git
cd dashboard-financas
```
### 2. Instale as dependências PHP
```bash
composer install
```
### 3. Configure o ambiente
- Copie o arquivo .env.example para .env:
```bash
cp .env.example .env
```
- Configure o banco de dados no .env:
<p>DB_DATABASE=financas</p>
<p>DB_USERNAME=root</p>
<p>DB_PASSWORD=</p>
<p>⚠ Atenção:
<p>Este projeto foi desenvolvido utilizando o banco de dados MySQL.</p>  
<p>Caso você utilize SQLite, algumas funcionalidades podem não funcionar corretamente, como a geração do PDF com todas as despesas.</p>  
<p>Para o funcionamento completo do projeto, é necessário configurar o arquivo .env para uso do MySQL.</p>

- Gere a chave da aplicação:
```bash
php artisan key:generate
```
### 4. Execute as migrações
```bash
php artisan migrate
```
### 5. Rode o servidor local
```bash
php artisan serve
```

## Geração de PDF
Este projeto utiliza o pacote barryvdh/laravel-dompdf para gerar os relatórios mensais de despesas.

Instalação do pacote (caso ainda não esteja instalado):
```bash
composer require barryvdh/laravel-dompdf
```
## 🔗 API utilizada
[AwesomeAPI - API de Moedas](https://docs.awesomeapi.com.br/api-de-moedas)


## 📄 Licença
Este projeto está sob a licença MIT. Fique à vontade para usar, modificar e compartilhar.
<p>Desenvolvido por Ana Kessia.</p>




