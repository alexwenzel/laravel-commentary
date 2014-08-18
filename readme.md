# Laravel commentary

A package for Laravel to post a comment on an article and to manage them.

## Description

This package comes with 3 parts:

* comment form
* comment listing
* comment management

The form allows anyone to post a comment on something. It can be applied to any view. The same goes for ther comment listing. 

The comment management allows someone to

* approve
* unapprove
* edit
* trash

comments.

## Implementation

### ServiceProvider

``'Alexwenzel\LaravelCommentary\LaravelCommentaryServiceProvider'``

### Namespace

The package registers the following namespace: ``laravel-commentary``

### Migration

````
php artisan migrate --package="alexwenzel/laravel-commentary"
````

The migration creates a table named: ``laravel-commentary-comments``

### Comment management

There is a controller to manage the comments. Include something like the following line in your ``routes.php``:

``Route::controller('comments', 'Alexwenzel\LaravelCommentary\CommentsController');``

### Comment form

To display the comment form, include something like the following line in your view:

````
{{ View::make('laravel-commentary::comment-form', array('entity'=>'my_article_id')) }}
````

### Comment listing

To display the comments of an entity, include something like the following line in your view:

````
{{ View::make('laravel-commentary::comment-list', array('entity'=>'my_article_id')) }}
````

The following conditions are applied to the comment listing. Comments:

* have to be approved
* are ordered by creation time

### Comment controller behaviour

The behaviour can be customized by overriding ``CommentaryActionHandler`` class.