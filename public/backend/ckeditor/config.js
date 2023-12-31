/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.skin='office2013',
	config.basicEntities = false,
    config.entities = false,
    config.allowedContent = true,
    config.fillEmptyBlocks = false,
    config.fullPage = false,
    config.enterMode = CKEDITOR.ENTER_BR,
	//config.toolbar = [
		//[ 'Source', '-','PasteText','Bold', 'Italic']
	//],
	//config.extraPlugins = 'ckawesome,lazyload,lazyloadi',
	//config.fontawesomePath = DOMAIN+'layout/font-awesome/css/font-awesome.min.css',
	//config.contentsCss = [HOME+'tbks.vn/layout/font-awesome/css/font-awesome.min.css',
						//HOME+'tbks.vn/layout/assets/css/bootstrap.min.css',
						//HOME+'tbks.vn/layout/assets/css/style.min.css',
						//HOME+'tbks.vn/layout/css/style.css']
	config.forcePasteAsPlainText = true
      // Remove the redundant buttons from toolbar groups defined above.
    //config.removeButtons= 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar',
	//config.filebrowserBrowseUrl = PUBLIC+'backend/ckfinder/ckfinder.html'
	//config.filebrowserImageBrowseUrl = DOMAIN+'system/libs/ckfinder/ckfinder.html',
	//config.filebrowserFlashBrowseUrl =  DOMAIN+'system/libs/ckfinder/ckfinder.html?type=Flash',
	//config.filebrowserUploadUrl = DOMAIN+'system/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	//config.filebrowserImageUploadUrl = DOMAIN+'system/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
	//config.filebrowserFlashUploadUrl =  DOMAIN+'system/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

};
CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.dtd.$removeEmpty['span'] = false;
