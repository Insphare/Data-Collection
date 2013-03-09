sudo apt-get remove phpunit
sudo pear channel-discover pear.phpunit.de
sudo pear channel-discover pear.symfony-project.com
sudo pear channel-discover components.ez.no
sudo pear channel-discover pear.symfony.com
sudo pear update-channels
sudo pear upgrade-all
sudo pear install pear.symfony.com/Yaml
sudo pear install --alldeps phpunit/PHPUnit
sudo pear install --force --alldeps phpunit/PHPUnit
