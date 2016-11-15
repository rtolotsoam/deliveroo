
CKEDITOR.plugins.add( 'ftediscours', {

	icons: this.path + 'icons/ftediscours.png',

	init: function( editor ) {

		editor.addCommand( 'insertFtediscours', {

			exec: function( editor ) {
				editor.insertHtml( "<p class='discours'>« Ceci est un discours, comment allez-vous? »</p>" );
			}
		});

		editor.ui.addButton( 'Discours', {
			label: 'Inserer Discours',
			command: 'insertFtediscours',
			toolbar: 'fte',
			icon: this.path + 'icons/ftediscours.png'
		});
	}
});
