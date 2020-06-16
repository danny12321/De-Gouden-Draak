#!/bin/bash

read_var() {
    VAR=$(grep $1 $2 | xargs)
    IFS="=" read -ra VAR <<< "$VAR"
    echo ${VAR[1]}
}

MY_VAR=$(read_var MY_VAR .env)

PRODUCTION_DB=$(read_var PRODUCTION_DB .env)
COPY_DB=$(read_var COPY_DB .env)
USER=$(read_var MYSQL_USER .env)
PASS=$(read_var MYSQL_PASS .env)
echo "Droping '$COPY_DB' and generating it from '$PRODUCTION_DB' dump"
mysql -u$USER -p$PASS -e "drop database $COPY_DB;" --force && mysql -u$USER -p$PASS -e "create database $COPY_DB;" && mysqldump --force -u$USER -p$PASS $PRODUCTION_DB | mysql -u$USER -p$PASS $COPY_DB