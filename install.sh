#!/bin/bash
mkdir_cs(){
  base=$1
  sub=$2

  cd 'app'
  # if [ -z ${1+x} ]; then echo "var is unset"; else echo "var is set to '$1'"; fi
  # if [ -z ${2+x} ]; then echo "var is unset"; else echo "var is set to '$2'"; fi
  if [ $2 ]; then
    mkdir $1
    cd $1
    printf '%s' "$2" | xargs -d, mkdir
    pwd
  else
    printf '%s' "$1" | xargs -d, mkdir
    pwd
  fi
}

basedir=`pwd`
wbr=$basedir"/app/webroot/"
tmpdir=$basedir"/app/"

echo $basedir
# Create the needed dirs
cd $wbr
mkdir_cs 'files' 'anexos,casetas,empty,mr_source,policies,providers,users'
cd $tmpdir
mkdir_cs 'tmp' 'logs,sessions,tests'
mkdir_cs 'cache' 'models,persistent,views'
cd $basedir
pwd
# change the owner to apache
# echo myPassword | sudo -S command
echo "we need the credential for change the owner of tmp dir"

sudo chown -R www-data:www-data $basedir"/app/tmp"
sudo chown -R www-data:www-data $basedir"/app/webroot/files/"
sudo chmod -R 755 $basedir"/app/tmp"
sudo chmod -R 755 $basedir"/app/webroot/files/"
echo "done"
