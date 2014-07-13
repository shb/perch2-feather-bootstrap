perch2-feather-bootstrap
========================

Bootstrap feather for Perch 2 CMS utilizing [BootstrapCDN](http://www.bootstrapcdn.com).


What it does
------------

This feather adds css and javascript tags for including boostrap files served by BootstrapCDN.
By default files from version 3.2.0 are included.

The most recent version of jQuery is also automatically included as the `jquery` *component*
if it's not already present (e.g. already added by another feather).

You can optionally include the Font Awesome css.


Usage
-----

Clone this repo and put its contents inside your perch addons directory.

Enable the feather adding the following line to `PERCH_PATH/config/feathers.php`

    include(PERCH_PATH.'/addons/feathers/bootstrap/runtime.php');

Inject the feathers' output inside your pages using `perch_get_css()` and `perch_get_javascript()`.

### Specifying bootstrap options
You can specify options by passing an array to the css output
function containing a `bootstrap` key, e.g. like so:

    perch_get_css(array(
      'bootstrap' => array(
        'version' => '3.0.0',
        'theme' => 'amelia'
      )
    ));

Available options are:

- `version`  Selects a different version to use. **Check on BootstrapCDN**
- `theme`    A [Bootswatch theme](http://www.bootstrapcdn.com/#bootswatch_tab)
  to use instead of the default

If you only want to specify a theme you can pass it directly as the value
of `bootstrap` option, e.g.:

    perch_get_css(array(
      'bootstrap' => 'simplex'
    ));

### Including Font Awesome
By setting the top-level `font-awesome` option to **true** you can also pull in
[Font Awesome](http://www.bootstrapcdn.com/#fontawesome_tab). You can specify
e versione to use by setting it to a string or an array with a `version`
key set to the desired version.

### Specifying jQuery version
Similarly to the above, you can specify which jQuery version to use by setting
the top-level `jquery` option to a string (or array with `version` key set)
containing the exact version denomination as per `http://code.jquery.com/jquery`.

