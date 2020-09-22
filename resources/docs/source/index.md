---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#User Authentication


APIs for managing users

Class ApiAuthController
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## api/register
> Example request:

```bash
curl -X POST \
    "http://localhost/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"John","last_name":"Doe","email":"abc@example.com","password":"111111"}'

```

```javascript
const url = new URL(
    "http://localhost/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "abc@example.com",
    "password": "111111"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "access_token": "eyJ0eXAiOiJKV1Qi..."
}
```
> Example response (422):

```json
{
    "errors": "failed validation"
}
```

### HTTP Request
`POST api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  required  | The first name of the user.
        `last_name` | string |  required  | The last name of the user.
        `email` | email |  required  | The email of the user.
        `password` | required |  optional  | The password of the user.
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## If the user credential are valid, a success response and API token is sent to the service making the API call.

If it is not a valid user, it returns a failed response with a status code of 401

> Example request:

```bash
curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"abc@example.com","password":"111111"}'

```

```javascript
const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "abc@example.com",
    "password": "111111"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "access_token": "eyJ0eXAiOiJKV1Qi..."
}
```
> Example response (401):

```json
{
    "status": "failed",
    "message": "Incorrect login credentials"
}
```
> Example response (500):

```json
{
    "status": "failed",
    "message": "This account does not exist"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | The email of the user.
        `password` | required |  optional  | The password of the user.
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_01075f2107bd5c278b05766440915f79 -->
## api/users/{id}
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET api/users/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the user.

<!-- END_01075f2107bd5c278b05766440915f79 -->

#general


<!-- START_afa573efcb404c394e835b474f167e56 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/oauth/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/oauth/token`


<!-- END_afa573efcb404c394e835b474f167e56 -->

<!-- START_b4bff9acd35af4f8e7052cc499256d80 -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth/tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthorized"
}
```

### HTTP Request
`GET api/oauth/tokens`


<!-- END_b4bff9acd35af4f8e7052cc499256d80 -->

<!-- START_3426813d113e67889b69895375b2f1e8 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/oauth/tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/oauth/tokens/{token_id}`


<!-- END_3426813d113e67889b69895375b2f1e8 -->

<!-- START_042c9d482936925dc0c20931422c64d3 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/oauth/token/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/token/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/oauth/token/refresh`


<!-- END_042c9d482936925dc0c20931422c64d3 -->

<!-- START_ac7d23bc3d155ecf4023a1b8b6353703 -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthorized"
}
```

### HTTP Request
`GET api/oauth/clients`


<!-- END_ac7d23bc3d155ecf4023a1b8b6353703 -->

<!-- START_df9661e38978cc5e272bf288d2249a8c -->
## Store a new client.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/oauth/clients`


<!-- END_df9661e38978cc5e272bf288d2249a8c -->

<!-- START_53ed6a8c6cd5825f50b9f05eeb7d02a6 -->
## Update the given client.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/oauth/clients/{client_id}`


<!-- END_53ed6a8c6cd5825f50b9f05eeb7d02a6 -->

<!-- START_c64c8de58bd9d1cade9ca3a8d5405256 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/oauth/clients/{client_id}`


<!-- END_c64c8de58bd9d1cade9ca3a8d5405256 -->

<!-- START_c15dbf978e9d50a3b0e91ff75f839b62 -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth/scopes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/scopes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthorized"
}
```

### HTTP Request
`GET api/oauth/scopes`


<!-- END_c15dbf978e9d50a3b0e91ff75f839b62 -->

<!-- START_fcc2cce1f36e999858b5918ff32c6267 -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthorized"
}
```

### HTTP Request
`GET api/oauth/personal-access-tokens`


<!-- END_fcc2cce1f36e999858b5918ff32c6267 -->

<!-- START_a4e17d5011f69f4b5dbfd7cff9befca7 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/oauth/personal-access-tokens`


<!-- END_a4e17d5011f69f4b5dbfd7cff9befca7 -->

<!-- START_94fb2b2f8e0254b40fa4b0a8ceb78956 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/oauth/personal-access-tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth/personal-access-tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/oauth/personal-access-tokens/{token_id}`


<!-- END_94fb2b2f8e0254b40fa4b0a8ceb78956 -->


