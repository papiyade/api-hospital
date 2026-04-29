<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.9.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.9.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-register">
                                <a href="#endpoints-POSTapi-register">POST api/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                                <a href="#endpoints-POSTapi-login">POST api/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-checkin">
                                <a href="#endpoints-POSTapi-checkin">POST api/checkin</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appointments--id--checkin">
                                <a href="#endpoints-POSTapi-appointments--id--checkin">POST api/appointments/{id}/checkin</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-services">
                                <a href="#endpoints-GETapi-services">GET api/services</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-services">
                                <a href="#endpoints-GETapi-admin-services">GET api/admin/services</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-services">
                                <a href="#endpoints-POSTapi-admin-services">POST api/admin/services</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-services--id-">
                                <a href="#endpoints-GETapi-admin-services--id-">GET api/admin/services/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-services--id-">
                                <a href="#endpoints-PUTapi-admin-services--id-">PUT api/admin/services/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-services--id-">
                                <a href="#endpoints-DELETEapi-admin-services--id-">DELETE api/admin/services/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appointments">
                                <a href="#endpoints-GETapi-appointments">GET api/appointments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appointments">
                                <a href="#endpoints-POSTapi-appointments">POST api/appointments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appointments--id-">
                                <a href="#endpoints-GETapi-appointments--id-">GET api/appointments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-consultations--id-">
                                <a href="#endpoints-GETapi-consultations--id-">GET api/consultations/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-consultations">
                                <a href="#endpoints-POSTapi-consultations">POST api/consultations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-consultations-appointment--id-">
                                <a href="#endpoints-GETapi-consultations-appointment--id-">GET api/consultations/appointment/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-prescriptions">
                                <a href="#endpoints-POSTapi-prescriptions">POST api/prescriptions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-doctor-appointments">
                                <a href="#endpoints-GETapi-doctor-appointments">GET api/doctor/appointments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-doctor-appointments--id--start">
                                <a href="#endpoints-POSTapi-doctor-appointments--id--start">POST api/doctor/appointments/{id}/start</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-doctor-appointments--id--finish">
                                <a href="#endpoints-POSTapi-doctor-appointments--id--finish">POST api/doctor/appointments/{id}/finish</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-appointments--id--assign">
                                <a href="#endpoints-POSTapi-admin-appointments--id--assign">POST api/admin/appointments/{id}/assign</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pharmacy-scan">
                                <a href="#endpoints-POSTapi-pharmacy-scan">POST api/pharmacy/scan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pharmacy-prescriptions--id--pay">
                                <a href="#endpoints-POSTapi-pharmacy-prescriptions--id--pay">POST api/pharmacy/prescriptions/{id}/pay</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-pharmacy-prescriptions--id--dispense">
                                <a href="#endpoints-POSTapi-pharmacy-prescriptions--id--dispense">POST api/pharmacy/prescriptions/{id}/dispense</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appointments--id--prescription">
                                <a href="#endpoints-GETapi-appointments--id--prescription">GET api/appointments/{id}/prescription</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-departments">
                                <a href="#endpoints-GETapi-departments">GET api/departments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-doctors">
                                <a href="#endpoints-GETapi-doctors">GET api/doctors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-appointments">
                                <a href="#endpoints-GETapi-admin-appointments">GET api/admin/appointments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-stats">
                                <a href="#endpoints-GETapi-admin-stats">GET api/admin/stats</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-doctors">
                                <a href="#endpoints-GETapi-admin-doctors">GET api/admin/doctors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-doctors">
                                <a href="#endpoints-POSTapi-admin-doctors">POST api/admin/doctors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-doctors--id-">
                                <a href="#endpoints-PUTapi-admin-doctors--id-">PUT api/admin/doctors/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-doctors--id-">
                                <a href="#endpoints-DELETEapi-admin-doctors--id-">DELETE api/admin/doctors/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-home">
                                <a href="#endpoints-GETapi-home">GET api/home</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 24, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-register">POST api/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"email\": \"kunde.eloisa@example.com\",
    \"phone\": \"consequatur\",
    \"password\": \"[2UZ5ij-e\\/dl4\",
    \"address\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "email": "kunde.eloisa@example.com",
    "phone": "consequatur",
    "password": "[2UZ5ij-e\/dl4",
    "address": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-register"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="kunde.eloisa@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>kunde.eloisa@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-register"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="[2UZ5ij-e/dl4"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>[2UZ5ij-e/dl4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-register"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-login">POST api/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"password\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "password": "consequatur",
    "email": "carolyne.luettgen@example.org"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>identifier</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="identifier"                data-endpoint="POSTapi-login"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-checkin">POST api/checkin</h2>

<p>
</p>



<span id="example-requests-POSTapi-checkin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/checkin" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"qr_code\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/checkin"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "qr_code": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-checkin">
</span>
<span id="execution-results-POSTapi-checkin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-checkin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-checkin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-checkin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-checkin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-checkin" data-method="POST"
      data-path="api/checkin"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-checkin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-checkin"
                    onclick="tryItOut('POSTapi-checkin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-checkin"
                    onclick="cancelTryOut('POSTapi-checkin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-checkin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/checkin</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-checkin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-checkin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>qr_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="qr_code"                data-endpoint="POSTapi-checkin"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appointments--id--checkin">POST api/appointments/{id}/checkin</h2>

<p>
</p>



<span id="example-requests-POSTapi-appointments--id--checkin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appointments/consequatur/checkin" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointments/consequatur/checkin"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appointments--id--checkin">
</span>
<span id="execution-results-POSTapi-appointments--id--checkin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointments--id--checkin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointments--id--checkin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appointments--id--checkin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointments--id--checkin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appointments--id--checkin" data-method="POST"
      data-path="api/appointments/{id}/checkin"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointments--id--checkin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointments--id--checkin"
                    onclick="tryItOut('POSTapi-appointments--id--checkin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointments--id--checkin"
                    onclick="cancelTryOut('POSTapi-appointments--id--checkin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointments--id--checkin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointments/{id}/checkin</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appointments--id--checkin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appointments--id--checkin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-appointments--id--checkin"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the appointment. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-services">GET api/services</h2>

<p>
</p>



<span id="example-requests-GETapi-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-services">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-services" data-method="GET"
      data-path="api/services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-services"
                    onclick="tryItOut('GETapi-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-services"
                    onclick="cancelTryOut('GETapi-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-services">GET api/admin/services</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/admin/services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-services">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-services" data-method="GET"
      data-path="api/admin/services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-services"
                    onclick="tryItOut('GETapi-admin-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-services"
                    onclick="cancelTryOut('GETapi-admin-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-services">POST api/admin/services</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/admin/services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"code\": \"consequatur\",
    \"capacity\": 45,
    \"consultation_time\": 56,
    \"department_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "code": "consequatur",
    "capacity": 45,
    "consultation_time": 56,
    "department_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-services">
</span>
<span id="execution-results-POSTapi-admin-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-services" data-method="POST"
      data-path="api/admin/services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-services"
                    onclick="tryItOut('POSTapi-admin-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-services"
                    onclick="cancelTryOut('POSTapi-admin-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-admin-services"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-admin-services"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>capacity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="capacity"                data-endpoint="POSTapi-admin-services"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>consultation_time</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="consultation_time"                data-endpoint="POSTapi-admin-services"
               value="56"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>56</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="department_id"                data-endpoint="POSTapi-admin-services"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the departments table. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-admin-services--id-">GET api/admin/services/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/admin/services/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/services/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-services--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-services--id-" data-method="GET"
      data-path="api/admin/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-services--id-"
                    onclick="tryItOut('GETapi-admin-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-services--id-"
                    onclick="cancelTryOut('GETapi-admin-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-admin-services--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the service. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-services--id-">PUT api/admin/services/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/admin/services/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"capacity\": 45,
    \"consultation_time\": 56,
    \"department_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/services/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "capacity": 45,
    "consultation_time": 56,
    "department_id": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-services--id-">
</span>
<span id="execution-results-PUTapi-admin-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-services--id-" data-method="PUT"
      data-path="api/admin/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-services--id-"
                    onclick="tryItOut('PUTapi-admin-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-services--id-"
                    onclick="cancelTryOut('PUTapi-admin-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/services/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-admin-services--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the service. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-admin-services--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTapi-admin-services--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>capacity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="capacity"                data-endpoint="PUTapi-admin-services--id-"
               value="45"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>45</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>consultation_time</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="consultation_time"                data-endpoint="PUTapi-admin-services--id-"
               value="56"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>56</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>department_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="department_id"                data-endpoint="PUTapi-admin-services--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the departments table. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-admin-services--id-">DELETE api/admin/services/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/admin/services/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/services/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-services--id-">
</span>
<span id="execution-results-DELETEapi-admin-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-services--id-" data-method="DELETE"
      data-path="api/admin/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-services--id-"
                    onclick="tryItOut('DELETEapi-admin-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-services--id-"
                    onclick="cancelTryOut('DELETEapi-admin-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-admin-services--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the service. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-appointments">GET api/appointments</h2>

<p>
</p>



<span id="example-requests-GETapi-appointments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appointments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appointments">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appointments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appointments" data-method="GET"
      data-path="api/appointments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointments"
                    onclick="tryItOut('GETapi-appointments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointments"
                    onclick="cancelTryOut('GETapi-appointments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appointments">POST api/appointments</h2>

<p>
</p>



<span id="example-requests-POSTapi-appointments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appointments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"service_id\": \"consequatur\",
    \"date\": \"2026-04-24T18:55:02\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_id": "consequatur",
    "date": "2026-04-24T18:55:02"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appointments">
</span>
<span id="execution-results-POSTapi-appointments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appointments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appointments" data-method="POST"
      data-path="api/appointments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointments"
                    onclick="tryItOut('POSTapi-appointments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointments"
                    onclick="cancelTryOut('POSTapi-appointments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="service_id"                data-endpoint="POSTapi-appointments"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the services table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="POSTapi-appointments"
               value="2026-04-24T18:55:02"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2026-04-24T18:55:02</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appointments--id-">GET api/appointments/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-appointments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appointments/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointments/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appointments--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appointments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appointments--id-" data-method="GET"
      data-path="api/appointments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointments--id-"
                    onclick="tryItOut('GETapi-appointments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointments--id-"
                    onclick="cancelTryOut('GETapi-appointments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appointments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appointments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-appointments--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the appointment. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-consultations--id-">GET api/consultations/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-consultations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/consultations/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/consultations/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-consultations--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-consultations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-consultations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-consultations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-consultations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-consultations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-consultations--id-" data-method="GET"
      data-path="api/consultations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-consultations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-consultations--id-"
                    onclick="tryItOut('GETapi-consultations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-consultations--id-"
                    onclick="cancelTryOut('GETapi-consultations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-consultations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/consultations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-consultations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-consultations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-consultations--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the consultation. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-consultations">POST api/consultations</h2>

<p>
</p>



<span id="example-requests-POSTapi-consultations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/consultations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"appointment_id\": \"consequatur\",
    \"diagnosis\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/consultations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "appointment_id": "consequatur",
    "diagnosis": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-consultations">
</span>
<span id="execution-results-POSTapi-consultations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-consultations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-consultations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-consultations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-consultations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-consultations" data-method="POST"
      data-path="api/consultations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-consultations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-consultations"
                    onclick="tryItOut('POSTapi-consultations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-consultations"
                    onclick="cancelTryOut('POSTapi-consultations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-consultations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/consultations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-consultations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-consultations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>appointment_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="appointment_id"                data-endpoint="POSTapi-consultations"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the appointments table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>diagnosis</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="diagnosis"                data-endpoint="POSTapi-consultations"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-consultations"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETapi-consultations-appointment--id-">GET api/consultations/appointment/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-consultations-appointment--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/consultations/appointment/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/consultations/appointment/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-consultations-appointment--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-consultations-appointment--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-consultations-appointment--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-consultations-appointment--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-consultations-appointment--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-consultations-appointment--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-consultations-appointment--id-" data-method="GET"
      data-path="api/consultations/appointment/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-consultations-appointment--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-consultations-appointment--id-"
                    onclick="tryItOut('GETapi-consultations-appointment--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-consultations-appointment--id-"
                    onclick="cancelTryOut('GETapi-consultations-appointment--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-consultations-appointment--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/consultations/appointment/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-consultations-appointment--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-consultations-appointment--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-consultations-appointment--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the appointment. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-prescriptions">POST api/prescriptions</h2>

<p>
</p>



<span id="example-requests-POSTapi-prescriptions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/prescriptions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"consultation_id\": \"consequatur\",
    \"medications\": [
        {
            \"name\": \"consequatur\",
            \"dosage\": \"consequatur\",
            \"frequency\": \"consequatur\",
            \"duration\": \"consequatur\"
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/prescriptions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "consultation_id": "consequatur",
    "medications": [
        {
            "name": "consequatur",
            "dosage": "consequatur",
            "frequency": "consequatur",
            "duration": "consequatur"
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-prescriptions">
</span>
<span id="execution-results-POSTapi-prescriptions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-prescriptions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-prescriptions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-prescriptions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-prescriptions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-prescriptions" data-method="POST"
      data-path="api/prescriptions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-prescriptions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-prescriptions"
                    onclick="tryItOut('POSTapi-prescriptions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-prescriptions"
                    onclick="cancelTryOut('POSTapi-prescriptions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-prescriptions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/prescriptions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-prescriptions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-prescriptions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>consultation_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="consultation_id"                data-endpoint="POSTapi-prescriptions"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the consultations table. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>medications</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Must have at least 1 items.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="medications.0.name"                data-endpoint="POSTapi-prescriptions"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>dosage</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="medications.0.dosage"                data-endpoint="POSTapi-prescriptions"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>frequency</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="medications.0.frequency"                data-endpoint="POSTapi-prescriptions"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>duration</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="medications.0.duration"                data-endpoint="POSTapi-prescriptions"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-doctor-appointments">GET api/doctor/appointments</h2>

<p>
</p>



<span id="example-requests-GETapi-doctor-appointments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/doctor/appointments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/doctor/appointments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-doctor-appointments">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-doctor-appointments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doctor-appointments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doctor-appointments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-doctor-appointments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doctor-appointments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-doctor-appointments" data-method="GET"
      data-path="api/doctor/appointments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doctor-appointments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doctor-appointments"
                    onclick="tryItOut('GETapi-doctor-appointments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doctor-appointments"
                    onclick="cancelTryOut('GETapi-doctor-appointments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doctor-appointments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doctor/appointments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-doctor-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-doctor-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-doctor-appointments--id--start">POST api/doctor/appointments/{id}/start</h2>

<p>
</p>



<span id="example-requests-POSTapi-doctor-appointments--id--start">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/doctor/appointments/consequatur/start" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/doctor/appointments/consequatur/start"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-doctor-appointments--id--start">
</span>
<span id="execution-results-POSTapi-doctor-appointments--id--start" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doctor-appointments--id--start"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doctor-appointments--id--start"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-doctor-appointments--id--start" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doctor-appointments--id--start">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-doctor-appointments--id--start" data-method="POST"
      data-path="api/doctor/appointments/{id}/start"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doctor-appointments--id--start', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doctor-appointments--id--start"
                    onclick="tryItOut('POSTapi-doctor-appointments--id--start');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doctor-appointments--id--start"
                    onclick="cancelTryOut('POSTapi-doctor-appointments--id--start');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doctor-appointments--id--start"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doctor/appointments/{id}/start</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-doctor-appointments--id--start"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-doctor-appointments--id--start"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-doctor-appointments--id--start"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the appointment. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-doctor-appointments--id--finish">POST api/doctor/appointments/{id}/finish</h2>

<p>
</p>



<span id="example-requests-POSTapi-doctor-appointments--id--finish">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/doctor/appointments/consequatur/finish" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/doctor/appointments/consequatur/finish"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-doctor-appointments--id--finish">
</span>
<span id="execution-results-POSTapi-doctor-appointments--id--finish" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doctor-appointments--id--finish"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doctor-appointments--id--finish"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-doctor-appointments--id--finish" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doctor-appointments--id--finish">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-doctor-appointments--id--finish" data-method="POST"
      data-path="api/doctor/appointments/{id}/finish"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doctor-appointments--id--finish', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doctor-appointments--id--finish"
                    onclick="tryItOut('POSTapi-doctor-appointments--id--finish');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doctor-appointments--id--finish"
                    onclick="cancelTryOut('POSTapi-doctor-appointments--id--finish');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doctor-appointments--id--finish"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doctor/appointments/{id}/finish</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-doctor-appointments--id--finish"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-doctor-appointments--id--finish"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-doctor-appointments--id--finish"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the appointment. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-admin-appointments--id--assign">POST api/admin/appointments/{id}/assign</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-appointments--id--assign">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/admin/appointments/consequatur/assign" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"doctor_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/appointments/consequatur/assign"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "doctor_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-appointments--id--assign">
</span>
<span id="execution-results-POSTapi-admin-appointments--id--assign" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-appointments--id--assign"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-appointments--id--assign"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-appointments--id--assign" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-appointments--id--assign">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-appointments--id--assign" data-method="POST"
      data-path="api/admin/appointments/{id}/assign"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-appointments--id--assign', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-appointments--id--assign"
                    onclick="tryItOut('POSTapi-admin-appointments--id--assign');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-appointments--id--assign"
                    onclick="cancelTryOut('POSTapi-admin-appointments--id--assign');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-appointments--id--assign"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/appointments/{id}/assign</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-appointments--id--assign"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-appointments--id--assign"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-admin-appointments--id--assign"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the appointment. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>doctor_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="doctor_id"                data-endpoint="POSTapi-admin-appointments--id--assign"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the doctors table. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-pharmacy-scan">POST api/pharmacy/scan</h2>

<p>
</p>



<span id="example-requests-POSTapi-pharmacy-scan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pharmacy/scan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"qr_code\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pharmacy/scan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "qr_code": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pharmacy-scan">
</span>
<span id="execution-results-POSTapi-pharmacy-scan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pharmacy-scan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pharmacy-scan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pharmacy-scan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pharmacy-scan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pharmacy-scan" data-method="POST"
      data-path="api/pharmacy/scan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pharmacy-scan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pharmacy-scan"
                    onclick="tryItOut('POSTapi-pharmacy-scan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pharmacy-scan"
                    onclick="cancelTryOut('POSTapi-pharmacy-scan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pharmacy-scan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pharmacy/scan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pharmacy-scan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pharmacy-scan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>qr_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="qr_code"                data-endpoint="POSTapi-pharmacy-scan"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-pharmacy-prescriptions--id--pay">POST api/pharmacy/prescriptions/{id}/pay</h2>

<p>
</p>



<span id="example-requests-POSTapi-pharmacy-prescriptions--id--pay">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pharmacy/prescriptions/consequatur/pay" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pharmacy/prescriptions/consequatur/pay"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pharmacy-prescriptions--id--pay">
</span>
<span id="execution-results-POSTapi-pharmacy-prescriptions--id--pay" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pharmacy-prescriptions--id--pay"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pharmacy-prescriptions--id--pay"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pharmacy-prescriptions--id--pay" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pharmacy-prescriptions--id--pay">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pharmacy-prescriptions--id--pay" data-method="POST"
      data-path="api/pharmacy/prescriptions/{id}/pay"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pharmacy-prescriptions--id--pay', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pharmacy-prescriptions--id--pay"
                    onclick="tryItOut('POSTapi-pharmacy-prescriptions--id--pay');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pharmacy-prescriptions--id--pay"
                    onclick="cancelTryOut('POSTapi-pharmacy-prescriptions--id--pay');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pharmacy-prescriptions--id--pay"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pharmacy/prescriptions/{id}/pay</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pharmacy-prescriptions--id--pay"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pharmacy-prescriptions--id--pay"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-pharmacy-prescriptions--id--pay"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the prescription. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-pharmacy-prescriptions--id--dispense">POST api/pharmacy/prescriptions/{id}/dispense</h2>

<p>
</p>



<span id="example-requests-POSTapi-pharmacy-prescriptions--id--dispense">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pharmacy/prescriptions/consequatur/dispense" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pharmacy/prescriptions/consequatur/dispense"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pharmacy-prescriptions--id--dispense">
</span>
<span id="execution-results-POSTapi-pharmacy-prescriptions--id--dispense" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pharmacy-prescriptions--id--dispense"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pharmacy-prescriptions--id--dispense"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pharmacy-prescriptions--id--dispense" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pharmacy-prescriptions--id--dispense">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pharmacy-prescriptions--id--dispense" data-method="POST"
      data-path="api/pharmacy/prescriptions/{id}/dispense"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pharmacy-prescriptions--id--dispense', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pharmacy-prescriptions--id--dispense"
                    onclick="tryItOut('POSTapi-pharmacy-prescriptions--id--dispense');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pharmacy-prescriptions--id--dispense"
                    onclick="cancelTryOut('POSTapi-pharmacy-prescriptions--id--dispense');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pharmacy-prescriptions--id--dispense"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pharmacy/prescriptions/{id}/dispense</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pharmacy-prescriptions--id--dispense"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pharmacy-prescriptions--id--dispense"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-pharmacy-prescriptions--id--dispense"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the prescription. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-appointments--id--prescription">GET api/appointments/{id}/prescription</h2>

<p>
</p>



<span id="example-requests-GETapi-appointments--id--prescription">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appointments/consequatur/prescription" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointments/consequatur/prescription"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appointments--id--prescription">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointments--id--prescription" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointments--id--prescription"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointments--id--prescription"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appointments--id--prescription" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointments--id--prescription">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appointments--id--prescription" data-method="GET"
      data-path="api/appointments/{id}/prescription"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointments--id--prescription', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointments--id--prescription"
                    onclick="tryItOut('GETapi-appointments--id--prescription');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointments--id--prescription"
                    onclick="cancelTryOut('GETapi-appointments--id--prescription');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointments--id--prescription"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointments/{id}/prescription</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appointments--id--prescription"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appointments--id--prescription"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-appointments--id--prescription"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the appointment. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-departments">GET api/departments</h2>

<p>
</p>



<span id="example-requests-GETapi-departments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/departments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/departments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-departments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;General&quot;,
        &quot;code&quot;: &quot;GEN&quot;,
        &quot;description&quot;: null,
        &quot;created_at&quot;: &quot;2026-04-12T19:26:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T19:26:46.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-departments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-departments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-departments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-departments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-departments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-departments" data-method="GET"
      data-path="api/departments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-departments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-departments"
                    onclick="tryItOut('GETapi-departments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-departments"
                    onclick="cancelTryOut('GETapi-departments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-departments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/departments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-departments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-doctors">GET api/doctors</h2>

<p>
</p>



<span id="example-requests-GETapi-doctors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/doctors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/doctors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-doctors">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;user_id&quot;: 3,
        &quot;service_id&quot;: 1,
        &quot;created_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Dr House&quot;,
            &quot;email&quot;: &quot;doctor@test.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;user_id&quot;: 5,
        &quot;service_id&quot;: 1,
        &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Dr Ngom&quot;,
            &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        }
    },
    {
        &quot;id&quot;: 3,
        &quot;user_id&quot;: 10,
        &quot;service_id&quot;: 3,
        &quot;created_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Dr Mbagnick&quot;,
            &quot;email&quot;: &quot;drmbagnick@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        }
    },
    {
        &quot;id&quot;: 4,
        &quot;user_id&quot;: 12,
        &quot;service_id&quot;: 4,
        &quot;created_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Dr SY&quot;,
            &quot;email&quot;: &quot;doctorsy@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        }
    },
    {
        &quot;id&quot;: 5,
        &quot;user_id&quot;: 14,
        &quot;service_id&quot;: 2,
        &quot;created_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Dr Diop&quot;,
            &quot;email&quot;: &quot;drdiop@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-doctors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doctors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doctors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-doctors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doctors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-doctors" data-method="GET"
      data-path="api/doctors"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doctors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doctors"
                    onclick="tryItOut('GETapi-doctors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doctors"
                    onclick="cancelTryOut('GETapi-doctors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doctors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doctors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-appointments">GET api/admin/appointments</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-appointments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/admin/appointments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/appointments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-appointments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 39,
        &quot;patient_id&quot;: 6,
        &quot;doctor_id&quot;: null,
        &quot;service_id&quot;: 4,
        &quot;date&quot;: &quot;2026-04-24&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;created_at&quot;: &quot;2026-04-24T16:40:18.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-24T16:40:18.000000Z&quot;,
        &quot;qr_code&quot;: &quot;68d9b20d-2f62-43e6-b31e-6b67a4102a48&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 4,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Maternit&eacute;&quot;,
            &quot;code&quot;: &quot;MTR&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 12,
            &quot;consultation_time&quot;: 8,
            &quot;created_at&quot;: &quot;2026-04-21T18:21:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-21T18:21:09.000000Z&quot;
        },
        &quot;doctor&quot;: null,
        &quot;patient&quot;: {
            &quot;id&quot;: 6,
            &quot;user_id&quot;: 15,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+221773523242&quot;,
            &quot;address&quot;: &quot;Kounoune 2&quot;,
            &quot;created_at&quot;: &quot;2026-04-24T16:35:12.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-24T16:35:12.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 15,
                &quot;name&quot;: &quot;Oumy Diop&quot;,
                &quot;email&quot;: &quot;oumydiop@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-24T16:35:12.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-24T16:35:12.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 38,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: null,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-05-26&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;created_at&quot;: &quot;2026-04-24T15:08:19.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-24T15:08:19.000000Z&quot;,
        &quot;qr_code&quot;: &quot;42581dd3-2656-42a7-8a7e-4b5a6c1528df&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: null,
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 37,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: null,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-05-20&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;created_at&quot;: &quot;2026-04-24T15:07:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-24T15:07:53.000000Z&quot;,
        &quot;qr_code&quot;: &quot;71a57263-0551-4978-977f-25d662b5f706&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: null,
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 36,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 3,
        &quot;date&quot;: &quot;2026-04-27&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;done&quot;,
        &quot;created_at&quot;: &quot;2026-04-22T16:38:48.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T16:41:26.000000Z&quot;,
        &quot;qr_code&quot;: &quot;da4f5860-ab28-44d5-b10e-bbecd6b06e22&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 3,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Radiologie&quot;,
            &quot;code&quot;: &quot;RDG&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 22,
            &quot;consultation_time&quot;: 25,
            &quot;created_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 35,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 5,
        &quot;service_id&quot;: 2,
        &quot;date&quot;: &quot;2026-04-28&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;in_progress&quot;,
        &quot;created_at&quot;: &quot;2026-04-22T14:17:45.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T16:04:21.000000Z&quot;,
        &quot;qr_code&quot;: &quot;070c415f-5209-4624-8877-b68cb9f0405d&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 2,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Ophtalmologie&quot;,
            &quot;code&quot;: &quot;OPHT&quot;,
            &quot;type&quot;: &quot;Occulaire&quot;,
            &quot;capacity&quot;: 25,
            &quot;consultation_time&quot;: 10,
            &quot;created_at&quot;: &quot;2026-04-14T21:23:28.000000Z&quot;,
            &quot;updated_at&quot;: null
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 5,
            &quot;user_id&quot;: 14,
            &quot;service_id&quot;: 2,
            &quot;created_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 14,
                &quot;name&quot;: &quot;Dr Diop&quot;,
                &quot;email&quot;: &quot;drdiop@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 34,
        &quot;patient_id&quot;: 5,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 3,
        &quot;date&quot;: &quot;2026-04-23&quot;,
        &quot;queue_number&quot;: 2,
        &quot;status&quot;: &quot;in_progress&quot;,
        &quot;created_at&quot;: &quot;2026-04-21T23:32:45.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T16:20:36.000000Z&quot;,
        &quot;qr_code&quot;: &quot;9df4cb27-2da4-4f99-ac99-f19bd4c3451a&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 3,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Radiologie&quot;,
            &quot;code&quot;: &quot;RDG&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 22,
            &quot;consultation_time&quot;: 25,
            &quot;created_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 5,
            &quot;user_id&quot;: 13,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+221776617562&quot;,
            &quot;address&quot;: &quot;Bambilor&quot;,
            &quot;created_at&quot;: &quot;2026-04-21T21:38:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-21T21:38:00.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 13,
                &quot;name&quot;: &quot;Moussa Gueye&quot;,
                &quot;email&quot;: &quot;moussagueye@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-21T21:38:00.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-21T21:38:00.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 33,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 2,
        &quot;date&quot;: &quot;2026-04-30&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;in_progress&quot;,
        &quot;created_at&quot;: &quot;2026-04-21T17:25:58.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T16:26:38.000000Z&quot;,
        &quot;qr_code&quot;: &quot;9feac8b2-8e1b-486a-a79d-866bd20052af&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 2,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Ophtalmologie&quot;,
            &quot;code&quot;: &quot;OPHT&quot;,
            &quot;type&quot;: &quot;Occulaire&quot;,
            &quot;capacity&quot;: 25,
            &quot;consultation_time&quot;: 10,
            &quot;created_at&quot;: &quot;2026-04-14T21:23:28.000000Z&quot;,
            &quot;updated_at&quot;: null
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 32,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-04-22&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;in_progress&quot;,
        &quot;created_at&quot;: &quot;2026-04-21T15:46:06.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T14:54:33.000000Z&quot;,
        &quot;qr_code&quot;: &quot;650b7e19-3f65-42ce-b927-7e583a7cdb52&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 31,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-05-19&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;confirmed&quot;,
        &quot;created_at&quot;: &quot;2026-04-21T15:35:14.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T15:03:41.000000Z&quot;,
        &quot;qr_code&quot;: &quot;431dcbe8-bab7-4807-be88-62b48d5be8f1&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 30,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 3,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-04-25&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;confirmed&quot;,
        &quot;created_at&quot;: &quot;2026-04-21T13:52:36.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-21T13:52:36.000000Z&quot;,
        &quot;qr_code&quot;: &quot;11e2acf4-a66b-4c8b-b26e-cca477592d90&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 10,
            &quot;service_id&quot;: 3,
            &quot;created_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Dr Mbagnick&quot;,
                &quot;email&quot;: &quot;drmbagnick@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 29,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-04-21&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;done&quot;,
        &quot;created_at&quot;: &quot;2026-04-21T13:01:36.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-21T19:24:30.000000Z&quot;,
        &quot;qr_code&quot;: &quot;b53c6fad-dbef-438d-8d0d-2a7508dcb38f&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 28,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 3,
        &quot;date&quot;: &quot;2026-04-23&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;confirmed&quot;,
        &quot;created_at&quot;: &quot;2026-04-15T17:58:08.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-15T18:01:13.000000Z&quot;,
        &quot;qr_code&quot;: &quot;939d70e7-e5cb-4cce-ac11-343a10a758ec&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 3,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Radiologie&quot;,
            &quot;code&quot;: &quot;RDG&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 22,
            &quot;consultation_time&quot;: 25,
            &quot;created_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 27,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 1,
        &quot;service_id&quot;: 2,
        &quot;date&quot;: &quot;2026-04-26&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;confirmed&quot;,
        &quot;created_at&quot;: &quot;2026-04-14T23:22:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-15T14:58:07.000000Z&quot;,
        &quot;qr_code&quot;: &quot;d400c1d7-32e3-45d7-9377-0a3ff409ad82&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 2,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Ophtalmologie&quot;,
            &quot;code&quot;: &quot;OPHT&quot;,
            &quot;type&quot;: &quot;Occulaire&quot;,
            &quot;capacity&quot;: 25,
            &quot;consultation_time&quot;: 10,
            &quot;created_at&quot;: &quot;2026-04-14T21:23:28.000000Z&quot;,
            &quot;updated_at&quot;: null
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 3,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Dr House&quot;,
                &quot;email&quot;: &quot;doctor@test.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 16,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 2,
        &quot;date&quot;: &quot;2026-04-14&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;done&quot;,
        &quot;created_at&quot;: &quot;2026-04-14T21:25:36.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-14T21:30:34.000000Z&quot;,
        &quot;qr_code&quot;: &quot;447efc22-323a-4b78-b27c-e635d24ba09f&quot;,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 2,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Ophtalmologie&quot;,
            &quot;code&quot;: &quot;OPHT&quot;,
            &quot;type&quot;: &quot;Occulaire&quot;,
            &quot;capacity&quot;: 25,
            &quot;consultation_time&quot;: 10,
            &quot;created_at&quot;: &quot;2026-04-14T21:23:28.000000Z&quot;,
            &quot;updated_at&quot;: null
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 4,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-04-12&quot;,
        &quot;queue_number&quot;: 2,
        &quot;status&quot;: &quot;done&quot;,
        &quot;created_at&quot;: &quot;2026-04-12T21:46:19.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T22:55:13.000000Z&quot;,
        &quot;qr_code&quot;: null,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 3,
        &quot;patient_id&quot;: 3,
        &quot;doctor_id&quot;: 2,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-04-15&quot;,
        &quot;queue_number&quot;: 2,
        &quot;status&quot;: &quot;done&quot;,
        &quot;created_at&quot;: &quot;2026-04-12T21:14:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-14T21:09:43.000000Z&quot;,
        &quot;qr_code&quot;: null,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 5,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Dr Ngom&quot;,
                &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 6,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;+21771934674&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Patient Ibou&quot;,
                &quot;email&quot;: &quot;patientIbou@siigh.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T21:05:54.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;patient_id&quot;: 2,
        &quot;doctor_id&quot;: 1,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-04-15&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;confirmed&quot;,
        &quot;created_at&quot;: &quot;2026-04-12T20:35:16.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T20:35:16.000000Z&quot;,
        &quot;qr_code&quot;: null,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 3,
            &quot;service_id&quot;: 1,
            &quot;created_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Dr House&quot;,
                &quot;email&quot;: &quot;doctor@test.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
                &quot;role&quot;: &quot;doctor&quot;
            }
        },
        &quot;patient&quot;: {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 4,
            &quot;birth_date&quot;: &quot;2000-01-01&quot;,
            &quot;phone&quot;: &quot;770000000&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T20:33:34.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T20:33:34.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Pape Patient&quot;,
                &quot;email&quot;: &quot;patient@test.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T20:21:04.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T20:21:04.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    },
    {
        &quot;id&quot;: 1,
        &quot;patient_id&quot;: 1,
        &quot;doctor_id&quot;: null,
        &quot;service_id&quot;: 1,
        &quot;date&quot;: &quot;2026-04-15&quot;,
        &quot;queue_number&quot;: 1,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;created_at&quot;: &quot;2026-04-12T19:37:51.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T19:37:51.000000Z&quot;,
        &quot;qr_code&quot;: null,
        &quot;checked_in_at&quot;: null,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        },
        &quot;doctor&quot;: null,
        &quot;patient&quot;: {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;birth_date&quot;: null,
            &quot;phone&quot;: &quot;770000000&quot;,
            &quot;address&quot;: &quot;Dakar&quot;,
            &quot;created_at&quot;: &quot;2026-04-12T19:22:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:22:21.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Test User&quot;,
                &quot;email&quot;: &quot;test@test.com&quot;,
                &quot;email_verified_at&quot;: null,
                &quot;created_at&quot;: &quot;2026-04-12T19:22:09.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-04-12T19:22:09.000000Z&quot;,
                &quot;role&quot;: &quot;patient&quot;
            }
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-appointments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-appointments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-appointments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-appointments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-appointments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-appointments" data-method="GET"
      data-path="api/admin/appointments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-appointments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-appointments"
                    onclick="tryItOut('GETapi-admin-appointments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-appointments"
                    onclick="cancelTryOut('GETapi-admin-appointments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-appointments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/appointments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-appointments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-stats">GET api/admin/stats</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/admin/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;total_appointments&quot;: 18,
    &quot;today_appointments&quot;: 1,
    &quot;services&quot;: 4,
    &quot;departments&quot;: 1,
    &quot;doctors&quot;: 5
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-stats" data-method="GET"
      data-path="api/admin/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-stats"
                    onclick="tryItOut('GETapi-admin-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-stats"
                    onclick="cancelTryOut('GETapi-admin-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-doctors">GET api/admin/doctors</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-doctors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/admin/doctors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/doctors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-doctors">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 5,
        &quot;user_id&quot;: 14,
        &quot;service_id&quot;: 2,
        &quot;created_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Dr Diop&quot;,
            &quot;email&quot;: &quot;drdiop@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-22T00:25:53.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        },
        &quot;service&quot;: {
            &quot;id&quot;: 2,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Ophtalmologie&quot;,
            &quot;code&quot;: &quot;OPHT&quot;,
            &quot;type&quot;: &quot;Occulaire&quot;,
            &quot;capacity&quot;: 25,
            &quot;consultation_time&quot;: 10,
            &quot;created_at&quot;: &quot;2026-04-14T21:23:28.000000Z&quot;,
            &quot;updated_at&quot;: null
        }
    },
    {
        &quot;id&quot;: 4,
        &quot;user_id&quot;: 12,
        &quot;service_id&quot;: 4,
        &quot;created_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Dr SY&quot;,
            &quot;email&quot;: &quot;doctorsy@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-21T19:42:05.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        },
        &quot;service&quot;: {
            &quot;id&quot;: 4,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Maternit&eacute;&quot;,
            &quot;code&quot;: &quot;MTR&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 12,
            &quot;consultation_time&quot;: 8,
            &quot;created_at&quot;: &quot;2026-04-21T18:21:09.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-21T18:21:09.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 3,
        &quot;user_id&quot;: 10,
        &quot;service_id&quot;: 3,
        &quot;created_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Dr Mbagnick&quot;,
            &quot;email&quot;: &quot;drmbagnick@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-15T16:46:07.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        },
        &quot;service&quot;: {
            &quot;id&quot;: 3,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Radiologie&quot;,
            &quot;code&quot;: &quot;RDG&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 22,
            &quot;consultation_time&quot;: 25,
            &quot;created_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-15T15:32:45.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;user_id&quot;: 5,
        &quot;service_id&quot;: 1,
        &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Dr Ngom&quot;,
            &quot;email&quot;: &quot;doctorngom@siigh.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T21:03:44.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        },
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 1,
        &quot;user_id&quot;: 3,
        &quot;service_id&quot;: 1,
        &quot;created_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-04-12T19:34:27.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Dr House&quot;,
            &quot;email&quot;: &quot;doctor@test.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;created_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:34:05.000000Z&quot;,
            &quot;role&quot;: &quot;doctor&quot;
        },
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;department_id&quot;: 1,
            &quot;name&quot;: &quot;Consultation g&eacute;n&eacute;rale&quot;,
            &quot;code&quot;: &quot;CONS-GEN&quot;,
            &quot;type&quot;: null,
            &quot;capacity&quot;: 20,
            &quot;consultation_time&quot;: 15,
            &quot;created_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-04-12T19:27:10.000000Z&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-doctors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-doctors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-doctors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-doctors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-doctors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-doctors" data-method="GET"
      data-path="api/admin/doctors"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-doctors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-doctors"
                    onclick="tryItOut('GETapi-admin-doctors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-doctors"
                    onclick="cancelTryOut('GETapi-admin-doctors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-doctors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/doctors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-doctors">POST api/admin/doctors</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-doctors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/admin/doctors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"password\": \"ij-e\\/dl4m\",
    \"service_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/doctors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "password": "ij-e\/dl4m",
    "service_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-admin-doctors">
