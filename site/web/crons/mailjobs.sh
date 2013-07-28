#!/bin/sh -ex

echo "Starting test"
echo "Testing out mail functionality" | mail -s 'Mail test' rwlaschin@gmail.com
echo "Test finished" $?

