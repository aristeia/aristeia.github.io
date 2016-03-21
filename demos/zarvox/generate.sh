#!/bin/bash

# You must add following two lines before
# outputting data to the web browser from shell
# script
#rm zarvox_term.out
cd /home/jon/projects/aristeia.github.io/demos/zarvox
DATE=$(date)
ARGS=$(/usr/bin/env | grep QUERY_STRING=)
ARG1=$(echo $ARGS | cut -d = -f3| cut -d \& -f 1)
ARG2=$(echo $ARGS | cut -d = -f4| cut -d \& -f 1)
echo $ARGS > zarvox_term.out
echo $ARG1 >> zarvox_term.out
echo $ARG2 >> zarvox_term.out
# rm zarvox_term.out
echo "Content-type: text/html"
echo ""
cat playlist.html
cd code
sleep 1
pkill -f "python3 (downloader|-u playlist_generator)"
sleep 1
python3 -u playlist_generator/generator.py "$ARG1 $ARG2" &> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out &