# MarketNewsProject

This is my first project in PHP 8. I made it without any framework. I didn't have any commerce experience in this time, because it was made after 3 months of studying programming. 
I tried to create this project on Object-oriented programming concept and MVC architectural pattern. Project focused on backend, so I didn't make responsive view here. 

## Topic of project
I have an economic education and I am interested in economics, so I wanted to create an information portal about economic news. I got more motivation to make this project. :)

## About project
The site has several default categories, such as news from the world, country and specific sectors. Homepage has a list of the latest information from each category. 
We can select and go to each category by the navigation, where we will find all the thematic news in order from the latest. We can select an interesting news for us, open and read an article or make comments (if we have an account). 

In this project we have 2 types of account - admin or user. We can create user account by registration (login, password, e-mail). User can create, edit and delete his own comments under every article.
Admin has access to CMS. This account can publish newses (CRUD), ban users and delete comments.


Project with MVC and OOP. I tried to use as little as I could PHP in HTML. AbstractController contains Route, which displays pages from templates with helper View. Folder 'Models' keeps data base structure. DatabaseController responsible for downloading and sending from Database. In folder 'Templates' we have layout with navigation, which displays on every page. In addition, we have two folders with templates for Admin Panel and view for users and guest on page.


## Technologies
* PHP 8
* HTML
* CSS
