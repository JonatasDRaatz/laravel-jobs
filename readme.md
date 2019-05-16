# Projeto JOB's
Esse projeto consiste em simular o funcionamento de um sistema para gerenciamento de vagas de uma determinada empresa.

## Módulos

### Administrador
- Setores ( Adicionar | Editar | Excluir )
- Vagas ( Adicionar | Editar | Visualizar | Ver candidatos | Excluir )

### Usuários
- Usuário (Adicionar)
- Perfil ( Adicionar | Editar | Visualizar | Candidatar | Excluir )

<hr>

## Tabelas
<p align="center">
    <img src="https://i.ibb.co/gVgNPC9/jobs.png">
</p>

### Criar tabelas
``` 
php artisan migrate

```

### Popular tabelas

``` 
php artisan db:seed

```

## Acessos
.../admin <br>
Usuário: admin@admin.com <br>
Senha: 123456<br><br>

../login <br>
Usuário: user@user.com <br>
Senha: 123456
 
