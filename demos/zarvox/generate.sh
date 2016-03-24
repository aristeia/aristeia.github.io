#!/bin/bash

# You must add following two lines before
# outputting data to the web browser from shell
# script
#rm zarvox_term.out
# cd /home/jon/projects/aristeia.github.io/demos/zarvox
DATE=$(date)
echo "66666666666666" > /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
ARGS=$(/usr/bin/env | grep "QUERY_STRING=")
echo "did args\n66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
ARG1=$(echo "$ARGS" | cut -d = -f3| cut -d \& -f 1)
echo "did arg2\n66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
ARG2=$(echo "$ARGS" | cut -d = -f4| cut -d \& -f 1)
echo "did arg2\n66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out

ARG1_REGEX="^(album|subgenre)$"
echo "did arg1\n66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
ARG2_REGEX="^[[:digit:]]+$"
echo "did arg2\n66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out

#rm zarvox_term.out

echo "Content-type: text/html"
echo ""
cat playlist.html
cd code/ &>> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
echo "did cd\n66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
echo $(pwd) >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
sleep 1
pkill -f "python3 (downloader|-u playlist_generator)"
sleep 1
if [ "$ARG1" == "1" ]
	then
	echo "66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
	echo "\n\n\n"
	echo "would have done one arg" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
	python3 -u playlist_generator/generator.py "$ARG1" &>> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out &
	echo "\n\n\n"
	echo "66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
elif [[ $ARG1 =~ $ARG1_REGEX  && $ARG2 =~ $ARG2_REGEX ]]
	then
	echo "66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
	echo "\n\n\n"
	echo "Would have done two-args" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
	python3 -u playlist_generator/generator.py "$ARG1" "$ARG2" &>> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out &
	echo "\n\n\n"
	echo "66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
else
	echo "66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
	echo "\n\n\n"
	echo "Error: bad arguments. Please try again" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
	echo "\n\n\n"
	echo "66666666666666" >> /home/jon/projects/aristeia.github.io/demos/zarvox/zarvox_term.out
fi