CivContent
==========

A ZF2 module for managing web content.

HTML (or plain text) content can be added and stored in a database. Each peice of content is known as a post, and each post belongs to a category.

There are two controllers;

1. IndexController
2. CategoryController

The IndexController has actions for adding, editing, deleting and viewing posts.

The CategoryController has actions for adding, editing, deleting and listing categories.

The following routes are configured by default;

    \content
(for listing all posts)

    \content\add
(for adding a new post)

    \content\edit\:postid	
(for editing a post)

    \content\delete\:postid
(for deleteing a post)

    \content\category
(for listing all categories)

    \content\category\add
(for adding a category)

    \content\category\edit
(for editing a category)
    \content\category\delete
(for deleting a category)
    \:categoryname\:posttitle
(for viewing a post)