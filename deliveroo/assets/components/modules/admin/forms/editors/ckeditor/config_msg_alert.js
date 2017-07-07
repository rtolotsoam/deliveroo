/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'fr';
	//config.uiColor = '#AADC6E';

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.allowedContent = true;
	
	config.smiley_images=['angel_smile.gif', 'angry_smile.gif', 'broken_heart.gif', 'confused_smile.gif', 'cry_smile.gif', 'devil_smile.gif', 'embaressed_smile.gif', 'envelope.gif', 'heart.gif', 'kiss.gif', 'lightbulb.gif', 'omg_smile.gif', 'regular_smile.gif', 'sad_smile.gif', 'shades_smile.gif', 'teeth_smile.gif', 'thumbs_down.gif', 'thumbs_up.gif', 'tounge_smile.gif', 'whatchutalkingabout_smile.gif', 'wink_smile.gif'];
	config.smiley_descriptions=['', ':(', '', ':~', ':\'(', '', '', '', '', '', '', ':-O', ':-)', ':-(', '8-)', ':D', '', '', ':-P', ':|', ';-)'];
	
	// config.extraPlugins = 'ftedire,ftefaire,fteattention,ftediscours';
	// config.extraPlugins = 'abbr';
	
	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript,Maximize,ShowBlocks,CreatePlaceholder,Image,Flash,Table,HorizontalRule,SpecialChar,PageBreak,Iframe,InsertPre,Font,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Source,Save,NewPage,DocProps,Preview,Print,Templates,document,FontSize,About,NumberedList,BulletedList,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';


};
