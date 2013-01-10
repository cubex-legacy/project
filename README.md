Cubex Base Project
===

Setup your Apache Virtual Host Config INCLUDING "SetEnv CUBEX_ENV development"
replacing development with your chosen environment.  Cubex will automatically
load {CUBEX_ENV}.ini from your conf directory and merge on top of defaults.ini

    <VirtualHost *:80>
      SetEnv CUBEX_ENV development

      DocumentRoot "project_path/public"
      ServerName cubex.local
      ServerAlias www.cubex.local
      ErrorLog "logs/cubex-error.log"
      CustomLog "logs/cubex-access.log" common

      RewriteEngine on
      RewriteRule ^(.*)$        /index.php?__path__=$1  [B,L,QSA]
    </VirtualHost>

Recommended PHP Modules

- APC
