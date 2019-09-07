/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

 CKEDITOR.editorConfig = function( config ) {
 	var path = CKEDITOR.basePath.split('/');
 	path[ path.length-2 ] = 'upload_image';
 	config.filebrowserUploadUrl = path.join('/').replace(/\/+$/, '');
 	console.log(config.filebrowserUploadUrl);

// Add plugin
	config.extraPlugins = 'filebrowser';
};
