# Github Authentication


## api/v1/auth/github




> Example request:

```bash
curl -X GET \
    -G "[YOUR APP URL]/api/v1/auth/github" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/auth/github"
);

let headers = {
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
    '[YOUR APP URL]/api/v1/auth/github',
    [
        'headers' => [
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
    "url": "https:\/\/github.com\/login\/oauth\/authorize?client_id=9e62a6dce2a56a57c82a&redirect_uri=http%3A%2F%2Ftheam_crm.test%2Fapi%2Fv1%2Fauth%2Fgithub%2Fcallback&scope=user%3Aemail&response_type=code"
}
```
<div id="execution-results-GETapi-v1-auth-github" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-auth-github"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-auth-github"></code></pre>
</div>
<div id="execution-error-GETapi-v1-auth-github" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-auth-github"></code></pre>
</div>
<form id="form-GETapi-v1-auth-github" data-method="GET" data-path="api/v1/auth/github" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-auth-github', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/auth/github</code></b>
</p>
</form>


## api/v1/auth/github/callback




> Example request:

```bash
curl -X GET \
    -G "[YOUR APP URL]/api/v1/auth/github/callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/auth/github/callback"
);

let headers = {
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
    '[YOUR APP URL]/api/v1/auth/github/callback',
    [
        'headers' => [
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
    "user": {
        "id": 1,
        "email": "example@example.com",
        "username": "Github username",
        "is_admin": false
    },
    "token": "BEARER TOKEN"
}
```
<div id="execution-results-GETapi-v1-auth-github-callback" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-auth-github-callback"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-auth-github-callback"></code></pre>
</div>
<div id="execution-error-GETapi-v1-auth-github-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-auth-github-callback"></code></pre>
</div>
<form id="form-GETapi-v1-auth-github-callback" data-method="GET" data-path="api/v1/auth/github/callback" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-auth-github-callback', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/auth/github/callback</code></b>
</p>
</form>



