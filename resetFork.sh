#! /bin/bash
# Git Hard Reset Fork

git remote add upstream https://github.com/sam-jc-vlad-sach/vino_etu

git pull origin master
git pull upstream master

git reset --hard upstream/master
