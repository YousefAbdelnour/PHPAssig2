<?php
$this->addRoute('Profile/index', 'Profile,index');
$this->addRoute('Profile/create', 'Profile,create');
$this->addRoute('Profile/modify', 'Profile,modify');
$this->addRoute('User/login', 'User,login');
$this->addRoute('User/logout', 'User,logout');
$this->addRoute('User/register', 'User,register');
$this->addRoute('Publication/index', 'Publication,index');
$this->addRoute('Publication/edit', 'Publication,edit');
$this->addRoute('Publication/create', 'Publication,create');
$this->addRoute('Publication/delete', 'Publication,delete');
$this->addRoute('Comment/index','Comment,index');
$this->addRoute('Comment/edit','Comment,edit');
$this->addRoute('Error/publicationNotOwned','Error,publicationNotOwned');
$this->addRoute('Error/commentNotOwned','Error,commentNotOwned');
$this->addRoute('Publication/delete/', 'Publication,delete');
$this->addRoute('Comment/create', 'Comment,create');
$this->addRoute('Comment/delete', 'Comment,delete');
$this->addRoute('Publication/publication', 'Publication,publication');
$this->addRoute('Publication/search', 'Publication,search');
