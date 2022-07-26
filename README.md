# restwp
Wordpress REST endpoint creation with middleware.

<p>
Separating your WP REST endpoints with their permissions and controller.
</p>

<h2>Getting Started</h2>

load the required files in <code>functions.php</code> 

```php
/** functions.php **/
<?php
  require_once get_template_directory() . '/libs/utilities/main.php';
  require_once get_template_directory() . '/libs/enqueue/main.php';
  require_once get_template_directory() . '/libs/rest/main.php';
  ?>
```

<h2>API</h2>

<h4><code>Route::use</code></h4>

```php
  use Sione\REST\Route;
  
  Route::use( <namespace:string> )
```

<h5>Usage</h5>

```php
  use Sione\REST\Route;
  
  Route::use( "your_theme_or_plugin_namespace" )
```
