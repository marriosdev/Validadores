<p align="center">
    <a href="https://packagist.org/packages/marrios/validators"><img src="https://img.shields.io/packagist/dt/marrios/validators" alt="Total Downloads"</a>
    <a href="https://packagist.org/packages/marrios/validators"><img src="https://img.shields.io/packagist/v/marrios/validators" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/marrios/validators"><img src="https://img.shields.io/packagist/l/marrios/validators" alt="License"></a>
</p>

# Validadores

Classe com vários validadores de dados em PHP

```shell
composer require marrios/validators
```

Ex:
```php
  use DV\DataValidator as Data;
  
  return Data::isCnpj('06.990.590/0001-23');
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

