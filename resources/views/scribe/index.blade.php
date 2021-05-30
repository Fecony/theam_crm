<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>THEAM CRM API</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                            <a href="#" data-language-name="php">php</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI (Swagger) spec</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: May 30 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>Small API for CRM system to manage customers</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://theam_crm.test</code></pre><h1>Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by authorizing via <b>Github OAuth2 Provider</b>.</p><h1>Customer endpoint</h1>
<p>Endpoint used to manage CRM customers.</p>
<h2>api/v1/customers</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://theam_crm.test/api/v1/customers" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://theam_crm.test/api/v1/customers',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": null,
            "name": "Hayden",
            "surname": "Schoen",
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
        },
        {
            "id": null,
            "name": "Greg",
            "surname": "Farrell",
            "photoUrl": null,
            "created_by": {
                "id": 2,
                "email": "example@mail.ru",
                "username": "Test user",
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
    ]
}</code></pre>
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
<h2>api/v1/customers</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://theam_crm.test/api/v1/customers" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Example name","surname":"Example surname","photo_id":"1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://theam_crm.test/api/v1/customers',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Example name',
            'surname' =&gt; 'Example surname',
            'photo_id' =&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422, error):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "surname": [
            "The surname field is required."
        ]
    }
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": null,
        "name": "Quincy",
        "surname": "Ledner",
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
}</code></pre>
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
<h2>api/v1/customers/{customer}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://theam_crm.test/api/v1/customers/12" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/customers/12"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://theam_crm.test/api/v1/customers/12',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": null,
        "name": "Brendan",
        "surname": "Lesch",
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
}</code></pre>
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
<h2>api/v1/customers/{customer}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://theam_crm.test/api/v1/customers/20" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/customers/20"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://theam_crm.test/api/v1/customers/20',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": null,
        "name": "Ebba",
        "surname": "Flatley",
        "photoUrl": null,
        "created_by": {
            "id": 2,
            "email": "example@mail.ru",
            "username": "Test user",
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
}</code></pre>
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
<h2>api/v1/customers/{customer}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://theam_crm.test/api/v1/customers/18" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/customers/18"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://theam_crm.test/api/v1/customers/18',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (204, success):</p>
</blockquote>
<pre><code class="language-json">&lt;Empty response&gt;</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
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
</form><h1>Github Authentication</h1>
<h2>api/v1/auth/github</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://theam_crm.test/api/v1/auth/github" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/auth/github"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://theam_crm.test/api/v1/auth/github',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "url": "https:\/\/github.com\/login\/oauth\/authorize?client_id=9e62a6dce2a56a57c82a&amp;redirect_uri=http%3A%2F%2Ftheam_crm.test%2Fapi%2Fv1%2Fauth%2Fgithub%2Fcallback&amp;scope=user%3Aemail&amp;response_type=code"
}</code></pre>
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
</form><h1>Logout endpoint</h1>
<p>Used to &quot;logout&quot; user.</p>
<h2>api/v1/logout</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://theam_crm.test/api/v1/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://theam_crm.test/api/v1/logout',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (204, success):</p>
</blockquote>
<pre><code class="language-json">&lt;Empty response&gt;</code></pre>
<div id="execution-results-DELETEapi-v1-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-logout"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-logout"></code></pre>
</div>
<form id="form-DELETEapi-v1-logout" data-method="DELETE" data-path="api/v1/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-logout', this);">
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
</form><h1>Photos endpoint</h1>
<p>Endpoint used to manage photos</p>
<h2>api/v1/photos</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://theam_crm.test/api/v1/photos" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "photo=@/private/var/folders/4s/181dychs12vcg4nrjvpfx_gc0000gn/T/phpP8iOvf" </code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://theam_crm.test/api/v1/photos',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'photo',
                'contents' =&gt; fopen('/private/var/folders/4s/181dychs12vcg4nrjvpfx_gc0000gn/T/phpP8iOvf', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (201, success):</p>
</blockquote>
<pre><code class="language-json">
{
 "photo": {
  "name": "lpSHaesceD8_1622373059.jpg",
  "path": "public/photos/lpSHaesceD8_1622373059.jpg",
  "updated_at": "2021-05-30T11:10:59.000000Z",
  "created_at": "2021-05-30T11:10:59.000000Z",
  "id": 1
}</code></pre>
<blockquote>
<p>Example response (422, error):</p>
</blockquote>
<pre><code class="language-json">
{
 "message": "The given data was invalid.",
 "errors": {
  "photo": [
    "The photo must be a file of type: png, jpg, jpeg."
  ]
}</code></pre>
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
<h2>api/v1/photos/{photo}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://theam_crm.test/api/v1/photos/7" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/photos/7"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://theam_crm.test/api/v1/photos/7',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (204, success):</p>
</blockquote>
<pre><code class="language-json">&lt;Empty response&gt;</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
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
</form><h1>User endpoint</h1>
<p>Endpoint used to manage CRM users.</p>
<h2>api/v1/users</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://theam_crm.test/api/v1/users" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/users"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://theam_crm.test/api/v1/users',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 4,
            "email": "klockman@example.net",
            "username": "rhett08",
            "is_admin": null,
            "created_at": "2021-05-30 17:28:39",
            "updated_at": "2021-05-30 17:28:39"
        },
        {
            "id": 5,
            "email": "alysson04@example.org",
            "username": "shuel",
            "is_admin": null,
            "created_at": "2021-05-30 17:28:39",
            "updated_at": "2021-05-30 17:28:39"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-v1-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users"></code></pre>
</div>
<div id="execution-error-GETapi-v1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users"></code></pre>
</div>
<form id="form-GETapi-v1-users" data-method="GET" data-path="api/v1/users" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users', this);">
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
</form>
<h2>api/v1/users</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://theam_crm.test/api/v1/users" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"email@example.com","username":"Example github username"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/users"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://theam_crm.test/api/v1/users',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'email@example.com',
            'username' =&gt; 'Example github username',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422, error):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "username": [
            "The username field is required."
        ]
    }
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 6,
        "email": "smann@example.com",
        "username": "obalistreri",
        "is_admin": null,
        "created_at": "2021-05-30 17:28:39",
        "updated_at": "2021-05-30 17:28:39"
    }
}</code></pre>
<div id="execution-results-POSTapi-v1-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-users"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-users"></code></pre>
</div>
<form id="form-POSTapi-v1-users" data-method="POST" data-path="api/v1/users" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-users', this);">
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
<h2>api/v1/users/{user}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://theam_crm.test/api/v1/users/consequuntur" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/users/consequuntur"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://theam_crm.test/api/v1/users/consequuntur',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 7,
        "email": "anderson.baumbach@example.org",
        "username": "russ.gutkowski",
        "is_admin": null,
        "created_at": "2021-05-30 17:28:39",
        "updated_at": "2021-05-30 17:28:39"
    }
}</code></pre>
<div id="execution-results-GETapi-v1-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--user-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--user-"></code></pre>
</div>
<form id="form-GETapi-v1-users--user-" data-method="GET" data-path="api/v1/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--user-', this);">
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
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-v1-users--user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>int</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="int" data-endpoint="GETapi-v1-users--user-" data-component="url" required  hidden>
<br>
Гыук id to show.
</p>
</form>
<h2>api/v1/users/{user}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://theam_crm.test/api/v1/users/4" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/users/4"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://theam_crm.test/api/v1/users/4',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 8,
        "email": "adele28@example.org",
        "username": "keagan.torphy",
        "is_admin": null,
        "created_at": "2021-05-30 17:28:39",
        "updated_at": "2021-05-30 17:28:39"
    }
}</code></pre>
<div id="execution-results-PUTapi-v1-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-v1-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-users--user-"></code></pre>
</div>
<div id="execution-error-PUTapi-v1-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-users--user-"></code></pre>
</div>
<form id="form-PUTapi-v1-users--user-" data-method="PUT" data-path="api/v1/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-users--user-', this);">
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
<h2>api/v1/users/{user}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://theam_crm.test/api/v1/users/7" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/users/7"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://theam_crm.test/api/v1/users/7',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (204, success):</p>
</blockquote>
<pre><code class="language-json">&lt;Empty response&gt;</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
<div id="execution-results-DELETEapi-v1-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-users--user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-users--user-"></code></pre>
</div>
<form id="form-DELETEapi-v1-users--user-" data-method="DELETE" data-path="api/v1/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-users--user-', this);">
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
<h2>api/v1/users/{user}/toggle_admin</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://theam_crm.test/api/v1/users/9/toggle_admin" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://theam_crm.test/api/v1/users/9/toggle_admin"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;patch(
    'http://theam_crm.test/api/v1/users/9/toggle_admin',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404, not found):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Resource not found"
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 9,
        "email": "electa81@example.net",
        "username": "jaida.langosh",
        "is_admin": null,
        "created_at": "2021-05-30 17:28:39",
        "updated_at": "2021-05-30 17:28:39"
    }
}</code></pre>
<div id="execution-results-PATCHapi-v1-users--user--toggle_admin" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-v1-users--user--toggle_admin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-users--user--toggle_admin"></code></pre>
</div>
<div id="execution-error-PATCHapi-v1-users--user--toggle_admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-users--user--toggle_admin"></code></pre>
</div>
<form id="form-PATCHapi-v1-users--user--toggle_admin" data-method="PATCH" data-path="api/v1/users/{user}/toggle_admin" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-users--user--toggle_admin', this);">
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
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="php">php</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript","php"];
        setupLanguages(languages);
    });
</script>
</body>
</html>