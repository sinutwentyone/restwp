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

<h4><code>Route::use< namespace:string ></code></h4>

<h5>Usage</h5>

```php
  use Sione\REST\Route;
  
  Route::use( "your_theme_or_plugin_namespace" )
```

<h4><code>Route::get< endpoint:string, controller:callable ></code></h4>
  
<h5>Usage</h5>

```php
  use Sione\REST\Route;
  
  class GetPostsController {    
    public function get( $request : WP_REST_Request ) {
      return rest_ensure_response( "Hello There" );
    }
  }
  
  Route::use( "restwp" )
  
  Route::get( "my_posts", [ new GetPostsController, "get" ] )
```

Access with jQuery

```typescript
  $.ajax( "your-wordpress-rest-route/restwp/my_posts", {
    method: "get",
    success: ( response: string ) => {
      console.log( response ) 
      // Hello There
    }
  })
```


