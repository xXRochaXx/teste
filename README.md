# calendario-melhorias

## Instalação
```shell
docker-compose up
```

## Carregando dados na base
```shell
docker exec -it <container-name> bash
cd /home
psql -U postgres -f database.sql
psql -U postgres -f seeds/seeds.sql
```

## Instalando dependências
```shell
docker exec -it <container-name> bash
chmod +x composer
php composer install
```