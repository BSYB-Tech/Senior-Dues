#!/bin/bash

cd /home/yearbook/mcnickle

wget https://docs.google.com/spreadsheets/d/e/2PACX-1vQ3gYbVN3n94YmE06UhjS6Bs987n22GCrvh0Itch1nR46BmkNicURGHguOgF_5D4ZrcUVrp9zI7_vp8/pub?output=csv

mv pub\?output\=csv status.csv

mysql -u root --password=JohnDonne -e "truncate table \`mcnickle\`.\`status\`"
mysqlimport --ignore-lines=1 --lines-terminated-by='\n' --fields-terminated-by=',' --verbose --local -uroot -proot --password=JohnDonne mcnickle status.csv
