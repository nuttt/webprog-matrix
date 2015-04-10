#!/bin/sh

while true ; do
git commit -a -m "auto" && git push origin master
sleep 1
done

