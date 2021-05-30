# Customer endpoint

Endpoint used to manage CRM customers.

## api/v1/customers

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://theam_crm.test/api/v1/customers" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://theam_crm.test/api/v1/customers"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    'http://theam_crm.test/api/v1/customers',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
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
            "id": null,
            "name": "Jacquelyn",
            "surname": "Wintheiser",
            "photoUrl": null,
            "created_by": {
                "id": 1,
                "email": "tagils@mail.ru",
                "username": "Fecony",
                "is_admin": true
            },
            "updated_by": {
                "id": 3,
                "email": "example@example.com",
                "username": "GithubUser",
                "is_admin": false
            },
            "created_at": "",
            "updated_at": ""
        },
        {
            "id": null,
            "name": "Nicklaus",
            "surname": "Rice",
            "photoUrl": null,
            "created_by": {
                "id": 1,
                "email": "tagils@mail.ru",
                "username": "Fecony",
                "is_admin": true
            },
            "updated_by": {
                "id": 1,
                "email": "tagils@mail.ru",
                "username": "Fecony",
                "is_admin": true
            },
            "created_at": "",
            "updated_at": ""
        }
    ]
}
```
<div id="execution-results-GETapi-v1-customers" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-customers"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-customers"></code></pre>
</div>
<div id="execution-error-GETapi-v1-customers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-customers"></code></pre>
</div>
<form id="form-GETapi-v1-customers" data-method="GET" data-path="api/v1/customers" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-customers', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/customers</code></b>
</p>
<p>
<label id="auth-GETapi-v1-customers" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-customers" data-component="header"></label>
</p>
</form>


## api/v1/customers

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://theam_crm.test/api/v1/customers" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Example name","surname":"Example surname","photo_id":"1"}'

```

```javascript
const url = new URL(
    "http://theam_crm.test/api/v1/customers"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Example name",
    "surname": "Example surname",
    "photo_id": "1"
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
    'http://theam_crm.test/api/v1/customers',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'Example name',
            'surname' => 'Example surname',
            'photo_id' => '1',
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
        "name": [
            "The name field is required."
        ],
        "surname": [
            "The surname field is required."
        ]
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": null,
        "name": "Megane",
        "surname": "Kovacek",
        "photoUrl": null,
        "created_by": {
            "id": 3,
            "email": "example@example.com",
            "username": "GithubUser",
            "is_admin": false
        },
        "updated_by": {
            "id": 2,
            "email": "example@mail.ru",
            "username": "Test user",
            "is_admin": false
        },
        "created_at": "",
        "updated_at": ""
    }
}
```
<div id="execution-results-POSTapi-v1-customers" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-customers"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-customers"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-customers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-customers"></code></pre>
</div>
<form id="form-POSTapi-v1-customers" data-method="POST" data-path="api/v1/customers" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-customers', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/customers</code></b>
</p>
<p>
<label id="auth-POSTapi-v1-customers" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-v1-customers" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-v1-customers" data-component="body" required  hidden>
<br>
Customer name.
</p>
<p>
<b><code>surname</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="surname" data-endpoint="POSTapi-v1-customers" data-component="body" required  hidden>
<br>
Customer surname.
</p>
<p>
<b><code>photo_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="photo_id" data-endpoint="POSTapi-v1-customers" data-component="body"  hidden>
<br>
Photo id.
</p>

</form>


## api/v1/customers/{customer}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://theam_crm.test/api/v1/customers/14" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://theam_crm.test/api/v1/customers/14"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    'http://theam_crm.test/api/v1/customers/14',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
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
        "id": null,
        "name": "Christophe",
        "surname": "Schiller",
        "photoUrl": null,
        "created_by": {
            "id": 3,
            "email": "example@example.com",
            "username": "GithubUser",
            "is_admin": false
        },
        "updated_by": {
            "id": 1,
            "email": "tagils@mail.ru",
            "username": "Fecony",
            "is_admin": true
        },
        "created_at": "",
        "updated_at": ""
    }
}
```
<div id="execution-results-GETapi-v1-customers--customer-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-customers--customer-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-customers--customer-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-customers--customer-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-customers--customer-"></code></pre>
</div>
<form id="form-GETapi-v1-customers--customer-" data-method="GET" data-path="api/v1/customers/{customer}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-customers--customer-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/customers/{customer}</code></b>
</p>
<p>
<label id="auth-GETapi-v1-customers--customer-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-customers--customer-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="customer" data-endpoint="GETapi-v1-customers--customer-" data-component="url" required  hidden>
<br>
Customer id to show.
</p>
</form>


## api/v1/customers/{customer}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://theam_crm.test/api/v1/customers/2" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://theam_crm.test/api/v1/customers/2"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    'http://theam_crm.test/api/v1/customers/2',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
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
        "id": null,
        "name": "Taya",
        "surname": "Swaniawski",
        "photoUrl": null,
        "created_by": {
            "id": 1,
            "email": "tagils@mail.ru",
            "username": "Fecony",
            "is_admin": true
        },
        "updated_by": {
            "id": 3,
            "email": "example@example.com",
            "username": "GithubUser",
            "is_admin": false
        },
        "created_at": "",
        "updated_at": ""
    }
}
```
<div id="execution-results-PUTapi-v1-customers--customer-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-v1-customers--customer-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-customers--customer-"></code></pre>
</div>
<div id="execution-error-PUTapi-v1-customers--customer-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-customers--customer-"></code></pre>
</div>
<form id="form-PUTapi-v1-customers--customer-" data-method="PUT" data-path="api/v1/customers/{customer}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-customers--customer-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/v1/customers/{customer}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/v1/customers/{customer}</code></b>
</p>
<p>
<label id="auth-PUTapi-v1-customers--customer-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-v1-customers--customer-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="customer" data-endpoint="PUTapi-v1-customers--customer-" data-component="url" required  hidden>
<br>
Customer id to update.
</p>
</form>


## api/v1/customers/{customer}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://theam_crm.test/api/v1/customers/19" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://theam_crm.test/api/v1/customers/19"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
    'http://theam_crm.test/api/v1/customers/19',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
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
<div id="execution-results-DELETEapi-v1-customers--customer-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-customers--customer-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-customers--customer-"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-customers--customer-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-customers--customer-"></code></pre>
</div>
<form id="form-DELETEapi-v1-customers--customer-" data-method="DELETE" data-path="api/v1/customers/{customer}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-customers--customer-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/v1/customers/{customer}</code></b>
</p>
<p>
<label id="auth-DELETEapi-v1-customers--customer-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-v1-customers--customer-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="customer" data-endpoint="DELETEapi-v1-customers--customer-" data-component="url" required  hidden>
<br>
Customer id to remove.
</p>
</form>



