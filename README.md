# restwp
Wordpress REST endpoint creation with middleware.

<h2>The Purpose</h2>

<p>
I just want to separate things between Endpoint Registration, Controller, and Middleware more clearly. The WP "standard" way is working just fine. Maybe just too "muddy" for me.
</p>

<h2>Getting Started</h2>

load the required files in <code>functions.php</code> 

<pre>
<?php
  require_once get_template_directory() . '/sione/utilities/main.php';
  require_once get_template_directory() . '/sione/enqueue/main.php';
  require_once get_template_directory() . '/sione/rest/main.php';
</pre>
