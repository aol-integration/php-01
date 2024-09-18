# php-01

API OAuth Authorization and API call example for [Accurate Online](https://accurate.id) using PHP Programming Language

This example demonstrate the OAuth Authentication process, getting an OAuth Database Session, and calling the APIs.

> [!IMPORTANT]
> Before running this code, replace the value of variable **$clientId** and **$clientSecret** on the **conf.php** file with Your application credential. 

> [!IMPORTANT]
> This example must run on localhost port 8000 (http://localhost:8000/index.php). If You want this example to run on different host, port, or namespace; replace the value of variable **$oauthCallback** on the **conf.php** file with the correct address.

> [!WARNING]
> This example outputs many sensitive information to the user, such as Access Token and Session, for the sake of demonstration. Please keep in mind that such practice may be considered bad practice in the production environment.

> [!NOTE]
> Read the [OAuth Authentication Documentation](https://accurate.id/api-integration/) for more information on API OAuth Authorization.

> [!NOTE]
> Alternative to the API Oauth Authorization will be the API Token Authorization, which will not be covered in this example.