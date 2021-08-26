# Catloger :: Plugin para Meduza Static Site Generator

Cria um catálogo com os conteúdos de acordo com os dados do *frontmatter*.

## Instalação
O método de instalação recomendado é utilizando o [Composer](https://getcomposer.org):

```sh
composer require meduza-static-site-generator/meduza-plugin-catloger
```

## Configuração
A configuração do plugin é bastante simples:

```yaml
## Configuração do plugin catloger

plugins:
  Catloger:
    # Caminho relativo/absoluto para o inicializador do plugin.
    source: "./vendor/meduza-static-site-generator/meduza-plugin-catloger/Catloger.php"
    # Coleção de chaves do frontmatter que, se existirem, serão catalogadas.
    # Cada item de ```catalog``` corresponde a um par chave => valor, onde "chave" é a chave do frontmatter a ser catalogada 
    # e "valor" é o nome do catálogo em que essa chave será armazenada.
    catalog:
      layout: layout
      tag: tag
      tags: tag
      category: category
      categories: category
      categoria: category
      categorias: category
    
```

Fornecemos um arquivo de configuração *catloger.yml* com todas as opções documentadas na raiz do projeto. Inclua as configurações ou importe com ```import``` no seu arquivo de configurações.

## Uso
**Catloger** cria um ou mais catálogos de conteúdos a partir de chaves do *frontmatter*.

Considerando a configuração de exemplo, serão criados 3 catálogos, chamados *layout*, *tag* e *category*.

O catálogo *layout* conterá um conjunto de conteúdos baseados nos valores de *layout* do *frontmatter*.

O catálogo *tag* conterá um conjunto de conteúdos baseados nos valores de *tag* e *tags* do *frontmatter*.

O catálogo *category* conterá um conjunto de conteúdos baseados nos valores de *category*, *categories*, *categoria* e *categorias* do *frontmatter*.

Ou seja, o catálogo *layout*, será formado pelos pares chave => valor onde as "chaves" serão todos valores encontrados na propriedade *layotu* do *frontmatter* de todos os arquivos de conteúdo, e "valor" será um array com todos os conteúdos (instâncias da classe ```Meduza\Content\Content```) associados ao valor de "chave".

O mesmo vale para qualquer outro catálogo configurado.

Os catálogos são fornecidos ao tema e seus templates pela variável ```plugins.data.catloger.catalog```. Então, para trabalhar com o catálogo *layout*, o template acessa ```plugins.data.catloger.catalog.layout```.


## Como contribuir
Para contribuir com o projeto, faça o seguinte:

- Crie um *fork*;
- Clone o *fork* e crie um novo *branch* para a sua contribuição;
- Envie suas alterações para o *fork*;
- Crie um *pull request*.

Será interessante você criar um *issue* no repositório oficial para a sua alteração e referenciá-la no nome do seu *branch* e nos *commits*. Também referencie seu *pull request* nas *issue*. Isso agilizará a análise da sua contribuição.

## Licença

**Resumizer** é licenciado sob a [MIT Licence](https://github.com/meduza-static-site-generator/meduza-plugin-catloger/blob/main/LICENSE)