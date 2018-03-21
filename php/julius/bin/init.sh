#!/bin/sh

mkdir -p ./lib
cd ./lib
wget --trust-server-names 'http://osdn.jp/frs/redir.php?m=iij&f=%2Fjulius%2F60416%2Fdictation-kit-v4.3.1-linux.tgz'

tar zxvf dictation-kit-v4.3.1-linux.tgz
rm -rf dictation-kit-v4.3.1-linux.tgz

mv dictation-kit-v4.3.1-linux dictation-kit
