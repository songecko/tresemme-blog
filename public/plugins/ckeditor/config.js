/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	 config.language = 'en';
	// config.uiColor = '#AADC6E';
	
	config.toolbar = 'default';
	config.toolbar_default =
	[
		['Source','-','Cut','Copy','Paste','PasteText','PasteFromWord','-', 'NumberedList', 'BulletedList', 'Indent', 'Outdent', '-', 'Link', 'Unlink','-','Undo','Redo'],
		'/',
		['Bold', 'Italic','-','Format', 'Font','FontSize','TextColor','BGColor','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Table','HorizontalRule','-','Image' ]
	];
};
