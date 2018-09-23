<?php

// Routes

// List Users
$app->get('/', 'HomeController:listUsers')->setName('list');
