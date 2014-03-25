<?php

namespace CivContent\Model\Content;

interface ContentInterface
{
	public function getContentId();
	public function setContentId();
	public function getContentTitle();
	public function setContentTitle();
	public function getContentBody();
	public function setContentBody();
}