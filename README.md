perch2-feather-bootstrap
========================

Bootstrap feather for Perch 2 CMS utilizing [BootstrapCDN](http://www.bootstrapcdn.com).


Usage
-----

Clone this repo and put its contents inside your perch installation directory (`PERCH_PATH` from now on).

Enable the feather adding the following line to `PERCH_PATH/config/feathers.php`

    include(PERCH_PATH.'/addons/feathers/bootstrap/runtime.php');

Add perch feathers output inside your pages using `perch_get_css()` and `perch_get_javascript()`.

### Selecting a theme
If you want to use one of the [Bootswatch themes](http://www.bootstrapcdn.com/#bootswatch_tab)
available on the CDN pass its lowercase name with `perch_get_css` options, like so:

    perch_get_css(array(
      'bootswatch' => 'amelia'
    ));


What it does
------------

This feather adds css and javascript tags for including boostrap files served by BootstrapCDN.
Currently file from version 3.0.1 are included.

The most recent version of jQuery is also automatically included as the `jquery` *component*
if it's not already present (e.g. already added by another feather).
