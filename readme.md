
# Wordpress Template Toolkit

## Key Features

* Modular Sass/SCSS & js files compiled and imported as single files
* Object oriented templates using the Twig templating engine along with the Timber plugin 
* BEM front-end naming methodology using PostHTML plugin to simplify maintenance
* Build script to preprocess and optimize assets
* Live browser testing (using Livereload)
* ACF-JSON to save ACF field data under version control
* CPT sample adapted from Plate theme by studio.bio
* HTML schema, accessibility-ready patterns from the WP theme guide, ARIA values, screen reader text and a11y.js for expanded accessibility support. Adapted from Plate theme by studio.bio

## Installation

To clone and run this application, you'll need [Git](https://git-scm.com) and [Node.js](https://nodejs.org/en/download/) (which comes with [npm](http://npmjs.com)) installed on your computer. From your command line:

```bash
# Clone this repository into your wordpress theme folder
$ git clone https://github.com/jnds/wp-template-toolkit

# Go into the repository
$ cd wp-template-toolkit

# Install dependencies
$ npm install
```

## Usage

```bash

# Run the gulp watch task to monitor changes in the file system. As soon as you save a file, it is preprocessed as needed and the browser is refreshed

$ gulp watch

# Run the gulp build task to erase existing build and theme folders and compile the latest version

$ gulp build

```

## Built with 

- [jQuery - Ajax](http://www.w3schools.com/jquery/jquery_ref_ajax.asp) - jQuery simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.
- [Bootstrap](http://getbootstrap.com/) - Extensive list of components and  Bundled Javascript plugins.

## To-do

- Move the development source folder outside of wordpress and copy the build folder to the active theme folder
- Create a symlink to ACF JSON in the theme folder so that the source and theme are always in sync
- Improve organisation and structure of hooks and custom functions (see Timber Starter theme)
- Add boilerplate code for handling AJAX requests
- Add boilerplate code image srcset and lazyloading
- Add extra mixins and functions for typography & grid system
- Consider loading jQuery from a CDN instead of compiling a self hosted version
- Choose an alternative to bootstrap grid
- Setup intial component library
- Test accessibility and page load times


### Bug / Feature Request

If you find a bug (the website couldn't handle the query and / or gave undesired results), kindly open an issue [here](https://github.com/jnds/wp-template-toolkit/issues/new) by including your search query and the expected result.

If you'd like to request a new function, feel free to do so by opening an issue [here](https://github.com/jnds/wp-template-toolkit/issues/new). Please include sample queries and their corresponding results.


## Acknowledgments

* ️[Plate](https://studio.bio/themes/plate) by [studio.bio](https://studio.bio/)
  - Plate evolved out of [Bones](https://themble.com/bones/) starter theme by Eddie Machado. I use Plate because it is a blank platform that allows you to get your project up and running quickly. For more information please visit: 

* The Timber Starter Theme by Upstatement
  - The "_s" for Timber: a dead-simple theme that you can build from. With Timber, you write your HTML using the Twig Template Engine separate from your PHP files and can take advantage of object-oriented patterns that adhere to DRY and MVC principles.

* [Fabrica Dev Kit](https://fabri.ca/wp-tools/) by [Fabrica](https://fabri.ca)
  - An environment and build toolkit to accelerate and optimize the entire WordPress development process. Do better work faster, on projects of any scale.