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

- XCache 3 (APC & XCache are currently unstable with some PHP 5.4 features)


If you are unable to create a VHost, you can create a .htaccess file with the
following information

    SETENV CUBEX_ENV development

    RewriteEngine on
    RewriteBase /
    RewriteRule ^/js/(.*)     -                       [L,QSA]
    RewriteRule ^/css/(.*)    -                       [L,QSA]
    RewriteRule ^/img/(.*)    -                       [L,QSA]
    RewriteRule ^/favicon.ico -                       [L,QSA]
    RewriteRule ^(.*)$        index.php?__path__=$1   [L,QSA]
