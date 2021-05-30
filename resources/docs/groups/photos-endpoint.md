# Photos endpoint

Endpoint used to manage photos

## api/v1/photos

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://theam_crm.test/api/v1/photos" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "photo=@/private/var/folders/4s/181dychs12vcg4nrjvpfx_gc0000gn/T/phpyrTcQf" 
```

```javascript
const url = new URL(
    "http://theam_crm.test/api/v1/photos"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://theam_crm.test/api/v1/photos',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
        'multipart' => [
            [
                'name' => 'photo',
                'contents' => fopen('/private/var/folders/4s/181dychs12vcg4nrjvpfx_gc0000gn/T/phpyrTcQf', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201, success):

```json

{
 "photo": {
  "name": "lpSHaesceD8_1622373059.jpg",
  "path": "public/photos/lpSHaesceD8_1622373059.jpg",
  "updated_at": "2021-05-30T11:10:59.000000Z",
  "created_at": "2021-05-30T11:10:59.000000Z",
  "id": 1
}
```
> Example response (422, error):

```json

{
 "message": "The given data was invalid.",
 "errors": {
  "photo": [
    "The photo must be a file of type: png, jpg, jpeg."
  ]
}
```
<div id="execution-results-POSTapi-v1-photos" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-photos"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-photos"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-photos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-photos"></code></pre>
</div>
<form id="form-POSTapi-v1-photos" data-method="POST" data-path="api/v1/photos" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-photos', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/photos</code></b>
</p>
<p>
<label id="auth-POSTapi-v1-photos" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-v1-photos" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="photo" data-endpoint="POSTapi-v1-photos" data-component="body" required  hidden>
<br>
The image.
</p>

</form>


## api/v1/photos/{photo}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://theam_crm.test/api/v1/photos/15" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://theam_crm.test/api/v1/photos/15"
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
    'http://theam_crm.test/api/v1/photos/15',
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
<div id="execution-results-DELETEapi-v1-photos--photo-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-photos--photo-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-photos--photo-"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-photos--photo-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-photos--photo-"></code></pre>
</div>
<form id="form-DELETEapi-v1-photos--photo-" data-method="DELETE" data-path="api/v1/photos/{photo}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-photos--photo-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/v1/photos/{photo}</code></b>
</p>
<p>
<label id="auth-DELETEapi-v1-photos--photo-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-v1-photos--photo-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="photo" data-endpoint="DELETEapi-v1-photos--photo-" data-component="url" required  hidden>
<br>
Photo id to remove.
</p>
</form>



