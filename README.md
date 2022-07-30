# Validadores

Classe com vários validadores de dados em PHP

Ex:
```php
  use DV\DataValidator as Data;
  
  return DP::isCnpj('06.990.590/0001-23');
```
Retorno: true


## Lista
```php
// Validador de NOME
Data::IsName(String);

// Validador de CNPJ
Data::isCnpj(String);

// Validador de CPF
Data::isCpf(String);

// Retorna o CNPJ formatado com pontuação
Data::cnpjWithScore(String);

// Retorna o CPF formatado com pontuação
Data::cpfWithScore(String);
```

