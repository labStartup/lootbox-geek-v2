# Loot Box Geek

## Antes de testar:

**Atenção**: Se utilizar o <u>xampp</u> para rodar este sistema na sua máquina, você precisará criar o banco de dados utilizado, as tabelas e campos correspondentes. E inserir a pasta do projeto na pasta raiz do xampp, geralmente em "C:\xampp\htdocs\".

> Nome do banco de dados: "lootbox_db",

### Tabela: "user_registration"

|  Nome do Campo  | 
|  -------------  |
| id_user         |
| username        |
| email           |
| password_login  |
| image_user        |
| created_at      |

Acessando o phpMyAdmin, crie um *database* com o mesmo nome acima (*lootbox_db*). E crie a tabela *user_registration* com o seguinte código sql:

```sql
    CREATE TABLE user_registration(
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_login VARCHAR(255) NOT NULL,
    image_user VARCHAR(255) DEFAULT NULL '../src/img/user/default.jpeg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

```