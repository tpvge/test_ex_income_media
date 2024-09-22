<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


$this->IncludeComponentClass("simplecomp.exam:simplecomp");

$component = new SimpleComponent($this);
$component->executeComponent();
?>