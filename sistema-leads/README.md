# Desafio > Escribo > Teste Técnico 1

## :clipboard: Descrição do desafio
Implemente uma função que receba um número inteiro positivo e retorne o
somatório de todos os valores inteiros divisíveis por 3 ou 5 que sejam inferiores ao
número passado.

## :pencil2: Exemplo
| Valor de entrada | divisores |  Dividendos|Resultado da soma|
|--|--|--|--|
| 10 | 3 e 5  | 3, 5, 6, 9  |23
| 11 | 3 e 5 | 3, 5, 6, 9, 10 |33

- Caso sua função receba o inteiro **10**, ela deve retornar **23**, resultante do somatório
dos números **3, 5, 6 e 9** que são menores que **10**.
- Caso sua função receba o inteiro **11**, ela deve retornar **33**, resultante do somatório
dos números **3, 5, 6, 9 e 10** que são menores que **11**.

## :hammer: instruções para executar o teste

### Comece a instalação clonando este repositório

#### Usando http
```
https://github.com/pdr-dev71/primeiro-desafio-escribo.git
```
ou

#### Usando SSH
```
git@github.com:pdr-dev71/primeiro-desafio-escribo.git
```

### Após o clone acesse a pasta do projeto no seu terminal linux/cmd windows

```
cd teste-escribo
```

### Atualize as dependencias caso seja necessário

```
dart pub get
```

### Finalmente rode o projeto

```
dart run
```

> O projeto sera iniciado e o resultados serão emitidos no terminal: ```A soma é: 23``` e ```A soma é: 33```

### Rodando os testes

```
dart test
```
> Os testes serão iniciados e os resultados serão emitidos no terminal: ```00:01 +2: All tests passed! ```

 
## :triangular_ruler: Estrutura do projeto
A estrutura é composta por tres pastas principais sendo elas: **bin,lib->bonus e test**. alem dos arquivos comuns a projetos dart como os de pubspec.

### :page_facing_up: Descrição das pastas quanto ao seu conteudo

- :open_file_folder: **bin**: Nesta pasta se econtra nosso ponto de entrada do programa, a função **main** contendo o arquivo da função para o calculo.
- :open_file_folder: **lib**: Dentro dessa se encontra o arquivo de nome sum_divisible_integers.dart, que é constituido de uma função que realiza os calculos e os exibe.
- :open_file_folder: **bonus**: Esta possui um arquivo com uma função identica ao do arquivo principal do desafio, mas com a adição de uma captura da entrada do usuário via input no terminal, deixando o programa mais dinâmico.
- :open_file_folder: **test**: Por ultimo mas não menos importante, temos a pasta que abriga os testes unitários para os valores que forem ser passados.