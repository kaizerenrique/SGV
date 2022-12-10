#!/bin/sh
set -e

vendor/bin/phpunit

(git push) || true

git checkout main
git merge Desarrollo

git push origin main

git checkout Desarrollo