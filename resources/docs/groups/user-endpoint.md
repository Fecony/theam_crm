# User endpoint

Endpoint used to manage CRM users.

<aside class="warning">Only admin users can access this endpoint</aside>

## Get list of users

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "[YOUR APP URL]/api/v1/users?page=1&perPage=16" \
    -H "Authorization: Bearer {TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/users"
);

let params = {
    "page": "1",
    "perPage": "16",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    '[YOUR APP URL]/api/v1/users',
    [
        'headers' => [
            'Authorization' => 'Bearer {TOKEN}',
            'Accept' => 'application/json',
        ],
        'query' => [
            'page'=> '1',
            'perPage'=> '16',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "email": "example@example.com",
            "username": "GithubUser",
            "is_admin": false,
            "created_at": "2021-05-30 14:20:18",
            "updated_at": "2021-05-30 14:20:49"
        }
    ],
    "links": {
        "first": "http:\/\/theam_crm.test\/api\/v1\/users?page=1",
        "last": "http:\/\/theam_crm.test\/api\/v1\/users?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/theam_crm.test\/api\/v1\/users?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http:\/\/theam_crm.test\/api\/v1\/users",
        "per_page": "3",
        "to": 3,
        "total": 3
    }
}
```
<div id="execution-results-GETapi-v1-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users"></code></pre>
</div>
<div id="execution-error-GETapi-v1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users"></code></pre>
</div>
<form id="form-GETapi-v1-users" data-method="GET" data-path="api/v1/users" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/users</code></b>
</p>
<p>
<label id="auth-GETapi-v1-users" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-users" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>int</small>     <i>optional</i> &nbsp;
<input type="text" name="page" data-endpoint="GETapi-v1-users" data-component="query"  hidden>
<br>
Page number to return.
</p>
<p>
<b><code>perPage</code></b>&nbsp;&nbsp;<small>int</small>     <i>optional</i> &nbsp;
<input type="text" name="perPage" data-endpoint="GETapi-v1-users" data-component="query"  hidden>
<br>
Number of items to return in a page.
</p>
</form>


## Create user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "[YOUR APP URL]/api/v1/users" \
    -H "Authorization: Bearer {TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"email@example.com","username":"Example github username"}'

```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/users"
);