</span>
<span id="execution-results-POSTapi-admin-doctors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-doctors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-doctors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-doctors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-doctors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-doctors" data-method="POST"
      data-path="api/admin/doctors"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-doctors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-doctors"
                    onclick="tryItOut('POSTapi-admin-doctors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-doctors"
                    onclick="cancelTryOut('POSTapi-admin-doctors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-doctors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/doctors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-doctors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-admin-doctors"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-admin-doctors"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-admin-doctors"
               value="ij-e/dl4m"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>ij-e/dl4m</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="service_id"                data-endpoint="POSTapi-admin-doctors"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the services table. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-admin-doctors--id-">PUT api/admin/doctors/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-doctors--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/admin/doctors/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/doctors/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "email": "carolyne.luettgen@example.org"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-doctors--id-">
</span>
<span id="execution-results-PUTapi-admin-doctors--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-doctors--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-doctors--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-doctors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-doctors--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-doctors--id-" data-method="PUT"
      data-path="api/admin/doctors/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-doctors--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-doctors--id-"
                    onclick="tryItOut('PUTapi-admin-doctors--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-doctors--id-"
                    onclick="cancelTryOut('PUTapi-admin-doctors--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-doctors--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/doctors/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-doctors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-doctors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-doctors--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the doctor. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-admin-doctors--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-admin-doctors--id-"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="service_id"                data-endpoint="PUTapi-admin-doctors--id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the services table.</p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-admin-doctors--id-">DELETE api/admin/doctors/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-doctors--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/admin/doctors/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/admin/doctors/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-doctors--id-">
</span>
<span id="execution-results-DELETEapi-admin-doctors--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-doctors--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-doctors--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-doctors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-doctors--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-doctors--id-" data-method="DELETE"
      data-path="api/admin/doctors/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-doctors--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-doctors--id-"
                    onclick="tryItOut('DELETEapi-admin-doctors--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-doctors--id-"
                    onclick="cancelTryOut('DELETEapi-admin-doctors--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-doctors--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/doctors/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-doctors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-doctors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-doctors--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the doctor. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-home">GET api/home</h2>

<p>
</p>



<span id="example-requests-GETapi-home">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/home" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/home"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-home">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-home" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-home"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-home"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-home" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-home">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-home" data-method="GET"
      data-path="api/home"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-home', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-home"
                    onclick="tryItOut('GETapi-home');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-home"
                    onclick="cancelTryOut('GETapi-home');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-home"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/home</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-home"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-home"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
