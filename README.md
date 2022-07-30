# Validadores

Classe com vários validadores de dados em PHP

Ex:
```php
  use DataProcessing as DP;
  
  return DP::isCnpj('06.990.590/0001-23');
```
Retorno: true


## Lista
```php
// Validador de NOME
DataProcessing::IsName(String);

// Validador de TELEFONE
DataProcessing::isTelephone(String);

// Validador de SENHA
DataProcessing::validPassword(String);

// Validador de CNPJ
DataProcessing::isCnpj(String);

// Validador de CPF
DataProcessing::isCpf(String);

// Retorna o CNPJ formatado com pontuação
DataProcessing::cnpjWithScore(String);

// Retorna o CPF formatado com pontuação
DataProcessing::cpfWithScore(String);
```

