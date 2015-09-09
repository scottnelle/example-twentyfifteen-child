# Example twentyfifteen child theme
An example child theme for twentyfifteen, created to support a presentation on how to build child themes for the Burlington VT WordPress meetup group. It shows an example of a minor CSS customization, adds a widget area to the home page, enhances the color scheme functionality of the parent, and adds a body font selector to the customizer.

The presentation initially included the following links for more information:
* [Wordpress Codex entry for Child](Themes http://codex.wordpress.org/Child_Themes) tells you most of what you need to know about child themes, with links to additional resources.
* [The Genesis Framework by StudioPress](http://my.studiopress.com/themes/) is a great example of a theme framework that is designed to support child themes. A variety of child themes for different business niches are available.
* [Layers](http://layerswp.com/) is a free theme framework with a large variety of free and premium child themes available. Premium themes for specific business niches are available from [Themeforest](http://themeforest.net/search?term=layers+child+theme).
* A variety of functions are available for referencing files in your child theme and parent theme. These functions are:
  * [get_stylesheet_directory_uri()](http://codex.wordpress.org/Function_Reference/get_stylesheet_directory_uri) - Get a web URI for the root of your **child** theme. Helpful for including static assets.
  * [get_stylesheet_directory()](http://codex.wordpress.org/Function_Reference/get_stylesheet_directory) - Get absolute server path for the root of your **child** theme. Helpful for including php files.
  * [get_template_directory_uri()](http://codex.wordpress.org/Function_Reference/get_template_directory_uri) - Get a web URI for the root of your **parent** theme. Helpful for including static assets.
  * [get_template_directory()](http://codex.wordpress.org/Function_Reference/get_template_directory) - Get absolute server path for the root of your **parent** theme. Helpful for including php files.
