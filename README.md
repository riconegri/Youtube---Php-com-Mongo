interage
========
# Teste de capacitação
Aplicativo sobre PHP, para visualização e compartilhamento de vídeos do Youtube com Twitter.
Todo a parte dinâmica foi feita do zero, uma estrutura com base na experiência MVC do CakePhp, exceto 2 classes estáticas Set(manusear arrays) e String(manusear textos).

###[Vídeo da aplicação em funcionamento](http://www.screenr.com/zxp8)

## Funcionalidades

###Sem login
* Buscar vídeos no YouTube (ajax)
* Visualizar os vídeos
* Compartilhar vídeos com auxílio do Twitter (conteúdo do Twitter gerado dinamicamente conforme o vídeos que carrega no player)
* Criar um playlist dos vídeos com arrastar e soltar os vídeos da lista para o player(drag and drop)
* Remover vídeos do playlist arrastando-os novamente para a lista

###Autenticação
* Possibilita autenticação com 6 ferramentas (Google, Yahoo,OpenID, Twitter, Facebook, Linkin)

### Logado
Com uma frase resumiria a principal funcionalidade da aplicação quando logado
* ###Manter o estado do app entre sessões
* Funcionalidades do Sem login
* Layout diferenciado, 3 colunas
* Salvar todos os termos pesquisados
* Memorizar o último vídeo visualizado
* Memorizar o último termo buscado
* Criar uma lista de todos os vídeos visualizados

## Recursos utilizados (Cliente)
* Twitter bootstrap
* Config de aplicação no Twitter
* Config de aplicação no Facebook
* Config de aplicação no Linkedin
* Conta no Janrain (gerenciamento do login social)
* Classes Set(array) e String(texto) do CakePhp
* Drag'n and Drop do Yahoo (pelas facilidades da implementação
* MongoDB para salvar o estado da aplicação (NO_SQL - um sonho virando realidade)

## Recursos utilizados (Servidor)
* PHP
* MongoDB para salvar o estado da aplicação (NO_SQL)

## Técnicas implementadas
* Esboço de MVC
* .htacces para urls amigáveis
* Multi-site
* Multi-template
* Controllers
* Blocos
* Helpers
* Models

##Instalação
* Instalar, configurar, e iniciar MongoDB (install MongoDb --sistema operacional-- no Google)
* Adicionar a extensão do Mongo para php (MongoDb php config) --sistema operacional-- no Google)
* Definir a variável da pasta que a aplicação irá rodar -> /lib/basics.php (linha 46)
* Configurar uma conta Engage do Janrain
* Fornecer a chave do Janrain (login social) -> /models/bid.php (linha 18 - $jan_api)

## TO DO (das centenas, só as principais a minha análise)
* Apurar bugs (js, css, php)
* Fazer aplicações das redes sociais não atreladas ao Janrain
* Extender a busca por vídeos (por País, Usuário, Tag, Canal...)
* Registrar todos os shares efetuados pelo app
* Adicionar outros shares (Facebook, Google+, etc...)
* Fazer para cada grande funcionalidade, um controller (ex., esta é do YouTube (YoutubeController), fazer uma do Twitter, Facebook, Linkedin
* Permitir usuários do app compartilharem entre si, mandando mensagens, comentários, etc.

## Considerações finais
Nesta área, todos os dias estamos aprendendo, e, num mero teste, descobri que:
* Foi muito bom ter conhecido o Twitter Bootstrap
* Sempre trabalhei com SVN, mas conhecer o git foi sensacional
* Nunca pensei que conseguiria gerar um esboço de MVC, que, me parece funcional
* O Janrain te ajuda no inicio desta mistura social, oferecendo vários atalhos.
* Manter o estado da aplicação, não é mais uma idéia por palavras, e sim uma realidade

