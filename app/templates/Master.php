<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="<?php echo $ro->getBaseHref(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/default.css" />
    <title><?php if(isset($t['_title'])) echo htmlspecialchars($t['_title']) 
     . ' - '; echo AgaviConfig::get('core.app_name'); ?></title>
  </head>
  <body>
    <!-- begin header -->
    <div id="header">
      <div id="logo"></div>
      <div id="menu">
        <ul>
          <li><a href="<?php echo $ro->gen('files'); ?>">Files List</a></li>
          </li>
        </ul>
      </div>

    </div>
    <!-- end header -->
    
    <!-- begin body -->
    <div id="body"> 
      <?php echo $inner; ?>
    </div>
    <!-- end body -->
    
    <!-- begin footer -->
    <div id="footer">
      <p>Copyright 2010 &copy; by <a href="http://code-house.org">Code-House</a></p>
    </div>
    <!-- end footer -->
  </body>
</html>
