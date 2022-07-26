# restwp
Wordpress REST utility.

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

<h4><code>Route::post< endpoint:string, controller:callable ></code></h4>
  
<h5>Usage</h5>


```php
  use Sione\REST\Route;
  
  class GetPostsController {    
    public function get( $request = WP_REST_Request ) {
      return rest_ensure_response( "Hello There" );
    }
  
    public function createPost( $request = WP_REST_Request ) {
        $post_data = $request->get_params();
  
        wp_insert_post( $post_data );
    }
  }
  
  Route::use( "restwp" )
  
  Route::post( "my_posts", [ new GetPostsController, "createPost" ] )
```

Access with jQuery

```typescript
  $.ajax( "your-wordpress-rest-route/restwp/my_posts", {
    method: "post",
    data: {
      post_title: "Hello There",
      post_content: "Hello world"
    }
  })
```

<h2>Adding Middleware</h2>
  
<h4>Method::middleware<middlewares:callables[]></h4>
    
<code>return : WP_REST_Request|other</code>
    
<p>If <code>return</code> is not <code>instanceof WP_REST_Request</code>. the <code>return</code> will be returned immediately as response.</p>
  
  <h5>Usage</h5>
  
```php
  use Sione\REST\Route;
  
  class GetPostsController {    
    public function get( $request = WP_REST_Request ) {
      return rest_ensure_response( "Hello There" );
    }
  
    public function createPost( $request = WP_REST_Request ) {
        $post_data = $request->get_params();
  
        wp_insert_post( $post_data );
    }
  }
  
  public function user_can_edit_theme_options( $next, $request ) {
    if ( current_user_can( 'edit_theme_options' ) ) {
      // Go to next middleware
      return $next( $request );
    } else {     
      return new WP_Error( 'Unauthorized', 'You can\'t access, you can\'t edit theme', [ 'status' => 403 ] );
    }
  }
  
  Route::use( "restwp" )
  
  Route::post( "my_posts", [ new GetPostsController, "createPost" ] )
  ->middleware( [ 'user_can_edit_theme_options' ] );
  
```
