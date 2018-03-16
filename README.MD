# HTML development files to WP theme

Create WP theme files straight from HTML stage.

## How to:
1. copy all contents to a newly html project (best would be to paster after a fresh install of a foundation project) or git clone it to your project
2. create pages like you would on WP (front-page.php, page-contact.php, etc.) but include the **_core.php** file at top first
3. view your pages from index.php 
4. when done, copy everything to your theme folder (except **_core.php** and **index.php**)


**_core.php** has all logic and functions that mimics WP functions, like *get_header()*, *get_footer()* ...etc
index.php list all created pages, all php files except itself, header,footer and _core

Tested with `foundation 6`

SCSS folder structure:
- **_bxslider.scss** default styling for bxSlider, if you want to use it in your project
- **_content.scss** has customized classes (`.pr10 = padding-right:10px`,etc...) and most common used ones 
- **_header.scss** , **_footer.scss** and **_sidebar.scss** for themselfs
- **admin.scss** can be added for WP admin side
- **editor.scss** used for WP admin editor in order to maintain consistency