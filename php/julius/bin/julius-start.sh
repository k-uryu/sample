#!/bin/sh

mkdir -p ./lib/pid

julius -C ./lib/dictation-kit/main.jconf -C ./lib/dictation-kit/am-gmm.jconf -module > /dev/null &
echo $! > ./lib/pid/julius.txt
