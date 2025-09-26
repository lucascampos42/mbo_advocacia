# 🔧 Solução para Problemas de Persistência de Dados

## ✅ Status Atual
- Containers: **Funcionando**
- Volumes: **Configurados corretamente**
- Problema: **Dados não persistem entre reinicializações**

## 🎯 Soluções Implementadas

### 1. **Comandos Corretos para Gerenciar Containers**

**❌ EVITE (Remove volumes):**
```bash
docker-compose down
docker-compose up
```

**✅ USE (Mantém dados):**
```bash
# Para parar
docker-compose stop

# Para iniciar
docker-compose start

# Para reiniciar
docker-compose restart
```

### 2. **Verificação de Persistência**

**Teste se os dados estão persistindo:**
```bash
# 1. Acesse http://localhost:8000 e configure o WordPress
# 2. Crie alguns posts/páginas
# 3. Pare os containers
docker-compose stop

# 4. Inicie novamente
docker-compose start

# 5. Verifique se os dados ainda estão lá
```

### 3. **Comandos de Diagnóstico**

```bash
# Verificar containers
docker ps -a

# Verificar volumes
docker volume ls

# Verificar dados no banco
docker exec wordpress_db mysql -u wordpress_user -pseu_password_seguro wordpress_db -e "SHOW TABLES;"

# Verificar logs do banco
docker logs wordpress_db

# Verificar logs do WordPress
docker logs wordpress_site
```

### 4. **Se os Dados Ainda Não Persistem**

**Opção A: Recriar com volume local (mais seguro)**
```bash
# Pare tudo
docker-compose down

# Edite docker-compose.yml e mude:
volumes:
  - db_data:/var/lib/mysql
# Para:
volumes:
  - ./mysql_data:/var/lib/mysql

# Inicie novamente
docker-compose up -d
```

**Opção B: Backup e restore manual**
```bash
# Fazer backup
docker exec wordpress_db mysqldump -u wordpress_user -pseu_password_seguro wordpress_db > backup.sql

# Restaurar (se necessário)
docker exec -i wordpress_db mysql -u wordpress_user -pseu_password_seguro wordpress_db < backup.sql
```

## 🚨 Importante

1. **Sempre use `docker-compose stop/start`** em vez de `down/up`
2. **Complete a instalação inicial** do WordPress antes de testar persistência
3. **O volume está funcionando** - o problema pode ser que você ainda não instalou o WordPress
4. **Acesse http://localhost:8000** para verificar o status

## 📋 Próximos Passos

1. ✅ Acesse http://localhost:8000
2. ✅ Complete a instalação do WordPress se necessário
3. ✅ Crie alguns posts/páginas de teste
4. ✅ Use `docker-compose stop` e `docker-compose start`
5. ✅ Verifique se os dados persistem

---
**Tema MBO Advocacia está em:** `./meu-tema/`