# ubiquitin_search

## Search from a list of targets and retrieve results from _ubibrowser.nspsb.org_

### INPUT FILE: input.txt, a list of Uniprot IDs of potential targets

### PHP SCRIPT: php_ubi.php

### concat_mult_files_ubq.sh: bash script to concatenate the output of the php into the out.csv file

**The out.csv file is preceeded by the name of the files.

You can get a count by running ls -l file-*.csv|wc -l
on a terminal to determine the number of files concatanated by the bash script.

Multiply this number by 3 and take out 2 to delete that many lines from the out.csv file in vim.

**For example if 170 files were produced by the input file, then delete 170 *3 = 510; take out 2 = 508.
open out.csv in vim and 508dd will give you a clean file with just the outputs.** 
