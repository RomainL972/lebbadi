# My website
Hi, this is my website. It is quite simple right now but I want to improve it step by step. For now there are only links to my projects

## Environment variables
The website uses a few environment variables to keep the Database and e-mail passwords secrets, you have to set those variables in your apache conf file to use the source code

* CLEARDB_DATABASE_URL - the database URL in the format mysql://username:password@host/database
* EMAIL_ADDRESS_FROM - the e-mail address sending the mails
* NAME_FROM - the name displayed with EMAIL_ADDRESS_FROM
* EMAIL_ADDRESS_TO - the e-mail address receiving the mails
* NAME_TO - the name displayed with EMAIL_ADDRESS_TO
* EMAIL_HOST - the e-mail address provider SMTP server address
* EMAIL_HOST - the e-mail address provider SMTP server port
* EMAIL_SSL - set to 1 if the SMTP server is using SSL
* EMAIL_PASSWORD - the e-mail address password
* TIMEZONE - your timezone (optional)