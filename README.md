# README #

## Desafio Revvo ##

**README**

Este projeto foi desenvolvido como parte do Desafio Revvo e consiste na implementação de um sistema completo com foco em front-end e back-end utilizando tecnologias web essenciais. O sistema é composto por uma API em PHP puro (sem frameworks), conectada a um banco de dados MySQL, e um front-end responsivo que utiliza HTML5 e JavaScript.

---

## Pré-requisitos

Antes de começar, certifique-se de ter instalado em sua máquina:

* Node.js e npm ([https://nodejs.org/](https://nodejs.org/))
* Servidor web Apache (ou outro de sua preferência)
* MySQL (ou outro SGBD compatível com o script SQL fornecido)

---

## 1. Criação do Banco de Dados

1. Acesse seu SGBD (por exemplo, via linha de comando ou cliente GUI).

2. Execute o script SQL localizado em `database/database.sql`.

---

## 2. Configuração da Conexão com o Banco

1. Abra o arquivo de configuração de conexão (`config/database.php`).

2. Atualize as seguintes informações de acordo com seu ambiente:

   * **host**:
   * **database**:
   * **username**:
   * **password**:

## 3. Execução do Projeto no Servidor Web

1. Copie todo o conteúdo do projeto para o diretório de documentos do Apache.

2. Certifique-se de que o Apache está em execução.

3. Acesse o projeto pelo navegador, em:

   ```
   http://localhost/nome_do_projeto/
   ```

4. Verifique se a API está respondendo corretamente às solicitações.

---

## 4. Instalação e Configuração do Gulp

Dentro da pasta raiz do projeto, execute os comandos:

```bash
npm install gulp gulp-sass gulp-uglify --save-dev
```

---

## 5. Execução das Tarefas Gulp

Após a instalação, execute:

```bash
npx gulp
```


## Dúvidas

Em caso de dúvidas entre em contato pelo e-mail juliocavenaghi06@gmail.com.
