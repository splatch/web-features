Web Features
=============

This project provides web interface for browsing [Apache Karaf](http://karaf.apache.org)
Feature descriptors.


Requirements
------------

Web Features are PHP application and can be run on any http web server which supports
this language.

To build and run this project you need following components available in include_path:

* [Agavi](http://agavi.org) The framework.
* [Doctrine 2](http://phpdoctrine.org) ORM tool.
* PostgreSQL database.

Both Agavi and Doctrine can be installed as PEAR packages (which we recommend).

### Using doctrine
After sucessfull PEAR installation you can use `doctrine` script from command line.

Following commands have to be executed to generate model:

* doctrine orm:generate-entities app\models
* doctrine orm:schema-tool:create

If you have database use orm:schema-tool:update instead of schema-tool:create.

After generate new models you must insert references to them in autoload.xml file