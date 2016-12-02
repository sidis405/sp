/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
	config.entities=false;
	config.language = 'it';

	config.extraPlugins= 'widget,dialog,oembed,wordcount';
	config.toolbarLocation = 'top';
	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup'] },
		{ name: 'links' },
		{ name: 'paragraph',   groups: [ 'list', 'indent' ] },

		// { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		// { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		// { name: 'forms' },
		{ name: 'insert'},
		// { name: 'tools' },
		// { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		// { name: 'others' },
		{ name: 'styles', groups: [ 'styles' ] },
	];

	config.wordcount = {

	    // Whether or not you want to show the Word Count
	    showWordCount: true,

	    // Whether or not you want to show the Char Count
	    showCharCount: false,
	    
	    // Maximum allowed Word Count
	    maxWordCount: 3000,

	    // Maximum allowed Char Count
	    maxCharCount: 10000
	};
	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	// config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.skin = 'minimalist';
	config.height = 400; 
	// config.extraPlugins = 'oembed,widget';
	// config.toolbar= [['oembed']];

};	
