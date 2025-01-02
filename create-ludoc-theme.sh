#!/bin/bash

# Script para criar a estrutura de diretórios do tema Ludoc

# Cores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${GREEN}Iniciando a criação do tema Ludoc...${NC}"

# Criar diretório principal do tema
mkdir -p ludoc
cd ludoc

# Criar estrutura de diretórios
echo -e "${YELLOW}Criando estrutura de diretórios...${NC}"
mkdir -p assets/{css,js,images/team}
mkdir -p inc
mkdir -p template-parts
mkdir -p page-templates
mkdir -p languages

# Criar arquivos principais
echo -e "${YELLOW}Criando arquivos principais do tema...${NC}"
touch style.css
touch functions.php
touch index.php
touch header.php
touch footer.php
touch sidebar.php
touch screenshot.png

# Criar arquivos de template
echo -e "${YELLOW}Criando arquivos de template...${NC}"
cd template-parts
touch content.php
touch content-page.php
touch content-none.php
touch content-portfolio.php
touch dark-mode-toggle.php
cd ..

# Criar arquivos de página
echo -e "${YELLOW}Criando templates de página...${NC}"
cd page-templates
touch homepage.php
touch services.php
touch about.php
touch contact.php
touch faq.php
cd ..

# Criar arquivos de includes
echo -e "${YELLOW}Criando arquivos de funcionalidades...${NC}"
cd inc
touch customizer.php
touch dark-mode.php
touch multilingual.php
touch post-types.php
touch theme-options.php
cd ..

# Criar arquivos de assets
echo -e "${YELLOW}Criando arquivos de assets...${NC}"
cd assets/js
touch dark-mode.js
cd ../css
touch style.css
touch templates.css
cd ..

echo -e "${GREEN}Estrutura do tema Ludoc criada com sucesso!${NC}"
echo -e "${YELLOW}Próximos passos:${NC}"
echo "1. Preencher os arquivos com o código fonte"
echo "2. Adicionar imagens na pasta assets/images"
echo "3. Criar arquivo de tradução na pasta languages"
echo "4. Testar o tema"

exit 0