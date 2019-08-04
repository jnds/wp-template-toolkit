
# Wordpress Template Toolkit

## Key Features

* Build script to preprocess and optimize assets
* Modular SCSS & javacript files compiled and imported as single files
* Live browser testing (using Livereload)
* MVC-like separation of concerns for templates using the Twig templating engine along with the Timber plugin 
* PostHTML plugin to simplify the maintenance of BEM naming structure in html
* ACF-JSON to save ACF field data under version control
* Automated image optimisation
* Helper functions to cleanup the wordpress head and dashboard adapted from [Plate](https://studio.bio/themes/plate) and elsewhere
* Custom post type and taxonomy samples adapted from [Plate](https://studio.bio/themes/plate)
* HTML schema & accessibility support adapted from [Plate](https://studio.bio/themes/plate)
  - accessibility-ready patterns from the WP theme guide 
  - ARIA values, 
  - screen reader text 
  - a11y.js

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
The gulp tasks for compiling and optimizing assets all live in separate files. This adds a little redundancy to the code but it’s a nice way to keep things modular and tidy. 


## Why use a 23 column bootstrap grid 

I find this very useful for prototyping and even building entire sites. I was inspired by Jasper McChesney's [article](http://breakforsense.net/flexible-layout-23-column-grid/) where he says the following:

"You can readily divide 23 into groups to make text columns, with some of the original columns acting as gutters (always 1 per gutter). Because I’ve chosen the number 23 very carefully, the math works out for divisions of 2 and 3, as well as several sub-divisions. So we can make text columns of 2, 4, 8, and also 3, 6, and 12."

Bootstrap's grid provides a quick way to set this up. I've limited the use of Bootrap to just the grid (not the rest of the framework) but of there are still some drawbacks to this approach - mainly that it creates a lot of unnecessary CSS. It's used here as a starting point and it can be easily replaced with any other grid system. If you do choose to use it in production I recommend reading this article about [using mixins to manage both grid and styling behaviour in your SCSS rather than adding grid classes to your HTML](https://medium.com/@erik_flowers/how-youve-been-getting-the-bootstrap-grid-all-wrong-and-how-to-fix-it-6d97b920aa40)


## Built using 
- Wordpress CMS with Adanced Custom Fields plugin
- Twig templating engine along with the Timber plugin for flexible, fast, and sustainable template development
- Gulp task manager for preprocessing and optimizing assets
- RequireJS for loading javascript files and modules
- jQuery for simplified HTML document traversing, event handling, animating, and Ajax interactions
- SCSS for writing more succinct CSS, and to keep files organized
- Bootstrap - just the grid


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