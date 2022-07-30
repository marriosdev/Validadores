# Validadores
Classe com vários validadores de dados

Ex:
```php
  use DataProcessing as DP;
  
  return DP::isCnpj('06.990.590/0001-23');
```
Retorno: true


## Lista
```php
DataProcessing::IsName(String);
DataProcessing::isTelephone(String);
DataProcessing::validPassword(String);
DataProcessing::isCnpj(String);
DataProcessing::isCpf(String);
DataProcessing::cnpjWithScore(String);
```

