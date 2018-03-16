** HTML development files to WP theme

Easily create files to use in WP theme straingh out from HTML development. 




How to:
- copy all contents to a newly html project (best would be to paster after a fresh install of a foundation project)
- create pages like you would on WP (front-page.php, page-contact.php, etc.)
- in index.php you can view all created pages with a bit of styling from local CSS
- when done, copy everything to your theme folder (except _core.php and index.php)


_core.php has all logic and function that mimics wp functions, like get_header(), get_footer()...etc
index.php list all created pages, all php files except itself, header,footer and _core

Tested with foundation

SCSS folder structure:
- bxslider if you want to use it in your project
- content with customized classes (.pr10 = padding-right:10px,etc) and most common used ones 
- header , footer , sidebar for themselfs
- admin can be added for wp admin side
- editor used for wp admin editor in order to maintain consistency