let headers = {
    "Authorization": "Bearer {TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "email@example.com",
    "username": "Example github username"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    '[YOUR APP URL]/api/v1/users',
    [
        'headers' => [
            'Authorization' => 'Bearer {TOKEN}',
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'email@example.com',
            'username' => 'Example github username',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (422, error):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "username": [
            "The username field is required."
        ]
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": 422,
        "email": "rkoepp@example.org",
        "username": "schmitt.alvis",
        "is_admin": null,
        "created_at": "2021-06-01 17:28:15",
        "updated_at": "2021-06-01 17:28:15"
    }
}
```
<div id="execution-results-POSTapi-v1-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-users"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-users"></code></pre>
</div>
<form id="form-POSTapi-v1-users" data-method="POST" data-path="api/v1/users" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/users</code></b>
</p>
<p>
<label id="auth-POSTapi-v1-users" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-v1-users" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-users" data-component="body" required  hidden>
<br>
User email The value must be a valid email address.
</p>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-v1-users" data-component="body" required  hidden>
<br>
User username.
</p>

</form>


## Get user by id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "[YOUR APP URL]/api/v1/users/12" \
    -H "Authorization: Bearer {TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/users/12"
);

let headers = {
    "Authorization": "Bearer {TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    '[YOUR APP URL]/api/v1/users/12',
    [
        'headers' => [
            'Authorization' => 'Bearer {TOKEN}',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404, not found):

```json
{
    "error": "Resource not found"
}
```
> Example response (200):

```json
{
    "data": {
        "id": 423,
        "email": "frederique89@example.net",
        "username": "cecelia.harris",
        "is_admin": null,
        "created_at": "2021-06-01 17:28:15",
        "updated_at": "2021-06-01 17:28:15"
    }
}
```
<div id="execution-results-GETapi-v1-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--user-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--user-"></code></pre>
</div>
<form id="form-GETapi-v1-users--user-" data-method="GET" data-path="api/v1/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/users/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-v1-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="GETapi-v1-users--user-" data-component="url" required  hidden>
<br>
User id to show.
</p>
</form>


## Update user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "[YOUR APP URL]/api/v1/users/7" \
    -H "Authorization: Bearer {TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/users/7"
);

let headers = {
    "Authorization": "Bearer {TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    '[YOUR APP URL]/api/v1/users/7',
    [
        'headers' => [
            'Authorization' => 'Bearer {TOKEN}',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404, not found):

```json
{
    "error": "Resource not found"
}
```
> Example response (200):

```json
{
    "data": {
        "id": 424,
        "email": "romaine.trantow@example.org",
        "username": "heller.river",
        "is_admin": null,
        "created_at": "2021-06-01 17:28:15",
        "updated_at": "2021-06-01 17:28:15"
    }
}
```
<div id="execution-results-PUTapi-v1-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-v1-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-users--user-"></code></pre>
</div>
<div id="execution-error-PUTapi-v1-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-users--user-"></code></pre>
</div>
<form id="form-PUTapi-v1-users--user-" data-method="PUT" data-path="api/v1/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/v1/users/{user}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/v1/users/{user}</code></b>
</p>
<p>
<label id="auth-PUTapi-v1-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-v1-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PUTapi-v1-users--user-" data-component="url" required  hidden>
<br>
User id to update.
</p>
</form>


## Delete user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "[YOUR APP URL]/api/v1/users/17" \
    -H "Authorization: Bearer {TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/users/17"
);

let headers = {
    "Authorization": "Bearer {TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    '[YOUR APP URL]/api/v1/users/17',
    [
        'headers' => [
            'Authorization' => 'Bearer {TOKEN}',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (204, success):

```json
<Empty response>
```
> Example response (404, not found):

```json
{
    "error": "Resource not found"
}
```
<div id="execution-results-DELETEapi-v1-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-users--user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-users--user-"></code></pre>
</div>
<form id="form-DELETEapi-v1-users--user-" data-method="DELETE" data-path="api/v1/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/v1/users/{user}</code></b>
</p>
<p>
<label id="auth-DELETEapi-v1-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-v1-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="DELETEapi-v1-users--user-" data-component="url" required  hidden>
<br>
User id to remove.
</p>
</form>


## Toggle admin state

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "[YOUR APP URL]/api/v1/users/12/toggle_admin" \
    -H "Authorization: Bearer {TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/users/12/toggle_admin"
);

let headers = {
    "Authorization": "Bearer {TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    '[YOUR APP URL]/api/v1/users/12/toggle_admin',
    [
        'headers' => [
            'Authorization' => 'Bearer {TOKEN}',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404, not found):

```json
{
    "error": "Resource not found"
}
```
> Example response (200):

```json
{
    "data": {
        "id": 425,
        "email": "grant36@example.org",
        "username": "asia35",
        "is_admin": null,
        "created_at": "2021-06-01 17:28:15",
        "updated_at": "2021-06-01 17:28:15"
    }
}
```
<div id="execution-results-PATCHapi-v1-users--user--toggle_admin" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-v1-users--user--toggle_admin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-users--user--toggle_admin"></code></pre>
</div>
<div id="execution-error-PATCHapi-v1-users--user--toggle_admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-users--user--toggle_admin"></code></pre>
</div>
<form id="form-PATCHapi-v1-users--user--toggle_admin" data-method="PATCH" data-path="api/v1/users/{user}/toggle_admin" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-users--user--toggle_admin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/v1/users/{user}/toggle_admin</code></b>
</p>
<p>
<label id="auth-PATCHapi-v1-users--user--toggle_admin" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-v1-users--user--toggle_admin" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PATCHapi-v1-users--user--toggle_admin" data-component="url" required  hidden>
<br>
User id to toggle admin role.
</p>
</form>



