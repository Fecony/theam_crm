# Logout endpoint

Used to "logout" user.

## api/v1/logout

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "[YOUR APP URL]/api/v1/logout" \
    -H "Authorization: Bearer {TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "[YOUR APP URL]/api/v1/logout"
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
    '[YOUR APP URL]/api/v1/logout',
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
<div id="execution-results-DELETEapi-v1-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-logout"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-logout"></code></pre>
</div>
<form id="form-DELETEapi-v1-logout" data-method="DELETE" data-path="api/v1/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {TOKEN}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/v1/logout</code></b>
</p>
<p>
<label id="auth-DELETEapi-v1-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-v1-logout" data-component="header"></label>
</p>
</form>



