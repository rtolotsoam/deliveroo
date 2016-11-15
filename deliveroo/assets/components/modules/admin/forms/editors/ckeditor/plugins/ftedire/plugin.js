
CKEDITOR.plugins.add( 'ftedire', {

	icons: this.path + 'icons/ftedire.png',

	init: function( editor ) {

		editor.addCommand( 'insertFtedire', {

			exec: function( editor ) {
				var now = new Date();
				editor.insertHtml( "<h3 class='titre'><i class='dire'><img src='../assets/images/dire.png '></i> A DIRE </h3><br>" );
			}
		});

		editor.ui.addButton( 'Dire', {
			label: 'Inserer Dire',
			command: 'insertFtedire',
			toolbar: 'fte',
			icon: this.path + 'icons/ftedire.png'
		});
	}
});
