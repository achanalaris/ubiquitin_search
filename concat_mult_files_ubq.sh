#!/bin/bash
head -n1 file-*.csv > out.csv
for fname in file-*.csv
do
	tail -n +2 -q $fname >> out.csv
done
