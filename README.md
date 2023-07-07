# Desafio Tainacan

## desafio-rankparity:

Método: GET
URL: http://localhost:8012/wp-json/generator/randomnumbers/rankparity

Passos para executar o desafio pelo WordPress:
obs:
-Utilizei a estrutura Docker disponibilizada
-Deixei uma interface personalizada por isso removi o .gitignore da pasta data para caso queira utilizar

1. Rodar localmente o projeto 
2. Abrir a página principal do WordPress
3. Clicar em "desafio-rankparity"
4. Clicar no botão "Generate Numbers"
5. O resultado será gerado logo abaixo



## desafio-extra:
Método: POST
URL: http://localhost:8012/wp-json/operation/carry

Exemplo de parametros para teste:

{
"term1": 23456789,
"term2": 987654321
}
