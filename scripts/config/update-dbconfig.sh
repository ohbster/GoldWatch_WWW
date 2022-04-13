#!/bin/bash

#Test if the config file exists first. If not abandon.



#Get the DB endpoint (gw-dbaddr), database name (gw-name), username and password from parameter store.
PARLIST=`aws ssm get-parameters --with-decryption --names gw-dbaddr gw-dbname gw-dbuser gw-dbpass --region us-east-1 | jq -r '.Parameters'`

#Assign values to variables
dbname=`echo $PARLIST | jq  '.[] | select(.Name=="gw-dbname").Value'`
dbaddr=`echo $PARLIST | jq  '.[] | select(.Name=="gw-dbaddr").Value'`
dbuser=`echo $PARLIST | jq  '.[] | select(.Name=="gw-dbuser").Value'`
dbpass=`echo $PARLIST | jq  '.[] | select(.Name=="gw-dbpass").Value'`


#Create backup copy of the config file
cp dbconfig.json dbconfig.json.backup

#replace current values in the config file
jq -r ".[].dbname |= $dbname | .[].hostname |= $dbaddr | .[].username |= $dbuser | .[].password |= $dbpass" /etc/goldwatch/dbconfig.json.template > /etc/goldwatch/dbconfig.json

chown root:apache /etc/goldwatch/dbconfig.json
